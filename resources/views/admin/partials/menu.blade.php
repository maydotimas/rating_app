@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.dash') ? 'active' : '' }}" href="{{ route(ADMIN . '.dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-dashboard"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.daily') ? 'active' : '' }}" href="{{ route(ADMIN . '.daily.reactions') }}">
        <span class="icon-holder">
            <i class="c-teal-500 ti-shine"></i>
        </span>
        <span class="title">Daily Report</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.monthly') ? 'active' : '' }}" href="{{ route(ADMIN . '.monthly.reactions') }}">
        <span class="icon-holder">
            <i class="c-amber-500 ti-calendar"></i>
        </span>
        <span class="title">Monthly Report</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.dash') ? 'active' : '' }}" href="{{ route(ADMIN . '.dash') }}">
        <span class="icon-holder">
            <i class="c-pink-500 ti-face-sad"></i>
        </span>
        <span class="title">Negative Reactions</span>
    </a>
</li>
<hr>

<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.reactions') ? 'active' : '' }}" href="{{ route(ADMIN . '.reactions.index') }}">
        <span class="icon-holder">
            <i class="c-red-500 ti-face-smile"></i>
        </span>
        <span class="title">Reactions Management</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
        <span class="icon-holder">
            <i class="c-green-500 ti-user"></i>
        </span>
        <span class="title">Users Management</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ starts_with($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-panel"></i>
        </span>
        <span class="title">Settings</span>
    </a>
</li>
