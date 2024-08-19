<div class="col-md-12 mb-4">
    <label class="form-label">OG image</label>
    <div class="mb-0 d-flex">
        <img id="ogImage" src="{{url('admin_assets/img/icons/components/file-uploader.png')}}"
            alt="example placeholder" style="width:100%; pointer-events: none;" />
    </div>
    <div class="d-flex mr-4">
        <input type="file" class="d-none" id="ogImageUploader" name="ogImageUploader"
            onchange="displaySelectedOGImage(event)" />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please upload og image.</div>
    </div>
    <button type="button" id="ogUploadButton" class="btn btn-outline-primary">Upload
        image</button>
        <button type="button" id="resetOgButton" class="btn btn-outline-danger d-none">Reset
            image</button>
</div>

@section('ogImageScripts')
<script>
    var ogNewFile;
    let ogCropper;

       //validation
       $('#ogImageUploader').on('change', function () {
        if (this.files.length > 0) {
            $(this).addClass('is-valid').removeClass('is-invalid');
            $(this).siblings('.invalid-feedback').hide();
            $(this).siblings('.valid-feedback').show();
        } else {
            $(this).addClass('is-invalid').removeClass('is-valid');
            $(this).siblings('.invalid-feedback').show();
            $(this).siblings('.valid-feedback').hide();
        }
    });

    function displaySelectedOGImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            $('#resetOgButton').removeClass('d-none');
            const reader = new FileReader();

            reader.onload = function(e) {
                const image = $('#ogImage');
                image.attr('src', e.target.result);

                if (ogCropper) {
                    ogCropper.replace(e.target.result);
                } else {
                    ogCropper = new Cropper(image[0], {
                        aspectRatio: 5 / 5,
                        crop(event) {
                            var canvas = ogCropper.getCroppedCanvas();
                            canvas.toBlob(function(blob) {
                                // Create a new File object with the updated size
                                const file = input.files[0];
                                const updatedFile = new File([blob], file.name, {
                                    type: blob.type,
                                    lastModified: file.lastModified
                                });

                                // Copy additional properties from the original file to the new file
                                updatedFile.webkitRelativePath = file.webkitRelativePath;
                                ogNewFile = updatedFile;

                                console.log(blob);
                                console.log(updatedFile);
                                console.log(updatedFile.size);
                                console.log(file);
                            }, 'image/png');
                        },
                    });
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#ogUploadButton').on('click', function() {
         reset();
        const input = $('#ogImageUploader');
        input.click();
       
    });

    $('#resetOgButton').click(function(){
       reset();
    });

    function reset(){
        $('#ogImageUploader').val('');
        $('#ogImage').attr('src', '{{url('admin_assets/img/icons/components/file-uploader.png')}}');
        // $('.valid-feedback').hide();
        $('.invalid-feedback').hide();
        if (ogCropper) {
            ogCropper.destroy();
            ogCropper = null;
        }
        $('#resetOgButton').addClass('d-none'); 
    }

    </script>
@endsection
