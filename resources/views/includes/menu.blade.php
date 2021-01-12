<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Seda'{{ __('translate.blogS') }}</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('translate.home') }}</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>{{ __('translate.profile') }}</span></a>
    </li>


    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('post.create') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ __('translate.create') }}</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('post.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('translate.posts') }}</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('userPosts') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>{{ __('translate.my_posts') }}</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
