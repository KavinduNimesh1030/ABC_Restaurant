@extends('account.layouts.default')


@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">orders List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class=" align-middle">Order Items </h5>
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
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $orderItem)
                     
                        <tr>
                            <td>
                                {{$orderItem->id}}
                            </td>
                            <td>
                                {{$orderItem->order->id}}
                            </td>
                            <td>
                                {{$orderItem->product->name}}
                            </td>
                            <td>
                                {{$orderItem->qty}}
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

