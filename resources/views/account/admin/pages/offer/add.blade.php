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
                                <h5 class=" align-middle">Offers Add</h5>
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
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>

                                 
                                <div class="col-md-4 mb-3">
                                    <label for="product" class="form-label">Product</label>
                                    <select id="product" class="form-select" required>
                                        @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select a type.</div>
                                </div>

                              
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="name">End Date</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a name.</div>
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


                            
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="submitButton"
                                        id="btnOfferSave"> <span class="spinner-border spinner-border-sm d-none"
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
        {{-- <script src="{{url('admin_assets/js/form-validation-offer-add.js')}}"></script> --}}
        <script src="{{ url('admin_assets/js/validation/imageUploaderValidation.js') }}"></script>
        <script>
   
          
            (function() {
                // Apply Bootstrap validation styles to
                const bsValidationForms = $('.needs-validation');
                bsValidationForms.each(function() {
                    $(this).on('submit', function(event) {
                
                        if (!this.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();

                            $(this).find('.spinner-border').removeClass('d-none');
                            $(this).prop('disabled', true);
                            disableFormFields($(this));
                            $("#btnOfferSave").html('Submitting..');
                            $("#btnOfferSave").prop('disabled', true);

                           
                            var formData = new FormData();
                            formData.append('name', $('#name').val());
                            formData.append('product_id', $('#product').val());
                            formData.append('offer_description', $('#description').val());
                            formData.append('end_date', $('#date').val());
                      
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('offer.store') }}',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    showSuccessAlert("Offer stored successfully", 'success',
                                        '{{ route('offer.list-view') }}');

                                },
                                error: function(error) {
                                    $("#btnOfferSave").html('Submitt');
                                    $("#btnOfferSave").prop('disabled', false);
                                    showErrorAlert("Somthing went wrong", 'warning',
                                        '{{ route('offer.view') }}');
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
