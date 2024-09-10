@extends('home.layouts.custom')
@section('content')
{{-- <section class="section section-main section-main-1 bg-light">
    <div class="container dark">
        <div class="slide-container">
            <div id="section-main-1-carousel-image" class="image inner-controls">
                <div class="slide">
                    <div class="bg-image">
                        <img src="assets/soup/img/photos/slider-burger.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content dark">
                <div id="section-main-1-carousel-content">
                    <div class="content-inner ">
                        <h1 class="text-center mt-4">Sign Up</h1>
                        <form method="POST" action="{{ route('register') }}" style="margin-top: -40px;">
                            <div class="form-group">
                                <label for="name" class="text-muted">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('email') }}" required autocomplete="username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-muted">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-muted">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="text-muted">Confirm Password</label>
                                <input type="password" id="confirm-password" name="confirm_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span>Sign Up</span></button>
                            </div>
                            <div class="form-group text-center">
                                <p class="text-muted">Already have an account? <a href="/login" class="text-primary">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <section class="section section-main section-main-1 bg-light">
    <div class="container dark">
        <div class="slide-container">
            <div id="section-main-1-carousel-image" class="image inner-controls">
                <div class="slide">
                    <div class="bg-image">
                        <img src="assets/soup/img/photos/slider-burger.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content dark">
                <div id="section-main-1-carousel-content">
                    <div class="content-inner">
                        <h1 class="text-center">Sign Up</h1>
                        <!-- Laravel Register Form -->
                        <form method="POST" action="{{ route('register') }}" style="margin-top: -60px;">
                            @csrf

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="text-muted">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="form-group mt-4">
                                <label for="email" class="text-muted">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group mt-4">
                                <label for="password" class="text-muted">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mt-4">
                                <label for="password_confirmation" class="text-muted">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-4 text-center">
                                <button type="submit" class="btn btn-outline-primary btn-lg">
                                    <span>Register</span>
                                </button>
                            </div>
                            <div class="form-group text-center">
                                <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign In</a></p>
                            </div>
                        </form>
                        <!-- End Laravel Register Form -->
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
                        <img src="assets/soup/img/photos/slider-burger.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content dark">
                <div id="section-main-1-carousel-content">
                    <div class="content-inner">
                        <h1 class="text-center ">Sign Up</h1>
                        <form method="POST" action="{{ route('register') }}" style="margin-top: -30px;">
                            @csrf

                            <!-- Name -->
                            {{-- <div class="form-group">
                                <label for="name" class="text-muted">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autocomplete="name">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="form-row">
                                <!-- First Name -->
                                <div class="form-group col-md-6">
                                    <label for="first_name" class="text-muted">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}" required autocomplete="given-name">
                                    @error('first_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            
                                <!-- Last Name -->
                                <div class="form-group col-md-6">
                                    <label for="last_name" class="text-muted">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required autocomplete="family-name">
                                    @error('last_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email" class="text-muted">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="text-muted">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation" class="text-muted">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span>Sign Up</span></button>
                            </div>

                            <div class="form-group text-center">
                                <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

