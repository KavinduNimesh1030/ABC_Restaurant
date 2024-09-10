<head>
  @include('account.layouts.includes.header')
  @yield('styles')
</head>

<body>
  <!-- Loader -->
  @include('account.layouts.includes.loader')
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      @include('account.layouts.includes.sidebar')
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('account.layouts.includes.nav')

        <!-- Alert -->
        @include('account.layouts.includes.alert')

        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
          <!-- / Content -->

          <!-- Footer -->
          @include('account.layouts.includes.footer')
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

  </div>
  <!-- / Layout wrapper -->
  @include('account.layouts.includes.tail')
  @yield('scripts')
  {{-- @yield('mainImageScripts') --}}
  @yield('ogImageScripts')
  @yield('imageUploaderScripts')
</body>

</html>