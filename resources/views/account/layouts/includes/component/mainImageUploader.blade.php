<div class="col-md-12 mb-3">
    <div class="mb-0 d-flex">
        <img id="image" src="{{url('admin_assets/img/icons/components/file-uploader.png')}}" alt="example placeholder"
            style="width:100%; pointer-events: none;" />
    </div>
    <div class="d-flex mr-4">
        <input type="file" class="form-control d-none p-0 m-0" id="mainImageUploader" name="mainImageUploader"
            onchange="displaySelectedImage(event)" />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please upload feature image.</div>
    </div>
    <button type="button" id="uploadButton" class="btn btn-outline-primary">Upload
        image</button>
        <button type="button" id="resetButton" class="btn btn-outline-danger d-none">Reset
            image</button>
</div>

@section('mainImageScripts')
<script>
    var mainNewFile;
    let mainCropper;

    //validation
    $('#mainImageUploader').on('change', function () {
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

    function displaySelectedImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            $('#resetButton').removeClass('d-none');
            const reader = new FileReader();

            reader.onload = function(e) {
                const image = $('#image');
                image.attr('src', e.target.result);

                if (mainCropper) {
                    mainCropper.replace(e.target.result);
                } else {
                    mainCropper = new Cropper(image[0], {
                        aspectRatio: 16 / 9,
                        crop(event) {
                            var canvas = mainCropper.getCroppedCanvas();
                            canvas.toBlob(function(blob) {
                                // Create a new File object with the updated size
                                const file = input.files[0];
                                const updatedFile = new File([blob], file.name, {
                                    type: blob.type,
                                    lastModified: file.lastModified
                                });

                                // Copy additional properties from the original file to the new file
                                updatedFile.webkitRelativePath = file.webkitRelativePath;
                                mainNewFile = updatedFile;

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

    $('#uploadButton').on('click', function() {
        resetImage();
        const input = $('#mainImageUploader');
        input.click();
    });

    $('#resetButton').click(function(){
        resetImage();
    });

    function resetImage(){
        $('#mainImageUploader').val('');
        $('#image').attr('src', '{{url('admin_assets/img/icons/components/file-uploader.png')}}');
        $('.valid-feedback').hide();
        $('.invalid-feedback').hide();
        if (mainCropper) {
            mainCropper.destroy();
            mainCropper = null;
        }
        $('#resetButton').addClass('d-none');
    }

 
</script>
@endsection
