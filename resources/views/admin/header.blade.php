<header class="header">   
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close <i class="fa fa-close"></i></div>
                <form id="searchForm" action="#">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="What are you searching for..." class="form-control">
                        <button type="submit" class="submit btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <a href="" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase">
                        <strong class="text-primary">SICOMBO</strong><strong>Seller</strong>
                    </div>
                    <div class="brand-text brand-sm">
                        <strong class="text-primary">S</strong><strong>S</strong>
                    </div>
                </a>
                <button class="sidebar-toggle btn btn-outline-secondary">
                    <i class="fa fa-long-arrow-left"></i>
                </button>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar me-2">
                        <img src="{{ asset('admincss/img/avatar-6.png') }}" alt="..." class="img-fluid rounded-circle" style="width: 35px; height: 35px;">
                    </div>
                    <div class="title">
                        <span class="d-none d-md-block text-white">{{ ucwords(Auth::user()->name) }}
                            <i class="fa fa-chevron-down text-white"></i>
                        </span>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ url('edit_profile_seller') }}">
                            <i class="fa fa-user me-2"></i>Setting
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fa fa-sign-out me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="d-flex align-items-stretch">
