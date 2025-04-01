<!-- Footer Nav-->
 <div class="footer-nav-area" id="footerNav">
   <div class="suha-footer-nav">
     <ul class="h-100 d-flex align-items-center justify-content-between ps-0 d-flex rtl-flex-d-row-r">
       <li><a href="{{ route('home') }}"><i class="ti ti-home"></i>Home</a></li>
       <li><a href="{{ route('daftar-uji.index') }}"><i class="ti ti-notebook"></i>Daftar Uji</a></li>
       <li><a href="{{ route('profile.index') }}"><i class="ti ti-user"></i>Profil</a></li>
       <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti ti-logout"></i>Keluar</a></li>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
       </form>
     </ul>
   </div>
 </div>
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
 @yield('js')