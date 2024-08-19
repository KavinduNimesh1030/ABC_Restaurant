@extends('account.admin.layouts.default')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" />
@endsection

@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">countrys List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class=" align-middle">Countries List</h5>
            </div>
            <div class="col-md-2  d-md-flex justify-content-md-end">
                {{-- <a type="button" class="btn btn-outline-primary ladda-button" data-style="expand-right">
                    <span class="ladda-label">Add country</span>
                </a> --}}

                {{-- <a type="button" href="{{route('country.view')}}" class="btn btn-outline-primary">
                    <span class="ladda-label">Add country</span>
                </a> --}}
            </div>
        </div>
        <hr class="p-0 mx-4 my-0 mb-2 mb-4">
        <div class="mx-4 mb-4">
            <div id="countryTable" class="p-2">
                <table class="table table-striped" style="width:100%;" id="table_country">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            {{-- <th>Slug</th> --}}
                            {{-- <th>Page Title</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $country)
                        <tr>
                            <td>
                                {{$country->id}}
                            </td>
                            <td>
                                {{$country->name}}
                            </td>
                            {{-- <td>
                                {{$country->slug}}
                            </td> --}}
                            {{-- <td>
                                {{$country->countryDetails->first()->page_title}}
                            </td> --}}
                            <td>
                                <a type="button" href={{ route('country.edit-view', ['id' => $country->id]) }}
                                    class="btn
                                    btn-outline-primary btn-sm mb-2">Edit</a>
                                    
                                @if($country->is_publish == 1)
                                <a type="button mb-2" href="#" onclick="changePublishStatus({{ $country->id }}, 0)"
                                    class="btn btn-outline-success btn-sm mb-2">Draft</a>
                                @else
                                <a type="button mb-2" href="#" onclick="changePublishStatus({{ $country->id }}, 1)"
                                    class="btn btn-outline-warning btn-sm mb-2">Publish</a>
                                @endif

                                <a type="button" id="countryDeleteBtn" onclick="deleteCountry('{{$country->id}}')"
                                    class="btn btn-outline-danger btn-sm mb-2" style="color: #dc3545;">Delete</a>

                                    <a type="button" href={{ route('country.edit', ['id'=> $country->id]) }} class="btn btn-outline-dark btn-sm mb-2">Preview</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#table_country', {
        paging: true,
        scrollCollapse: true,
        scrollY: '400px',
      //   "columnDefs": [
      //   {"className": "dt-left", "targets": "_all"}
      // ],
    
    });

    function deleteCountry(id) {
      $.confirm({
        title: 'Confirm Deletion',
        content: 'Are you sure you want to delete this country?',
        theme: 'modern',
        animation: 'RotateYR',
        closeAnimation: 'scale',
        buttons: {
            confirm: {
                text: 'Confirm',
                btnClass: 'btn-red',
                action: function () {
                    processDelete(id);
                }
            },
            cancel: function () {
            }
        }
    });
     
  }

      function processDelete(id){
          console.log(id);
            const url = '{{ route("country.delete", ":id") }}'.replace(':id', id);
            const token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    _token: token
                },
                success: function(response) {
                    if (response.success) {
                      showSuccessAlert(response.success,'success','{{ route('country.list-view') }}');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                      showErrorAlert(xhr.responseJSON.error,'warning','{{route('country.list-view')}}');
                    } else {
                      showErrorAlert('An unexpected error occurred.','warning','{{route('country.list-view')}}');
                    }
                }
            });
        }

    function changePublishStatus(countryId, isPublish) {
    var message = isPublish === 1 ? 'Are you sure you want to change the status to Publish?' : 'Are you sure you want to change the status to Draft?';
    
    $.confirm({
        title: 'Confirm!',
        content: message,
        buttons: {
            confirm: function () {
                var formData = new FormData();
                formData.append('is_publish', isPublish);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
                $.ajax({
                    url: '{{ route("country.change-publish-status", ":id") }}'.replace(':id', countryId),
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showSuccessAlert('Status changed successfully', 'success', '{{ route('country.list-view') }}');
                    },
                    error: function(xhr, status, error) {
                        showErrorAlert('Something went wrong', 'warning', '{{ route('country.list-view') }}');
                    }
                });
            },
            cancel: function () {
             
            }
        }
    });
}

</script>

@endsection