@extends('account.layouts.default')
@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">payments List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class=" align-middle">Payment</h5>
            </div>
            <div class="col-md-2  d-md-flex justify-content-md-end">
                {{-- <a type="button" class="btn btn-outline-primary ladda-button" data-style="expand-right">
                    <span class="ladda-label">Add payment</span>
                </a> --}}

                {{-- <a type="button" href="{{route('payment.view')}}" class="btn btn-outline-primary">
                    <span class="ladda-label">Add payment</span>
                </a> --}}
            </div>
        </div>
      
        <hr class="p-0 mx-4 my-0 mb-2 mb-4">
        <div class="mx-4 mb-4">
            <div id="paymentTable" class="p-2">
                <table class="table table-striped" style="width:100%;" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>
                                {{$payment->id}}
                            </td>
                            <td>
                                {{$payment->amount}}
                            </td>
                            <td>
                                {{$payment->payment_date}}
                            </td>
                            <td>
                                {{ $payment->payment_method }}
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
</script>
@endsection


