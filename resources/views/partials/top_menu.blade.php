<div class="navbar navbar-expand-md navbar-dark">
    <div class="mt-2 mr-5">
        <a href="{{ route('dashboard') }}" class="d-inline-block">
        <h4 class="text-bold text-white">{{ Qs::getSystemName() }}</h4>
        </a>
    </div>

    <div class="d-md-none">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-switch2"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>

    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
		<span class="navbar-text ml-md-3 mr-md-auto"></span>
        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </li>
        </ul>
    </div>
</div>
