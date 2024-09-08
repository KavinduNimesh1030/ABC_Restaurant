@extends('home.layouts.master')
@section('content')
<div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">ABC Restaurant {{$restaurant->location}}</h1>
                    <h4 class="text-muted mb-0">The Best Services & Facilities</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content bg-light">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                <!-- Post / Item -->
      
                @foreach($restaurant->restaurantServices as $service)
             
                <article class="post post-wide animated" data-animation="fadeIn">
                    <div class="post-image"><img src="{{$service->service->imageables->first()->media->getPath()['original']}}" alt=""></div>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li>Services</li>
                            <li>Facilities</li>
                        </ul>
                        <h4><a href="blog-post.html">{{$service->service->name}}</a></h4>
                        <p>{{$service->service->description}}</p>
                    </div>
                </article>

                @endforeach
              
            
                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="ti ti-arrow-left"></i>
                                <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="ti ti-arrow-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            {{-- <div class="sidebar right">
                <!-- Widget - Newsletter -->
                <div class="widget widget-newsletter">
                    <h5>Subscribe Us</h5>
                    <form action="http://suelo.us12.list-manage.com/subscribe/post-json?u=ed47dbfe167d906f2bc46a01b&amp;id=24ac8a22ad" id="sign-up-form2" class="sign-up-form validate-form" method="POST"
                        data-message-error="Opps... Something went wrong - please try again later"
                        data-message-success="Yeah! You will recieve a confirmation email soon..."
                    >
                        <div class="form-group mb-0">
                            <input type="email"  name="EMAIL" id="mce-EMAIL2" value="" class="form-control" placeholder="Your e-mail..." required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-block">
                                <span>Subscribe!</span>
                            </button>
                        </div>
                    </form>
                </div>
                <hr>
                <!-- Widget - Recent posts -->
                <div class="widget widget-recent-posts">
                    <h5>Recent Posts</h5>
                    <ul class="list-posts">
                        <li>
                            <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                            <span class="date">February 14, 2015</span>
                        </li>
                        <li>
                            <a href="blog-post.html" class="title">Awesome weekend in Polish mountains!</a>
                            <span class="date">February 14, 2015</span>
                        </li>
                        <li>
                            <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                            <span class="date">February 14, 2015</span>
                        </li>
                    </ul>
                </div>
                <hr>
                <!-- Widget - Twitter -->
                <div class="widget widget-twitter">
                    <h5>Latest Tweets</h5>
                    <div id="twitter-feed" class="twitter-feed"></div>
                </div>
            </div> --}}
            </div>
        </div>

    </div>

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

