@extends('account.layouts.default')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class=" align-middle">Services Add</h5>
                            </div>
                            <div class="col-md-2 d-md-flex justify-content-md-end">
                                {{-- Button or other header elements here --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="formValidationExamples needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="service_name">Service Name</label>
                                    <input type="text" class="form-control" id="name" name="service_name" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a service name.</div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea id="description" class="form-control" placeholder="Description" name="description"
                                        required></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a description.</div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    @include('account.layouts.includes.component.ogimageUploader')
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="submitButton"
                                        id="btnServiceSave"> <span class="spinner-border spinner-border-sm d-none"
                                            role="status" aria-hidden="true"></span>
                                        Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- Page JS -->
        <script src="{{ url('admin_assets/js/validation/imageUploaderValidation.js') }}"></script>
        <script>
            (function() {
                const bsValidationForms = $('.needs-validation');
                bsValidationForms.each(function() {
                    $(this).on('submit', function(event) {
                        if (!this.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();

                            // Show spinner
                            $(this).find('.spinner-border').removeClass('d-none');
                            $("#btnServiceSave").html('Submitting..').prop('disabled', true);

                            var ogImagefile = ogNewFile;
                            var formData = new FormData();
                            formData.append('name', $('#name').val());
                            formData.append('service_name', $('#name').val());
                            formData.append('description', $('#description').val());
                            formData.append('image', ogImagefile);

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('service.store') }}',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    showSuccessAlert("Service stored successfully", 'success', '{{ route('service.list-view') }}');
                                },
                                error: function(error) {
                                    $("#btnServiceSave").html('Submit').prop('disabled', false);
                                    showErrorAlert("Something went wrong", 'warning');
                                }
                            });
                        }
                        $(this).addClass('was-validated');
                    });
                });
            })();
        </script>
    @endsection
