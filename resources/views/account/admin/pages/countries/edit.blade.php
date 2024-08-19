@extends('account.admin.layouts.default')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class=" align-middle">Countries Edit</h5>
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
                                <label class="form-label" for="countryName">Name</label>
                                <input type="text" class="form-control" id="countryName" name="countryName"
                                    value="{{$country->name}}" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a header.</div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="countrySlug">Slug</label>
                                <input type="text" class="form-control" id="countrySlug" name="countrySlug"
                                    placeholder="United states" value="{{$country->slug}}" required />
                                <label class="form-label text-success" id="countrySlugDisplayLable" for="countrySlug">
                                    {{-- {{ config('app.url')}}/{{app()->getLocale()}} --}}
                                </label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a slug.</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="countryPageTitle">Page title</label>
                                <input type="text" class="form-control" id="countryPageTitle" name="countryPageTitle"
                                    placeholder="Asia"
                                    value="{{$country->countryDetails->first()!= null?$country->countryDetails->first()->page_title:""}}"
                                    required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a page title.</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="countryMetaDescription">Meta Description</label>
                                <textarea id="countryMetaDescription" class="form-control"
                                    placeholder="Meta Description" name="countryMetaDescription"
                                    required>{{$country->countryDetails->first()!= null?$country->countryDetails->first()->meta_description:""}}</textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a meta description.</div>
                            </div>
                        </div>

                        @include('account.admin.layouts.includes.component.ogImageUploader')

                        <div class="row">
                            <div class="col-6 ">
                                @if($country->countryDetails->first() != null)
                                <button type="submit" class="btn btn-primary" name="submitButton" id="btnCountrySave">
                                    <span class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true"></span>
                                    Save & Re-translate</button>
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary" name="btn retranslate" id="btnCountrySave">
                                    <span class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true"></span>
                                    Save & Translate</button>
                                </button>
                                @endif

                            </div>
                            <div class="col-6 text-end">
                                <a href="" class="btn btn-outline-primary" name="btnCreateBody" id="btnCreateBody"
                                {{ $country->countryDetails->first() == null ? 'disabled' : '' }} href>

                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    Create Body
                            </a>
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
    {{-- <script src="{{url('admin_assets/js/form-validation-country-edit.js')}}"></script> --}}
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
                            $("#btnCountrySave").html('Submitting..');
                            $("#btnCountrySave").prop('disabled', true);

                            var ogImagefile = ogNewFile;
                            var formData = new FormData();
                            formData.append('name', $('#countryName').val());
                            formData.append('slug', $('#countrySlug').val());
                            formData.append('ogImageFile', ogImagefile);
                            formData.append('meta_description', $('#countryMetaDescription').val());
                            formData.append('page_title', $('#countryPageTitle').val());
                      
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: `{{ route('country.edit', ['id' => ':id']) }}`.replace(':id', {{$country->id}}),
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    showSuccessAlert("Country stored successfully", 'success',
                                        '{{ route('country.list-view') }}');
                                },
                                error: function(error) {
                                    $("#btnCountrySave").html('Submitt');
                                    $("#btnCountrySave").prop('disabled', false);
                                    showErrorAlert("Somthing went wrong", 'warning',
                                        '{{ route('country.view') }}');
                                    enableFormFields($(this));
                                }
                            });
                        }

                        $(this).addClass('was-validated');
                    });
                });
            })();


            $('#countryName').on('input', function() {
                var name = $(this).val().trim().toLowerCase();
                var slug = name.replace(/\s+/g, '-');
                $('#countrySlug').val(slug);
                slugArray['name'] = slug;
                createSlug();
            });


            $('#countrySlug').on('input', function() {
                var slug = $(this).val().trim().toLowerCase();
                var slug = slug.replace(/\s+/g, '-');
                $('#countrySlug').val(slug);
                slugArray['name'] = slug;
                createSlug();
            });

            // function createSlug() {
            //     displaySlug = url + slugArray['region'] + slugArray['name'];
            //     $('#countrySlugDisplayLable').text(displaySlug);
            // }

    function disableFormFields(form) {
        form.find('input, textarea, select, button').prop('disabled', true);
  
    }

    function enableFormFields(form) {
        form.find('input, textarea, select, button').prop('disabled', false);
    }
    </script>
    @endsection