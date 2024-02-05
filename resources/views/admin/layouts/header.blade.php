
<style>.nav-item.line-between + .nav-item.line-between {
    border-top: 1px solid #ccc; /* Change color as needed */
    margin-top: 10px; /* Adjust margin as needed */
}
.sidebar-divider {
    height: 1px;
    background-color: #333; /* or any other color you prefer */
    margin: 10px 0; /* adjust margin according to your design */
}

/* Hide scrollbar for Chrome, Safari, and Opera */


</style>
<style>
    @media only screen and (max-width: 768px) {
        .navbar-nav .nav-link {
            margin: 5px 0; /* Adjust the margin for smaller screens */
        }

        .navbar-nav.ml-auto .nav-link {
            margin-right: 10px; /* Adjust the margin for smaller screens */
        }

        .user-panel .info {
            margin-left: 10px; /* Adjust the margin for smaller screens */
        }
    }

    /* Add any additional styling here for larger screens if needed */
</style>
<style>
        /* Custom styles for navbar */
        .navbar {
            background-color: #f8f9fa; /* Navbar background color */
        }

        .navbar-nav .nav-item:hover .nav-link {
            color: #007bff; /* Hover color for list items */
        }

        .user-panel .image i {
            color: #007bff; /* User icon color */
        }

        .dropdown-menu a {
            color: #343a40; /* Dropdown link color */
        }

        .dropdown-menu a:hover {
            background-color: #007bff; /* Dropdown link hover background color */
            color: #fff; /* Dropdown link hover text color */
        }
    </style>
<style>
    .navbar-nav li.nav-item {
        border-radius: 8px; /* Adjust the value to your desired border radius */
    }

    .navbar-nav li.nav-item:hover {
        background-color: yellow; /* Change to your desired hover background color */
    }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="width: 1080px">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item1">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <i class="fas fa-user-circle fa-2x" style="height: 30px;"></i>
                </div>
                <div class="info">
                @auth
        <a href="#" style="color:black;"class="d-block">{{ auth()->user()->name }}</a>
    @endauth                </div>
            </div>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="dropdown" href="#">
                Inbox
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <!-- Additional tags for styling -->
        <li class="nav-item">
            <a href="#" class="nav-link">Face book</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">WhatsApp</a>
        </li>
        <!-- Add more tags as needed -->

    </ul>
</nav>


<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- <a href="index3.html" class="brand-link">
    <img src="{{url('public/admin/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a> -->

  <!-- Sidebar -->
  <div class="sidebar" style="position: fixed; height: 100%; overflow-y: auto; background-color: #ABDDF3;
">
    <!-- Sidebar user panel (optional) -->
    

    <!-- SidebarSearch Form -->
    <div class="form-inline" style="width:232px;">
    
</div>



    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <!-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li> -->
            @auth
        @if(auth()->user()->role == 1)
            <li style="margin-top:10px;" class="sidebar-item">
              <a class="sidebar-link nav-link {{ request()->segment(2) === 'admin' ? 'active' : '' }}" href="{{url('/admin/admin/list')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">User</span>
              </a>
            </li>
            @endif
        @endauth
           
          
    
            <li style="margin-top:10px;" class="sidebar-item">
              <a href="{{url('/admin/maillist')}}" class="sidebar-link nav-link {{ request()->segment(2) === 'maillist' ? 'active' : '' }}" aria-expanded="false">
              <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Message</span>
              </a>
            </li>
           
            <li style="margin-top:10px;" class="sidebar-item">
              <a class="sidebar-link nav-link {{ request()->segment(2) === 'blog' ? 'active' : '' }}" href="{{route('blog-list')}}" aria-expanded="false">
                <span>
                <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Work</span>
              </a>
            </li>
           
            @auth
    @if(auth()->user()->role == 1)
        <li style="margin-top: 10px;" class="sidebar-item">
            <a href="{{route('blogsco-list')}}" class="sidebar-link nav-link {{ request()->segment(2) === 'blogseo' ? 'active' : '' }}" aria-expanded="false">
                <span>
                <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Sco Blog</span>
            </a>
        </li>
    @endif
@endauth
@auth
@if(auth()->user()->role == 1)
        <li style="margin-top: 10px;" class="sidebar-item">
            <a href="{{route('blog-logo')}}" class="sidebar-link nav-link {{ request()->segment(2) === 'logo' ? 'active' : '' }}" aria-expanded="false">
                <span>
                <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Logo</span>
            </a>
        </li>
    @endif
@endauth
<div class="sidebar-divider"></div>

<li class="sidebar-item ">
    <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
        <span>
            <i class="ti ti-file-description"></i>
        </span>
        <span class="hide-menu">Forms</span>
    </a>
</li>



            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                <span>
                  <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Typography</span>
              </a>
            </li>
         
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Icons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
</ul>
</nav>
    <!-- Sidebar Menu -->
   
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>