@extends('home.layouts.master')
@section('content')
<div id="content">
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-4">
                        <h1 class="mb-0">Special Offers</h1>
                        <h4 class="text-muted mb-0">Discover special offers crafted just for you</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content bg-light">
            <div class="container">

                @foreach($offers as $offer)
                <div class="special-offer mb-5 animated" data-animation="fadeIn">
                    <img src="{{url($offer->product->imageables->first()->media->getPath()['original'])}}" alt="" class="special-offer-image">
                    <div class="special-offer-content">
                        <h2 class="mb-2">{{$offer->name}}</h2>
                        <h5 class="text-muted mb-5">Untill {{$offer->end_date}}</h5>
                        <ul class="list-check text-lg mb-0">
                            <li><p>{{$offer->offer_description}}</p></li>
                            {{-- <li class="false">Order higher that $40</li>
                            <li>Unless one burger ordered</li> --}}
                        </ul>
                    </div>
                </div>
                        
                @endforeach
              
            </div>
        </div>

    </div>
@endsection

