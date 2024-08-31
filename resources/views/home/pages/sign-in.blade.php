@extends('home.layouts.custom')
@section('content')
{{-- <section class="section section-main section-main-1 bg-light">
    <div class="container dark">
        <div class="slide-container">
            <div id="section-main-1-carousel-image" class="image inner-controls">
                <div class="slide">
                    <div class="bg-image">
                        <img src="assets/soup/img/photos/slider-desserzt.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content dark">
                <div id="section-main-1-carousel-content">
                    <div class="content-inner">
                        <h1 class="text-center">Sign In</h1>
                        <form action="/login" method="POST">
                            <div class="form-group">
                                <label for="email" class="text-muted">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-muted">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span>Sign In</span></button>
                            </div>
                            <div class="form-group text-center">
                                <a href="/forgot-password" class="text-muted">Forgot your password?</a>
                            </div>
                            <div class="form-group text-center">
                                <p class="text-muted">Don't have an account? <a href="/register" class="text-primary">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="section section-main section-main-1 bg-light">
    <div class="container dark">
        <div class="slide-container">
            <div id="section-main-1-carousel-image" class="image inner-controls">
                <div class="slide">
                    <div class="bg-image">
                        <img src="assets/soup/img/photos/slider-dessert.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content dark">
                <div id="section-main-1-carousel-content">
                    <div class="content-inner">
                        <h1 class="text-center">Sign In</h1>

                        <!-- Session Status -->
                        @if (session('status'))
                            <p class="text-center text-success mb-4">{{ session('status') }}</p>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email" class="text-muted">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="text-muted">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label text-muted" for="remember_me">{{ __('Remember me') }}</label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span>Sign In</span></button>
                            </div>

                            <!-- Forgot Password Link -->
                            @if (Route::has('password.request'))
                                <div class="form-group text-center">
                                    <a href="{{ route('password.request') }}" class="text-muted">{{ __('Forgot your password?') }}</a>
                                </div>
                            @endif

                            <!-- Sign Up Link -->
                            <div class="form-group text-center">
                                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

