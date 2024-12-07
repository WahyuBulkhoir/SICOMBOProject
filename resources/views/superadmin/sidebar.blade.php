<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href=""><img src="{{ asset('superadmincss/images/sicombo.svg') }}" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('superadmincss/images/logo-mini.svg') }}" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{ asset('superadmincss/images/faces/logosadmin.png') }}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">
                {{ Auth::user()->name ?? 'Guest' }}
            </p>
            <span>Admin</span>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('superadmin/dashboard')}}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-security"></i>
        </span>
        <span class="menu-title">Anggota PIK-R</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('add_member')}}">* Add Member </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('view_members')}}">* View Member </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('candidate_member')}}">* Candidate Member </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#path" aria-expanded="false" aria-controls="path">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Seller PIK-R</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="path">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('add_seller')}}">* Add Seller </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('view_seller')}}">* View Seller </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Event & Meeting</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('add_event')}}">* Add Event</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('view_events')}}">* View Events</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('add_meeting')}}">* Add Meeting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('view_meetings')}}">* View Meetings</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="documentation">
        <span class="menu-icon">
          <i class="mdi mdi-file-document-box"></i>
        </span>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>
