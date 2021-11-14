<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Kotak Admin | {{ $title }}</title>
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ url('coreui/vendors/simplebar/css/simplebar.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('coreui/vendors/simplebar.css') }}"> --}}
    <!-- Main styles for this application-->
    <link href="{{ url('coreui/css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css') }}">
    <link href="{{ url('coreui/css/examples.css') }}" rel="stylesheet">
    {{-- <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet"> --}}
  </head>
  <body>
    @include('admin.partials.sidebar')

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">

      @include('admin.partials.navbar')

      @yield('content')

    </div>
    

    <!-- CoreUI and necessary plugins-->
    <script src="{{ url('/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ url('/coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ url('/coreui/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
    
  </body>
</html>
