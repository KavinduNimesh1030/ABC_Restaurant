@extends('home.layouts.master')
@section('content')
<div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">ABC Restaurant {{$restaurant->location}}</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
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
</div>

@endsection

