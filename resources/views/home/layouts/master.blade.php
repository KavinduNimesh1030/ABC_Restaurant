<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Title -->
    <title>ABC Restaurant</title>
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&amp;family=Raleway:wght@100;200;400;500&amp;display=swap" rel="stylesheet">
    
    <!-- CSS Core -->
    <link rel="stylesheet" href="{{url('assets/dist/css/core.css')}}" />
    
    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{url('assets/dist/css/theme-beige.css')}}" />
   
  
</head>

<body>
    
<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">
    @include('home.layouts.includes.header')
    <!-- sidebar & backdrop -->
    {{-- @include('home.layouts.includes.mobile-nav') --}}

    <!-- navbar -->
    {{-- @include('home.layouts.includes.navbar') --}}
    <main>
       @yield('content')
    </main>

    @include('home.layouts.includes.cart')
    @include('home.layouts.includes.panel-mobile')
    
     <!-- Body Overlay -->
     <div id="body-overlay"></div>

    @include('home.layouts.includes.footer')
    
    @include('home.layouts.includes.tail')
</div>
    @yield('scripts')
    {{-- <script src="{{url('assets/scripts/script.js')}}"></script> --}}

</body>

</html>
