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
                                <h5 class=" align-middle">Restaurant Add</h5>
                            </div>
                            <div class="col-md-2  d-md-flex justify-content-md-end">
                                {{-- <button type="button" class="btn btn-outline-primary " disabled>
                                    English
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="formValidationExamples needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>

                              
                                <div class="col-md-6 mb-4">
                                    <label for="services" class="form-label">Services and facilities</label>
                                    <select
                                      id="services"
                                      class="selectpicker w-100 border rounded"
                                      data-style="btn-default"
                                      multiple
                                      data-actions-box="true"
                                      name="services"
                                      required>
                                    @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select at least one currency.</div>
                            </div>

                            </div>

                            <div class="row">

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
                                        id="btnRestaurantave"> <span class="spinner-border spinner-border-sm d-none"
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
        {{-- <script src="{{url('admin_assets/js/form-validation-restaurant-add.js')}}"></script> --}}
        <script src="{{ url('admin_assets/js/validation/imageUploaderValidation.js') }}"></script>
        <script>
   
          
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
                            $("#btnRestaurantave").html('Submitting..');
                            $("#btnRestaurantave").prop('disabled', true);

                            var ogImagefile = ogNewFile;
                            var formData = new FormData();
                            formData.append('location', $('#location').val());
                            formData.append('services_ids', $('#services').val());
                            formData.append('description', $('#description').val());
                            formData.append('image', ogImagefile);
                      
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('restaurant.store') }}',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    showSuccessAlert("Restaurant stored successfully", 'success',
                                        '{{ route('restaurant.list-view') }}');

                                },
                                error: function(error) {
                                    $("#btnRestaurantave").html('Submitt');
                                    $("#btnRestaurantave").prop('disabled', false);
                                    showErrorAlert("Somthing went wrong", 'warning',
                                        '{{ route('restaurant.view') }}');
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
