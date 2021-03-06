<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="HighPharma Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">HighPharma</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ $i[0] }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحة التحكم

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ $i[1] }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            المخزن

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.clients.index') }}" class="nav-link {{ $i[2] }}">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>
                            الطلبات

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ $i[3] }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            المستخدمين

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{ route('admin.profile') }}" class="nav-link {{ $i[4] }}">
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>
                            الصفحة الشخصية

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview ">
                    <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-arrow-right"></i>
                        <p>
                            تسجيل الخروج

                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>






            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
