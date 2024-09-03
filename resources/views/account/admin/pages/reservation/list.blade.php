@extends('account.layouts.default')


@section('content')
<div class="container">
    <div class="card">
        {{-- <h5 class="card-header pb-0">reservations List</h5> --}}
        <div class="card-header  row">
            <div class="col-md-10">
                <h5 class=" align-middle">Reservation List</h5>
            </div>
            <div class="col-md-2  d-md-flex justify-content-md-end">
                {{-- <a type="button" class="btn btn-outline-primary ladda-button" data-style="expand-right">
                    <span class="ladda-label">Add reservation</span>
                </a> --}}

                {{-- <a type="button" href="{{route('reservation.view')}}" class="btn btn-outline-primary">
                    <span class="ladda-label">Add reservation</span>
                </a> --}}
            </div>
        </div>
      
        <hr class="p-0 mx-4 my-0 mb-2 mb-4">
        <div class="mx-4 mb-4">
            <div id="reservationTable" class="p-2">
                <table class="table table-striped" style="width:100%;" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Phone</th>
                            <th>Attendents</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                        <tr>
                            <td>
                                {{$reservation->id}}
                            </td>
                            <td>
                                {{$reservation->reservationDetail->name}}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d') }}
                            </td>                            
                            <td>
                                {{$reservation->reservationDetail->phone}}
                            </td>
                            <td>
                                {{$reservation->reservationDetail->attendents}}
                            </td>
                            <td>
                                {{$reservation->status}}
                            </td>
                            <td>
                                    <a type="button mb-2" href="#" onclick="changePublishStatus({{ $reservation->id }}, 'Accepted')"
                                      class="btn btn-outline-success btn-sm mb-2">Accept</a>
                                   
                                    <a type="button mb-2" href="#" onclick="changePublishStatus({{ $reservation->id }}, 'Canceled')"
                                      class="btn btn-outline-warning btn-sm mb-2">Cancel</a>
                                    
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
    function changePublishStatus(reservationId, status) {
    var message = 'Are you sure you want to change the reservation status ?'
    
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
                    url: '{{ route("reservation.change-status", ":id") }}'.replace(':id', reservationId),
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        showSuccessAlert('Status changed successfully', 'success', '{{ route('reservation.list-view') }}');
                    },
                    error: function(xhr, status, error) {
                        showErrorAlert('Something went wrong', 'warning', '{{ route('reservation.list-view') }}');
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