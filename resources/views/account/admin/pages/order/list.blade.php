@extends('account.layouts.default')


@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">orders List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class=" align-middle">Order List</h5>
            </div>
            <div class="col-md-2  d-md-flex justify-content-md-end">
                {{-- <a type="button" class="btn btn-outline-primary ladda-button" data-style="expand-right">
                    <span class="ladda-label">Add order</span>
                </a> --}}

                {{-- <a type="button" href="{{route('order.view')}}" class="btn btn-outline-primary">
                    <span class="ladda-label">Add order</span>
                </a> --}}
            </div>
        </div>
      
        <hr class="p-0 mx-4 my-0 mb-2 mb-4">
        <div class="mx-4 mb-4">
            <div id="orderTable" class="p-2">
                <table class="table table-striped" style="width:100%;" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                     
                        <tr>
                            <td>
                                {{$order->id}}
                            </td>
                            <td>
                                {{$order->orderDetail->first_name}}
                            </td>
                            <td>
                                {{$order->orderDetail->phone_number}}
                            </td>
                            <td>
                                {{ $order->orderDetail->address }}
                            </td>
                            <td>
                                {{$order->status}}
                            </td>
                            <td>
                                    <a type="button mb-2" href="#" onclick="changePublishStatus({{ $order->id }}, 'Accepted')"
                                      class="btn btn-outline-success btn-sm mb-2">Accept</a>
                                   
                                    <a type="button mb-2" href="#" onclick="changePublishStatus({{ $order->id }}, 'Canceled')"
                                      class="btn btn-outline-warning btn-sm mb-2">Cancel</a>

                                      <a type="button" href={{ route('order.get-item', ['id' => $order->id]) }}
                                        class="btn
                                        btn-outline-primary btn-sm mb-2">View</a>
                                    
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
    function changePublishStatus(orderId, status) {
    var message = 'Are you sure you want to change the order status ?'
    
    $.confirm({
        title: 'Confirm!',
        content: message,
        buttons: {
            confirm: function () {
                var formData = new FormData();
                formData.append('status', status);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
                $.ajax({
                    url: '{{ route("order.change-status", ":id") }}'.replace(':id', orderId),
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showSuccessAlert('Status changed successfully', 'success', '{{ route('order.list-view') }}');
                    },
                    error: function(xhr, status, error) {
                        showErrorAlert('Something went wrong', 'warning', '{{ route('order.list-view') }}');
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