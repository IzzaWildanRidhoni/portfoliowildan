  <header id="header" class="header d-flex align-items-center light-background sticky-top">
      <div class="container position-relative d-flex align-items-center justify-content-between">

          <nav id="navmenu" class="navmenu">
              <ul>
                  <li><a href="{{ route('home') }}" class="active">Home</a></li>
                  {{-- <li><a href="about.html">About</a></li>
                  <li><a href="resume.html">Resume</a></li>
                  <li><a href="services.html">Services</a></li> --}}
                  <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                  <li><a href="{{ route('contact') }}">Contact</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

          <div class="header-social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>

      </div>
  </header>
