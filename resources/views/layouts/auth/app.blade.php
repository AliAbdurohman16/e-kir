<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="E-KIR">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#625AFA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Title -->
    <title>@yield('title') | E-KIR </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/tabler-icons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only"></div>
      </div>
    </div>
    
    @yield('content')

    <!-- All JavaScript Files-->
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/active.js"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
      if ("serviceWorker" in navigator) {
          // Register a service worker hosted at the root of the
          // site using the default scope.
          navigator.serviceWorker.register("/sw.js").then(
          (registration) => {
            console.log("Service worker registration succeeded:", registration);
          },
          (error) => {
            console.error(`Service worker registration failed: ${error}`);
          },
        );
      } else {
        console.error("Service workers are not supported.");
      }
    </script>
  </body>
</html>