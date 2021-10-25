<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
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
        <?php $page_title = isset($data['page_title']) ? $data['page_title'] : ''; ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ url('/dashboard') }}"
                        class="nav-link {{ $page_title == 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('dashboard/post*') || request()->is('dashboard/category*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('dashboard/post*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                      <li class="nav-item ">
                          <a href="{{ url('/dashboard/post/') }}"
                              class="nav-link {{ request()->is('dashboard/post*') ? 'active' : '' }}">
                              <i class="fa fa-angle-double-right nav-icon"></i>
                              <p> Post </p>
                          </a>
                      </li>
                      <li class="nav-item ">
                          <a href="{{ '/dashboard/category/' }}"
                              class="nav-link {{ request()->is('dashboard/category*') ? 'active' : '' }}">
                              <i class="fa fa-angle-double-right nav-icon"></i>
                              <p> Category </p>
                          </a>
                      </li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                           Users
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ url('dashboard/plan') }}" class="nav-link {{ request()->is('dashboard/plan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cloud-meatball"></i>
                        <p>
                           Plans / Packages
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                           Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('dashboard/feature') }}" class="nav-link {{ request()->is('dashboard/feature*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wind"></i>
                        <p>
                           Features
                        </p>
                    </a>
                </li>
                
                <li class="nav-item hidden {{ request()->is('dashboard/settings*') || request()->is('dashboard/settings*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('dashboard/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                      <li class="nav-item ">
                          <a href="{{ url('/dashboard/post/') }}"
                              class="nav-link {{ request()->is('dashboard/settings*') ? 'active' : '' }}">
                              <i class="fa fa-angle-double-right nav-icon"></i>
                              <p> Settings </p>
                          </a>
                      </li>
                      <li class="nav-item ">
                          <a href="{{ '/dashboard/category/' }}"
                              class="nav-link {{ request()->is('dashboard/settings*') ? 'active' : '' }}">
                              <i class="fa fa-angle-double-right nav-icon"></i>
                              <p> Packages </p>
                          </a>
                      </li>
                       <li class="nav-item ">
                          <a href="{{ '/dashboard/category/' }}"
                              class="nav-link {{ request()->is('dashboard/settings*') ? 'active' : '' }}">
                              <i class="fa fa-angle-double-right nav-icon"></i>
                              <p> Features </p>
                          </a>
                      </li>
                    </ul>

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


<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
