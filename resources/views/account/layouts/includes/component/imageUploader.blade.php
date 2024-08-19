<div class="col-md-12 mb-4" style="height: 400px;">
    <div class="row mt-2 mb-2">
        <div class="col-6  d-flex justify-content-start">
            <label class="pt-2 px-2" id="imageLabel">Feature Image</label>
        </div>
        <div class="col-6  d-flex justify-content-end">
            <button type="button" id="viewOGImage" class="btn btn-outline-primary">View OG
                image</button>
            <button type="button" id="viewFeatureImage" class="btn btn-outline-primary d-none">View Feature
                image</button>
        </div>
    </div>

    <div id="mainImageView">
        <div class="mb-2 d-flex  h-100" style="height: 400px;">
            @foreach ($data->imagables as $imagable)
                @if ($imagable->position == 'Feature')
                    <img id="uploadedMainImage" class="img-fluid cover-image"
                        src="{{ url($imagable->media->getPath()['medium']) }}" alt="img">
                @endif
            @endforeach
        </div>
        <div class="d-flex mr-4">
            <input type="file" class="d-none" id="viewMainImageUploader" name="imageUploaderMain"
                onchange="displaySelectedMainImage(event)" />
        </div>
    </div>

    <div id="ogImageView" class="d-none">
        <div class="mb-2 d-flex  h-100" style="height: 400px;">
            @foreach ($data->imagables as $imagable)
                @if ($imagable->position == 'OG')
                    <img id="uploadedOGImage" class="img-fluid cover-image"
                        src="{{ url($imagable->media->getPath()['medium']) }}" alt="img">
                @endif
            @endforeach
        </div>
        <div class="d-flex mr-4">
            <input type="file" class="d-none" id="viewOGImageUploader" name="imageUploaderOG"
                onchange="displaySelectedOGImage(event)" />
        </div>
    </div>

    <button type="button " id="viewFeatureUploadButton" class="btn btn-outline-primary mb-2">Update
        image</button>
    <button type="button" id="featureResetButton" class="btn btn-outline-danger mb-2 d-none">Reset
        image</button>
    <button type="button" id="saveFeatureButton" class="btn btn-outline-success d-none mb-2">Save
        image</button>

    <button type="button" id="viewOGUploadButton" class="btn btn-outline-primary mb-2 d-none">Update
        image</button>
    <button type="button" id="ogResetButton" class="btn btn-outline-danger mb-2 d-none">Reset
        image</button>
    <button type="button" id="saveOGButton" class="btn btn-outline-success d-none mb-2 ">Save
        image</button>
</div>

@section('imageUploaderScripts')
    <script>
        var mainNewFile;
        let mainCropper;
        var mainImage = $('#uploadedMainImage').attr('src');
        var ogImage = $('#uploadedOGImage').attr('src');

        function displaySelectedMainImage(event) {
            $('#saveOGButton').addClass('d-none')
            $('#saveFeatureButton').removeClass('d-none');
            $('#featureResetButton').removeClass('d-none');
            const image = $('#uploadedMainImage');
            const aspectRatio = 16 / 9;
            displayImage(event, image, aspectRatio)

        }

        function displaySelectedOGImage(event) {
            $('#saveFeatureButton').addClass('d-none');
            $('#saveOGButton').removeClass('d-none');
            $('#ogResetButton').removeClass('d-none');
            const image = $('#uploadedOGImage');
            const aspectRatio = 5 / 5;
            displayImage(event, image, aspectRatio);
        }

        function displayImage(event, image, aspectRatio) {
            const input = event.target;
            if (input.files && input.files[0]) {

                const reader = new FileReader();

                reader.onload = function(e) {
                    image.attr('src', e.target.result);

                    if (mainCropper) {
                        mainCropper.replace(e.target.result);
                    } else {
                        mainCropper = new Cropper(image[0], {
                            aspectRatio: aspectRatio,
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

        $('#viewFeatureUploadButton').on('click', function() {
            const input = $('#viewMainImageUploader');
            $('.btnViewDetail').addClass('d-none');
            input.click();
        });

        $('#viewOGUploadButton').on('click', function() {
            const input = $('#viewOGImageUploader');
            $('.btnViewDetail').addClass('d-none');
            input.click();
        });

        $('#viewOGImage').on('click', function() {
            $('#mainImageView').addClass('d-none');
            $('#ogImageView').removeClass('d-none');
            $(this).addClass('d-none');
            $('#viewFeatureImage').removeClass('d-none');
            $('#imageLabel').text('OG Image');
            $('#viewFeatureUploadButton').addClass('d-none')
            $('#viewOGUploadButton').removeClass('d-none')
        });

        $('#viewFeatureImage').on('click', function() {
            $('#ogImageView').addClass('d-none');
            $('#mainImageView').removeClass('d-none');
            $(this).addClass('d-none');
            $('#viewOGImage').removeClass('d-none');
            $('#imageLabel').text('Feature Image');
            $('#viewFeatureUploadButton').removeClass('d-none')
            $('#viewOGUploadButton').addClass('d-none')

        });

        $('#saveOGButton').on('click', function() {
            var formData = new FormData();
            formData.append('resourcable_id', {{ $data->id }});
            formData.append('position', "OG");
            formData.append('file', mainNewFile);
            sendRequest(formData);
        });

        $('#saveFeatureButton').on('click', function() {
            var formData = new FormData();
            formData.append('resourcable_id', {{ $data->id }});
            formData.append('position', "Feature");
            formData.append('file', mainNewFile);
            sendRequest(formData);

        });

        function sendRequest(formData) {
            $('#uploadedMainImage').addClass('d-none');
            $('#uploadedOGImage').addClass('d-none');
            $('#featureResetButton').addClass('d-none');
            $('#ogResetButton').addClass('d-none');
           

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route($data->route) }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // $('#featureResetButton').removeClass('d-none');
                    // $('#ogResetButton').removeClass('d-none');
                    showSuccessAlert("Image update successful", 'success', location.href);
                },
                error: function(error) {
                    $('#uploadedMainImage').removeClass('d-none');
                    $('#uploadedOGImage').removeClass('d-none');
                    $('#featureResetButton').removeClass('d-none');
                    $('#ogResetButton').removeClass('d-none');
                    showErrorAlert("Somthing went wrong", 'warning', location.href);
                }
            });
        }

        $('#featureResetButton').click(function() {

            $('#uploadedMainImage').attr('src', `${mainImage}`);
            $('.btnViewDetail').removeClass('d-none');

            if (mainCropper) {
                mainCropper.destroy();
                mainCropper = null;
            }
            $('#saveFeatureButton').addClass('d-none');
            $('#featureResetButton').addClass('d-none');
        });

        $('#ogResetButton').click(function() {

            $('#uploadedOGImage').attr('src', `${ogImage}`);
            $('.btnViewDetail').removeClass('d-none');
            if (mainCropper) {
                mainCropper.destroy();
                mainCropper = null;
            }
            $('#saveOGButton').addClass('d-none')
            $('#ogResetButton').addClass('d-none');
        });
    </script>
@endsection
