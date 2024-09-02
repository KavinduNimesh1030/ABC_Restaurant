@extends('home.layouts.master')
@section('content')
<div id="content">
    <section class="section section-lg bg-dark">
        <div class="bg-video dark-overlay" data-src="http://assets.suelo.pl/soup/video/video_3.mp4" data-type="video/mp4"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Book a Table -->
                    <div class="utility-box">
                        <div class="utility-box-title bg-dark dark">
                            <div class="bg-image"><img src="assets/soup/img/photos/modal-review.jpg" alt=""></div>
                            <div>
                                <span class="icon icon-primary"><i class="ti ti-bookmark-alt"></i></span>
                                <h4 class="mb-0">Book a table</h4>
                                <p class="lead text-muted mb-0">Details about your reservation.</p>
                            </div>
                        </div>
                        {{-- <form action="#" id="booking-form1" class="booking-form" data-validate>
                            <div class="utility-box-content">
                                <div class="form-group">
                                    <label>Name and surename:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <input type="date" name="reservation_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Attendens:</label>
                                            <input type="number" name="attendents" min="1" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                <span class="description">Make reservation!</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                                </span>
                                <span class="error">Try again...</span>
                            </button>
                        </form> --}}

                        <form action="#" id="booking-form1" class="booking-form" data-validate>
                            <div class="utility-box-content">
                                <div class="form-group">
                                    <label for="firstName">Name and Surname:</label>
                                    <input type="text" id="firstName" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" id="phone" name="phone" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="reservation_date">Date:</label>
                                            <input type="date" id="reservation_date" name="reservation_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="attendents">Attendens:</label>
                                            <input type="number" id="attendents" name="attendents" min="1" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="reservationBtn" class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="button">
                                <span class="description">Make reservation!</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                                </span>
                                <span class="error">Try again...</span>
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </section>


</div>
@endsection
