<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Yummy</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Contact</a></li>
          
         
          @if(auth()->check())
          <li class="dropdown"><a href="#"><span>My Profile</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('edit_profile') }}">Edit Profile</a></li>
              <li><a href="{{ route('edit_password') }}">Change Password</a></li>
            </ul>
          </li>
          @else
          <li><a href="{{ route('login') }}">Login</a></li>
          @endif
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @if(!auth()->check())
      <a class="btn-getstarted" href="{{ route('register') }}">Register</a>
     @else
      <a class="btn-getstarted" href="#book-a-table">Book a Table</a>
      <a class="btn-getstarted" href="{{ route('logout') }}">Logout</a>
      @endif

    </div>
  </header>