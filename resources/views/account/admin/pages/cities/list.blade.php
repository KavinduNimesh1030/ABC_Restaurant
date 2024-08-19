@extends('account.admin.layouts.default')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" />
@endsection

@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">citys List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class="align-middle">Cities List</h5>
            </div>
            <div class="col-md-2  d-md-flex justify-content-md-end">
                {{-- <a type="button" class="btn btn-outline-primary ladda-button" data-style="expand-right">
                    <span class="ladda-label">Add city</span>
                </a> --}}

                {{-- <a type="button" href="{{route('city.view')}}" class="btn btn-outline-primary">
                    <span class="ladda-label">Add city</span>
                </a> --}}
            </div>
        </div>
        <hr class="p-0 mx-4 my-0 mb-2 mb-4">
        <div class="mx-4 mb-4">
            <div id="cityTable" class="p-2">
                <table class="table table-striped" style="width:100%;" id="table_city">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Country</th>
                            {{-- <th>Page Title</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr>
                            <td>
                                {{$city->id}}
                            </td>
                            <td>
                                {{$city->name}}
                            </td>
                            <td>
                                {{$city->country->name}}
                            </td>
                            {{-- <td>
                                {{$city->cityDetails->first()->page_title}}
                            </td> --}}
                            <td>
                                <a type="button" href={{ route('city.edit-view', ['id' => $city->id]) }}
                                    class="btn
                                    btn-outline-primary btn-sm mb-2">Edit</a>
                                    
                                @if($city->is_publish == 1)
                                <a type="button mb-2" href="#" onclick="changePublishStatus({{ $city->id }}, 0)"
                                    class="btn btn-outline-success btn-sm mb-2">Draft</a>
                                @else
                                <a type="button mb-2" href="#" onclick="changePublishStatus({{ $city->id }}, 1)"
                                    class="btn btn-outline-warning btn-sm mb-2">Publish</a>
                                @endif

                                <a type="button" id="cityDeleteBtn" onclick="deleteCity('{{$city->id}}')"
                                    class="btn btn-outline-danger btn-sm mb-2" style="color: #dc3545;">Delete</a>

                                    <a type="button" class="btn btn-outline-dark btn-sm mb-2">Preview</a>
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
    new DataTable('#table_city', {
        paging: true,
        scrollCollapse: true,
        scrollY: '400px',
        "columnDefs": [
        // {"className": "dt-left", "targets": "_all"}
        { width: '250px', targets: 1 },
        { width: '250px', targets: 2 }
     
      ],
    
    });

    function deleteCity(id) {
      $.confirm({
        title: 'Confirm Deletion',
        content: 'Are you sure you want to delete this city?',
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
            const url = '{{ route("city.delete", ":id") }}'.replace(':id', id);
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
                      showSuccessAlert(response.success,'success','{{ route('city.list-view') }}');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                      showErrorAlert(xhr.responseJSON.error,'warning','{{route('city.list-view')}}');
                    } else {
                      showErrorAlert('An unexpected error occurred.','warning','{{route('city.list-view')}}');
                    }
                }
            });
        }

    function changePublishStatus(cityId, isPublish) {
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
                    url: '{{ route("city.change-publish-status", ":id") }}'.replace(':id', cityId),
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showSuccessAlert('Status changed successfully', 'success', '{{ route('city.list-view') }}');
                    },
                    error: function(xhr, status, error) {
                        showErrorAlert('Something went wrong', 'warning', '{{ route('city.list-view') }}');
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