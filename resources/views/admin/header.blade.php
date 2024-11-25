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
                        <strong class="text-primary">Dark</strong><strong>Seller</strong>
                    </div>
                    <div class="brand-text brand-sm">
                        <strong class="text-primary">D</strong><strong>S</strong>
                    </div>
                </a>
                <button class="sidebar-toggle btn btn-outline-secondary">
                    <i class="fa fa-long-arrow-left"></i>
                </button>
            </div>
            <div class="list-inline-item logout">                   
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-danger">
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="d-flex align-items-stretch">
