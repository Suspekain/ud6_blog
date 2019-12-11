<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.head')
</head>

<body>
  <!-- Navigation -->
  @include('layouts.nav')

  <!-- Page Content -->
  <div class="container">
    @yield('content')
  </div>
  <!-- /.container -->

  <!-- Footer -->
  @include('layouts.footer')

  <!-- Bootstrap core JavaScript -->
  @include('layouts.scripts')

</body>
</html>
