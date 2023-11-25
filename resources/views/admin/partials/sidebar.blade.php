<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('admin.dashboard') }}">
                Admin
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="nav-link-title">
                            Home 
                        </span>
                    </a>
                     <a class="nav-link" href="{{ route('view.category') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-solid fa-border-all"></i>
                        </span>
                        <span class="nav-link-title">
                            Category 
                        </span>
                    </a>
                      <a class="nav-link" href="{{ route('view.brand') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-brands fa-bandcamp"></i>
                        </span>
                        <span class="nav-link-title">
                            Brand 
                        </span>
                    </a>
                    <a class="nav-link" href="{{ route('view.product') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-brands fa-product-hunt"></i>
                        </span>
                        <span class="nav-link-title">
                            Product 
                        </span>
                    </a>
                      <a class="nav-link" href="{{ route('view.order') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-brands fa-jedi-order"></i>
                        </span>
                        <span class="nav-link-title">
                            Order 
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-brands fa-bandcamp"></i>
                        </span>
                        <span class="nav-link-title">
                            Interface
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="">
                                    Accordion
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
