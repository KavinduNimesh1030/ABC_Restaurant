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
                                <h5 class=" align-middle">Staff Add</h5>
                            </div>
                            <div class="col-md-2  d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-outline-primary " disabled>
                                    English
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="formValidationExamples needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                        required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a header.</div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                        required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a header.</div>
                                </div>

                                
                                <div class="col-md-4 mb-3">
                                    <label for="post" class="form-label">Role</label>
                                    <select id="post" class="form-select" required>
                                        {{-- @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->regionDetails->first()->display_title}}</option>
                                        @endforeach --}}
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select a region.</div>
                                </div>

                               
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Staff@gmail.com" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a page title.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                         required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a page title.</div>
                                </div>
                            </div>

                            {{-- @include('account.admin.layouts.includes.component.ogImageUploader') --}}

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="submitButton"
                                        id="btncitySave"> <span class="spinner-border spinner-border-sm d-none"
                                            role="status" aria-hidden="true"></span>
                                        Submit</button>
                                    </button>
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
        {{-- <script src="{{url('admin_assets/js/form-validation-city-edit.js')}}"></script> --}}
        <script src="{{ url('admin_assets/js/validation/imageUploaderValidation.js') }}"></script>
        <script>
            var url = 'lk';
            var slugArray = [];
            slugArray['region'] = '';
            slugArray['name'] = '';
          
            (function() {
                // Apply Bootstrap validation styles to
                const bsValidationForms = $('.needs-validation');
                bsValidationForms.each(function() {
                    $(this).on('submit', function(event) {
                        isValidate = validateImageUploader();
                        if (!this.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();

                            $(this).find('.spinner-border').removeClass('d-none');
                            $(this).prop('disabled', true);
                            disableFormFields($(this));
                            $("#btncitySave").html('Submitting..');
                            $("#btncitySave").prop('disabled', true);

                            var ogImagefile = ogNewFile;
                            var formData = new FormData();
                            formData.append('name', $('#cityName').val());
                            formData.append('slug', $('#citySlug').val());
                            formData.append('ogImageFile', ogImagefile);
                            formData.append('meta_description', $('#cityMetaDescription').val());
                            formData.append('page_title', $('#cityPageTitle').val());
                      
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('staff.store') }}',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    showSuccessAlert("city stored successfully", 'success',
                                        '{{ route('staff.list-view') }}');
                                },
                                error: function(error) {
                                    $("#btncitySave").html('Submitt');
                                    $("#btncitySave").prop('disabled', false);
                                    showErrorAlert("Somthing went wrong", 'warning',
                                        '{{ route('staff.view') }}');
                                    enableFormFields($(this));
                                }
                            });
                        }

                        $(this).addClass('was-validated');
                    });
                });
            })();


          
    function disableFormFields(form) {
        form.find('input, textarea, select, button').prop('disabled', true);
  
    }

    function enableFormFields(form) {
        form.find('input, textarea, select, button').prop('disabled', false);
    }
        </script>
    @endsection
