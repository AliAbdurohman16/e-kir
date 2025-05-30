<div class="header-area" id="headerArea">
   <div class="container h-100 d-flex align-items-center justify-content-between d-flex rtl-flex-d-row-r">
     <!-- Logo Wrapper -->
     <div class="logo-wrapper"><a href="{{ route('home') }}"><img src="{{ asset('frontend') }}/assets/img/core-img/DISHUB.png" width="38px" alt="logo"></a></div>
     <div class="navbar-logo-container d-flex align-items-center">
       <!-- User Profile Icon -->
       <div class="user-profile-icon ms-2">
        <a href="{{ route('profile.index') }}">
          @if (Auth::user()->image == 'default/user.jpg')
            <img src="{{ asset('default/user.jpg') }}" alt="image">
          @else
            <img src="{{ asset('storage/users/' . Auth::user()->image ) }}" alt="image">
          @endif
        </a>
      </div>
     </div>
   </div>
</div>