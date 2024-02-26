<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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

                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="bi bi-speedometer2"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="bi bi-house-heart-fill"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('profile.edit')}}" class="nav-link">
                        <i class="bi bi-person"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('question.index')}}" class="nav-link">
                        <i class="bi bi-question-diamond"></i>
                        <p>
                            Question
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('subject.index')}}" class="nav-link">
                        <i class="bi bi-journal"></i>
                        <p>
                            Subject
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('gameplay.choose')}}" class="nav-link">
                        <i class="bi bi-controller"></i>
                        <p>
                            Gameplay
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="bi bi-people-fill"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="p-1 bi bi-box-arrow-left"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>