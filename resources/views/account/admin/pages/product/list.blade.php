@extends('account.layouts.default')


@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">products List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class=" align-middle">Products List</h5>
            </div>
            <div class="col-md-2  d-md-flex justify-content-md-end">
                {{-- <a type="button" class="btn btn-outline-primary ladda-button" data-style="expand-right">
                    <span class="ladda-label">Add product</span>
                </a> --}}

                {{-- <a type="button" href="{{route('product.view')}}" class="btn btn-outline-primary">
                    <span class="ladda-label">Add product</span>
                </a> --}}
            </div>
        </div>
        <hr class="p-0 mx-4 my-0 mb-2 mb-4">
        <div class="mx-4 mb-4">
            <div id="productTable" class="p-2">
                <table class="table table-striped" style="width:100%;" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->category->name}}
                            </td>
                            <td>
                                {{$product->price}}
                            </td>
                            <td>
                                <a type="button" href={{ route('product.edit-view', ['id' => $product->id]) }}
                                    class="btn
                                    btn-outline-primary btn-sm mb-2">Edit</a>

                                <a type="button" id="productDeleteBtn" onclick="deleteStaff('{{$product->id}}')"
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
  

    function deleteStaff(id) {
      $.confirm({
        title: 'Confirm Deletion',
        content: 'Are you sure you want to delete this product?',
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
            const url = '{{ route("product.delete", ":id") }}'.replace(':id', id);
            const token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    _token: token
                },
                success: function(response) {
                    showSuccessAlert("Product Delete successfully", 'success',
                    '{{ route('product.list-view') }}');
                },
                error: function(error) {
                    console.log(error);
                    showErrorAlert('An unexpected error occurred.','warning','{{route('product.list-view')}}');
                }
            });
        }

 


</script>

@endsection