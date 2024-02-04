<nav class="main-menu">
    <h2 class="dashboard-title">Inpo Game<span></span></h2>
    <ul>
        <li>
            <a href="{{ route('item.home')}}">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                    HOME
                </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="{{ route('item.create') }}">
                <i class="fa fa-plus fa-2x"></i>
                <span class="nav-text">
                    POSTINGAN BARU
                </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="{{ route('nf') }}">
                <i class="fa fa-comments fa-2x"></i>
                <span class="nav-text">
                    GROUP HUB FORUMS
                </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="{{ route('nf') }}">
                <i class="fa fa-camera-retro fa-2x"></i>
                <span class="nav-text">
                    SURVEY PHOTOS
                </span>
            </a>

        </li>
        <li>
            <a href="{{ route('nf') }}">
                <i class="fa fa-film fa-2x"></i>
                <span class="nav-text">
                    SURVEYING TUTORIALS
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('setting') }}">
                <i class="fa fa-book fa-2x"></i>
                <span class="nav-text">
                    POSTINGAN
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('nf') }}">
                <i class="fa fa-cogs fa-2x"></i>
                <span class="nav-text">
                    TOOLS & RESOURCES
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('nf') }}">
                <i class="fa fa-map-marker fa-2x"></i>
                <span class="nav-text">
                    MEMBER MAP
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('price') }}">
                <i class="fa fa-info fa-2x"></i>
                <span class="nav-text">
                    BLACK IND
                </span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li>
            <a href="{{ route('logout') }}">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    LOGOUT
                </span>
            </a>
        </li>
    </ul>
</nav>