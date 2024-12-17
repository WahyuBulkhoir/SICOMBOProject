<header class="header_section">
  <div class="container-fluid px-4"> <!-- Tambahkan container-fluid untuk memastikan layout fleksibel -->
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="">
        <span class="animated-logo">
          <span>S</span>
          <span>I</span>
          <span>C</span>
          <span>O</span>
          <span>M</span>
          <span>B</span>
          <span>O</span>
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #7BD5F5;">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" style="color: black;" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: black;" href="{{url('shop')}}">Shop</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" style="color: black;" href="{{url('testimonial')}}">Testimonial</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" style="color: black;" href="{{url('about')}}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: black;" href="{{url('contact')}}">Contact Us</a>
          </li>
        </ul>
        <div class="user_option ms-auto">
          @if (Route::has('login'))
            @auth
              <a href="{{ url('myorders') }}" class="nav-link" style="color: black;">My Orders</a>
              <a href="{{ url('mycart') }}" class="nav-link" style="color: black;">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> [{{$count}}]
              </a>
              <div class="dropdown" style="margin-right: 90px;">
                <button class="btn dropdown-toggle" style="background-color: #7BD5F5; color: black;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="color: black;">
                  <li><a class="dropdown-item" href="{{ url('edit_profile_customer') }}">Settings</a></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
            @else
              <a href="{{ url('/login') }}" class="nav-link" style="color: black;">
                <i class="fa fa-user" aria-hidden="true"></i> Login
              </a>
              <a href="{{ url('/register') }}" class="nav-link" style="color: black;">
                <i class="fa fa-vcard" aria-hidden="true"></i> Register
              </a>
            @endauth
          @endif
        </div>
      </div>
    </nav>
  </div>
</header>
