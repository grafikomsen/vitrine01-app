<div class="position-sticky vh-100 pt-3 sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-uppercase nav-link fs-2 fw-bolder {{ (Session::get('page') == 'dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <span data-feather="home" class="align-text-bottom"></span>
                Dashbord
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'services') ? 'active' : '' }}" href="{{ route('admin.services') }}">
            <span data-feather="file" class="align-text-bottom"></span>
                Services
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'blogs') ? 'active' : '' }}" href="{{ route('admin.blogs') }}">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Blogs
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'parterns') ? 'active' : '' }}" href="{{ route('admin.partners') }}">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Partenaires
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'faqs') ? 'active' : '' }}" href="{{ route('admin.faqs') }}">
                <span data-feather="users" class="align-text-bottom"></span>
                Faqs
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'pages') ? 'active' : '' }}" href="{{ route('admin.pages') }}">
                <span data-feather="users" class="align-text-bottom"></span>
                Pages
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'teams') ? 'active' : '' }}" href="{{ route('admin.teams') }}">
                <span data-feather="users" class="align-text-bottom"></span>
                Teams
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'banners') ? 'active' : '' }}" href="{{ route('admin.banners') }}">
                <span data-feather="users" class="align-text-bottom"></span>
                Slides
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase fs-5 fw-bolder {{ (Session::get('page') == 'settings') ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Paramétres
            </a>
        </li>
    </ul>
</div>
