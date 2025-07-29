<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ auth()->user()->name }}</span>

                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profil</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Çıxış</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    A
                </div>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'welcome') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'welcome']) }}"><i class="fa fa-th-large"></i> <span
                        class="nav-label">İdarə
                        Paneli</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'contactus') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'contactus']) }}"><i class="fa fa-phone"></i> <span
                        class="nav-label">Bizimlə əlaqə</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'aksiyalar') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'aksiyalar']) }}"><i class="fa fa-percent"></i> <span
                        class="nav-label">Aksiyalar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'products') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'products']) }}"><i class="fa fa-toggle-on"></i> <span
                        class="nav-label">Məhsullar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'services') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'services']) }}"><i class="fa fa-window-minimize"></i> <span
                        class="nav-label">Xidmət</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'categories') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'categories']) }}"><i class="fa fa-archive"></i> <span
                        class="nav-label">Kateqoriyalar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'subscription_packages') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'subscription_packages']) }}"><i class="fa fa-cube"></i> <span
                        class="nav-label">Ödəmə paketləri</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'partners') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'partners']) }}"><i class="fa fa-battery-three-quarters"></i> <span
                        class="nav-label">Partnyorlar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'teams') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'teams']) }}"><i class="fa fa-users"></i> <span
                        class="nav-label">Komanda</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'managers') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'managers']) }}"><i class="fa fa-users"></i> <span
                        class="nav-label">İdarəçilər</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'faqs') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'faqs']) }}"><i class="fa fa-question"></i> <span class="nav-label">Çox
                        soruşulan suallar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'whychooseus') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'whychooseus']) }}"><i class="fa fa-spinner"></i> <span class="nav-label">Niyə bizi seçməlisiniz</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'sliders') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'sliders']) }}"><i class="fa fa-photo"></i> <span
                        class="nav-label">Slayderlər</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'standartpages') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'standartpages']) }}"><i class="fa fa-file"></i> <span
                        class="nav-label">Standart Səhifələr</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'blogs') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'blogs']) }}"><i class="fa fa-rss"></i> <span
                        class="nav-label">Bloqlar</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'settings') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'settings']) }}"><i class="fa fa-cog"></i> <span
                        class="nav-label">Parametrlər</span></a>
            </li>

            <li class="{{ \Illuminate\Support\Str::contains(url()->full(), 'translates') ? 'active' : '' }}">
                <a href="{{ route('admin.index', ['page' => 'translates']) }}"><i class="fa fa-globe"></i> <span
                        class="nav-label">Tərcümələr</span></a>
            </li>


        </ul>

    </div>
</nav>
