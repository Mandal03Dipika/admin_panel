<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('images/quiz.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Quiz Game</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                @if (auth()->user()->role == 'admin')
                @include('layouts.partition.sidebar_admin')
                @else
                @include('layouts.partition.sidebar_user')
                @endif
                {{-- <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="p-1 bi bi-box-arrow-left"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </form>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>