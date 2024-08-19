@extends('account.layouts.default')


@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">staffs List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class=" align-middle">Staff List</h5>
            </div>
            <div class="col-md-2  d-md-flex justify-content-md-end">
                {{-- <a type="button" class="btn btn-outline-primary ladda-button" data-style="expand-right">
                    <span class="ladda-label">Add staff</span>
                </a> --}}

                {{-- <a type="button" href="{{route('staff.view')}}" class="btn btn-outline-primary">
                    <span class="ladda-label">Add staff</span>
                </a> --}}
            </div>
        </div>
        <hr class="p-0 mx-4 my-0 mb-2 mb-4">
        <div class="mx-4 mb-4">
            <div id="staffTable" class="p-2">
                <table class="table table-striped" style="width:100%;" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as $staff)
                        <tr>
                            <td>
                                {{$staff->id}}
                            </td>
                            <td>
                                {{$staff->first_name}} {{$staff->last_namel}}
                            </td>
                            <td>
                                {{$staff->email}}
                            </td>
                            <td>
                                {{$staff->post->name}}
                            </td>
                            <td>
                                <a type="button" href={{ route('staff.edit-view', ['id' => $staff->id]) }}
                                    class="btn
                                    btn-outline-primary btn-sm mb-2">Edit</a>

                                <a type="button" id="staffDeleteBtn" onclick="deletestaff('{{$staff->id}}')"
                                    class="btn btn-outline-danger btn-sm mb-2" style="color: #dc3545;">Delete</a>
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


<script>
  

    function deletestaff(id) {
      $.confirm({
        title: 'Confirm Deletion',
        content: 'Are you sure you want to delete this staff?',
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
            const url = '{{ route("staff.delete", ":id") }}'.replace(':id', id);
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
                      showSuccessAlert(response.success,'success','{{ route('staff.list-view') }}');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                      showErrorAlert(xhr.responseJSON.error,'warning','{{route('staff.list-view')}}');
                    } else {
                      showErrorAlert('An unexpected error occurred.','warning','{{route('staff.list-view')}}');
                    }
                }
            });
        }

 
}

</script>

@endsection