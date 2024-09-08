@extends('home.layouts.master')
@section('content')
<div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">User Dashboard</h1>
                    <h4 class="text-muted mb-0">Manage Your Orders, Reservations & Inquiries</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <!-- Orders Section -->
                    <section class="orders-section mb-5">
                        <h3 class="mb-3">Your Orders</h3>
                        @foreach($user->orders as $order)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Order #{{ $order->id }}</h5>
                                {{-- <p class="card-text">Total: ${{ $order->total }}</p> --}}
                                <p class="card-text">Status: {{ $order->status }}</p>
                                {{-- <a href="{{ route('order.details', $order->id) }}" class="btn btn-primary">View Details</a> --}}
                            </div>
                        </div>
                        @endforeach
                    </section>

                    <!-- Reservations Section -->
                    <section class="reservations-section mb-5">
                        <h3 class="mb-3">Your Reservations</h3>
                        @foreach($user->reservations as $reservation)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Reservation #{{ $reservation->id }}</h5>
                                <p class="card-text">Date: {{ $reservation->date }}</p>
                                {{-- <p class="card-text">Time: {{ $reservation->time }}</p>
                                <a href="{{ route('reservation.details', $reservation->id) }}" class="btn btn-primary">View Details</a> --}}
                            </div>
                        </div>
                        @endforeach
                    </section>

                    <!-- Inquiries Section -->
                    <section class="inquiries-section mb-5">
                        <h3 class="mb-3">Your Inquiries</h3>
                        @foreach($user->inquiries as $inquiry)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Inquiry #{{ $inquiry->id }}</h5>
                                <p class="card-text">{{ $inquiry->message }}</p>
                                <a href="{{ route('inquiry.details', $inquiry->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                        @endforeach
                    </section>

                    <!-- Pagination (optional) -->
                    <nav aria-label="Page navigation" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
