<li class="nav-label">Main Menu</li>

<li class="nav-item {{ request()->is('dashboardFunct*') ? 'active' : '' }}">
    <a href="/dashboardFunct" class="nav-link">
        <i data-feather="shopping-bag"></i> <span>Dashboard</span>
    </a>
</li>

<li class="nav-label mg-t-25">Master Data</li>

<li class="nav-item {{ request()->is('competency') ? 'active' : '' }}">
    <a href="/competency" class="nav-link">
        <i data-feather="clipboard"></i> <span>Competency</span>
    </a>
</li>
<li class="nav-item {{ request()->is('performance*') ? 'active' : '' }}">
    <a href="/performance" class="nav-link">
        <i data-feather="file"></i> <span>Performance Standard</span>
    </a>
</li>
<li class="nav-item {{ request()->is('items*') ? 'active' : '' }}">
    <a href="/items" class="nav-link">
        <i data-feather="file-text"></i> <span>Learning Item</span>
    </a>
</li>

<li class="nav-item {{ request()->is('matrix*') ? 'active' : '' }}">
    <a href="/matrix" class="nav-link">
        <i data-feather="activity"></i> <span>Profile Matrix</span>
    </a>
</li>

<li class="nav-item {{ request()->is('employees*') ? 'active' : '' }}">
    <a href="/employees" class="nav-link">
        <i data-feather="users"></i> <span>Employees</span>
    </a>
</li>

<li class="nav-label mg-t-25">Functional Activity</li>

<li class="nav-item {{ request()->is('assessmentAdmin*') ? 'active' : '' }}">

    <a href="/assessmentAdmin" class="nav-link">
        <i data-feather="shopping-bag"></i> <span>Assessment</span>
    </a>
</li>
<li class="nav-item mg-t-25 {{ request()->is('aldpAdmin*') ? 'active' : '' }}">
    <a href="/aldpAdmin" class="nav-link">
        <i data-feather="shopping-bag"></i> <span>ALDP</span>
    </a>
</li>
<li class="nav-item show with-sub {{ request()->is('closegap*') ? 'active' : '' }}">
    <a href="" class="nav-link with-sub"><i data-feather="shopping-bag"></i> <span>Close Gap Activity</span></a>
    <ul>
      <li class="{{ request()->is('closegapfunctional') ? 'active' : '' }}"><a href="/closegapfunctional">Functional</a></li>
      <li class="{{ request()->is('closegapleadership') ? 'active' : '' }}"><a href="/closegapleadership">Leadership</a></li>
      <li class="{{ request()->is('closegapother') ? 'active' : '' }}"><a href="/closegapother">Other</a></li>
    </ul>
  </li>
{{-- <li class="nav-item mt-25 {{ request()->is('closegap*') ? 'active' : '' }}">
    <a href="/closegap" class="nav-link">
        <i data-feather="shopping-bag"></i> <span>Close Gap Activity Before</span>
    </a>
</li> --}}


<li class="nav-label mg-t-25">Configuration</li>

<li class="nav-item mt-25 {{ request()->is('userlogin*') ? 'active' : '' }}">
    <a href="/userlogin" class="nav-link">
        <i data-feather="settings"></i> <span>User Login</span>
    </a>
</li>
