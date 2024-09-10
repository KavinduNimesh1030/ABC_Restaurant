<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<meta name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title>Usefulfy-Admin</title>
<meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
<meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
  @include('account.admin.layouts.includes.header')
  @yield('styles')
</head>

<body>
  <div class="container-xxl">
    @yield('content')
  </div>

  @include('account.admin.layouts.includes.tail')
  @yield('scripts')
</body>

</html>