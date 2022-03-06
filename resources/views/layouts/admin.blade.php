<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mini Blog | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset("admin")}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("admin")}}/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset("admin")}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Mini Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("admin")}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('user.profile')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul> --}}
          </li>
          {{-- catagory --}}
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="fas fa-tags"></i> 
              <p>
               Category
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('tag.index')}}" class="nav-link">
              <i class="fas fa-tag"></i> 
              <p>
               Tags
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link">
              {{-- <i class="fas fa-post"></i>  --}}
              <i class="fas fa-clone"></i>
              <p>
               Posts
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>
          {{-- massage --}}
          <li class="nav-item">
            <a href="{{route('contact.index')}}" class="nav-link">
              {{-- <i class="fas fa-post"></i>  --}}
              <i class="fas fa-envelope"></i> 
              <p>
               Message
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>
          {{-- user menu --}}

          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              {{-- <i class="fas fa-post"></i>  --}}
              <i class="fas fa-user"></i>
              <p>
               User
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>
{{-- log out --}}
          <li class="nav-item">
            <label style="color: #fff;"> Your Account</label>
            <a href="{{route('user.profile')}}" class="nav-link">
              {{-- <i class="fas fa-post"></i>  --}}
              <i class="far fa-user"></i>
              <p>
               Profile
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              {{-- <i class="fas fa-post"></i>  --}}
              <i class="fas fa-clone"></i>
              <p>
               Logout
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>



          {{-- setting menu --}}
          <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link">
              {{-- <i class="fas fa-post"></i>  --}}
              <i class="fas fa-cog"></i> 
              <p>
               Setting
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </a>
          </li>
            {{-- go to front-end --}}
          <li class="nav-item">
            <a href="{{route('website.home')}}" class="nav-link btn btn-primary" target="_blank">
              {{-- <i class="fas fa-post"></i>  --}}
              {{-- <i class="fas fa-clone"></i> --}}
              <p class="mb-0">
              View Website
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset("admin")}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("admin")}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset("admin")}}/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
<script>
  @if(Session::has('success'))
  toastr.success("{{Session::get('success')}}");
  @endif
</script>
</body>
</html>
