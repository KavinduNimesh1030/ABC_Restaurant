@extends('account.layouts.default')
@php
   //$assign country to data for use in common image upload component
//    dd($country->imageables);
   $data = $product;
@endphp
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class=" align-middle">Product Edit</h5>
                            </div>
                            <div class="col-md-2  d-md-flex justify-content-md-end">
                         
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="formValidationExamples needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                       value="{{$product->name}}" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="type" class="form-label">Category</label>
                                    <select id="category" class="form-select" required>
                                        <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                        @foreach($categories as $category)
                                        @if($product->category->id != $category->id )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please select a type.</div>
                                </div>

                                

                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="name">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                       value="{{$product->price}}" required />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea id="description" class="form-control" placeholder="Description" name="description"
                                        required> {{$product->description}}</textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a description.</div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    @include('account.layouts.includes.component.ogimageEditUploader')
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="submitButton"
                                        id="btnStaffUpdate"> <span class="spinner-border spinner-border-sm d-none"
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
        {{-- <script src="{{url('admin_assets/js/form-validation-product-add.js')}}"></script> --}}
        {{-- <script src="{{ url('admin_assets/js/validation/imageUploaderValidation.js') }}"></script> --}}
        <script>
   
          
            (function() {
                // Apply Bootstrap validation styles to
                const bsValidationForms = $('.needs-validation');
                bsValidationForms.each(function() {
                    $(this).on('submit', function(event) {
                        // isValidate = validateImageUploader();
                        if (!this.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();

                            $(this).find('.spinner-border').removeClass('d-none');
                            $(this).prop('disabled', true);
                            disableFormFields($(this));
                            $("#btnStaffUpdate").html('Submitting..');
                            $("#btnStaffUpdate").prop('disabled', true);

                            var ogImagefile = ogNewFile;
                            var formData = new FormData();
                            formData.append('name', $('#name').val());
                            formData.append('category_id', $('#category').val());
                            formData.append('description', $('#description').val());
                            formData.append('price', $('#price').val());
                            formData.append('image', ogImagefile);
                      
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: `{{ route('product.edit', ['id' => ':id']) }}`.replace(':id', {{$product->id}}),
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    showSuccessAlert("Product update successfully", 'success',
                                        '{{ route('product.list-view') }}');

                                },
                                error: function(error) {
                                    $("#btnStaffUpdate").html('Submitt');
                                    $("#btnStaffUpdate").prop('disabled', false);
                                    showErrorAlert("Somthing went wrong", 'warning',
                                        '{{ route('product.view') }}');
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
