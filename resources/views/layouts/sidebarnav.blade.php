      <!-- partial:partials/_sidebar.html -->
      <style>
        .navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    /*border-bottom: 1px solid #47748b;*/
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 18px !important;
    display: block;
    color: #fff;
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}


a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}
      </style>
      <nav id="sidebar">
            <ul class="list-unstyled components">
                <li class="{{ in_array(Route::currentRouteName(), ['admin.dashboard']) ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.create-banner','admin.all-banner']) ? 'active' : '' }}">
                    <a href="#banner" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Banners</a>
                    <ul class="collapse list-unstyled {{ in_array(Route::currentRouteName(), ['admin.create-banner','admin.all-banner']) ? 'show' : '' }}" id="banner">
                        <li>
                            <a href="{{ route('admin.create-banner') }}">Add New Banner</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all-banner') }}">All Banners</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.create-testimonial','admin.all-testimonial']) ? 'active' : '' }}">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Testimonial</a>
                    <ul class="collapse list-unstyled {{ in_array(Route::currentRouteName(), ['admin.create-testimonial','admin.all-testimonial']) ? 'show' : '' }}" id="pageSubmenu">
                        <li>
                            <a href="{{ route('admin.create-testimonial') }}">Add Testimonial</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all-testimonial') }}">All Testimonial</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.create-category','admin.all-category']) ? 'active' : '' }}">
                    <a href="#blogcategories" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Blog Categories</a>
                    <ul class="collapse list-unstyled {{ in_array(Route::currentRouteName(), ['admin.create-category','admin.all-category']) ? 'show' : '' }}" id="blogcategories">
                        <li>
                            <a href="{{ route('admin.create-category') }}">Add Blog Categories</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all-category') }}">All Blog Categories</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.create-destination','admin.all-destination']) ? 'active' : '' }}">
                    <a href="#destinations" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Destinations</a>
                    <ul class="collapse list-unstyled {{ in_array(Route::currentRouteName(), ['admin.create-destination','admin.all-destination']) ? 'show' : '' }}" id="destinations">
                        <li>
                            <a href="{{ route('admin.create-destination') }}">Add New Destination</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all-destination') }}">All Destination</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.create-pages','admin.all-faq']) ? 'active' : '' }}">
                    <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled {{ in_array(Route::currentRouteName(), ['admin.create-pages','admin.all-pages']) ? 'show' : '' }}" id="pages">
                        <li>
                            <a href="{{ route('admin.create-pages') }}">Add New Page</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all-pages') }}">All Pages</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.create-faq','admin.all-faq']) ? 'active' : '' }}">
                    <a href="#faq" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Faq</a>
                    <ul class="collapse list-unstyled {{ in_array(Route::currentRouteName(), ['admin.create-faq','admin.all-faq']) ? 'show' : '' }}" id="faq">
                        <li>
                            <a href="{{ route('admin.create-faq') }}">Add New Faq</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all-faq') }}">All faq</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>

<!--       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ in_array(Route::currentRouteName(), ['admin.dashboard']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#testimonial" aria-expanded="false" aria-controls="testimonial">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Testimonial</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="testimonial">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.create-testimonial') }}">Add Testimonial</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.all-testimonial') }}">All Testimonial</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#blogcategories" aria-expanded="false" aria-controls="blogcategories">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Blog Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blogcategories">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.create-category') }}">Add Blog Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.all-category') }}">All Blog Categories</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('logout') ? 'active' : '' }}" href="{{ route('logout') }}" 
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Logout</span>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </a>
          </li> -->
        <!--   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
        </ul>
      </nav>