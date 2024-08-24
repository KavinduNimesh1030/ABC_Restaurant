<div class="col-md-12 mb-4">
    <label class="form-label">Feature Image</label>
    <div class="mb-0 d-flex mb-2" style="height: 500px;">
        <img id="ogImage" src="{{url($data->imageables->first()->media->getPath()['original'])}}"
        alt="example placeholder" style="width:100%; pointer-events: none;" />
        {{-- <img id="ogImage" src="{{url('admin_assets/img/icons/components/file-uploader.png')}}"
        alt="example placeholder" style="width:100%; pointer-events: none;" /> --}}
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

    $(document).ready(function () {
        $('#ogImageUploader').addClass('is-valid').removeClass('is-invalid');
        $('#ogImageUploader').siblings('.invalid-feedback').hide();
        $('#ogImageUploader').siblings('.valid-feedback').show();

        applyCropper();
      
    });

    function applyCropper(){
        const image = $('#ogImage');
        ogCropper = new Cropper(image[0], {
            aspectRatio: 16 / 9,
            crop(event) {
                var canvas = ogCropper.getCroppedCanvas();
                canvas.toBlob(function(blob) {
                    const file = $('#ogImageUploader')[0].files[0] || new File([], 'dummy.png'); // Handle if no file is selected
                    const updatedFile = new File([blob], file.name, {
                        type: blob.type,
                        lastModified: file.lastModified
                    });

                    ogNewFile = updatedFile;
                    console.log(blob);
                    console.log(updatedFile);
                }, 'image/png');
            },
        });
    }

    // Trigger file input click
    $('#ogUploadButton').on('click', function() {
        reset();
        const input = $('#ogImageUploader');
        input.click();
        applyCropper();
    });

    // Handle image file selection and update the cropper
    $('#ogImageUploader').on('change', function(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            $('#resetOgButton').removeClass('d-none');
            const reader = new FileReader();

            reader.onload = function(e) {
                const image = $('#ogImage');
                image.attr('src', e.target.result);

                if (ogCropper) {
                    ogCropper.replace(e.target.result);  // Replace image in the cropper
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    // Reset image and cropper
    $('#resetOgButton').click(function() {
        reset();
    });

    function reset() {
        $('#ogImageUploader').val('');
        $('#ogImage').attr('src', '{{url('admin_assets/img/icons/components/file-uploader.png')}}');
        if (ogCropper) {
            ogCropper.destroy();
            ogCropper = null;
        }
        $('#resetOgButton').addClass('d-none');
    }
</script>
@endsection

