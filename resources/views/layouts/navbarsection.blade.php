<li class="nav-label">
    Main Menu</li>

<li class="nav-item {{ request()->is('profileEmploy*') ? 'active' : '' }}">
    <a href="/profileEmploy" class="nav-link">
        <i data-feather="user"></i> <span>Profile</span>
    </a>
</li>


<li class="nav-label mg-t-25">Employee Area</li>

<li class="nav-item {{ request()->is('assessmentEmployee*') ? 'active' : '' }}">
    <a href="/assessmentEmployee" class="nav-link">
        <i data-feather="check-circle"></i> <span>Assessment</span>
    </a>
</li>
<li class="nav-item mt-25 {{ request()->is('mylearning*') ? 'active' : '' }}">
    <a href="/mylearning" class="nav-link">
        <i data-feather="book-open"></i> <span>My Learning</span>
    </a>
</li>

<li class="nav-label mg-t-25">Manager Area</li>

<li class="nav-item {{ request()->is('dashboardSection*') ? 'active' : '' }}">

    <a href="/dashboardSection" class="nav-link">
        <i data-feather="pie-chart"></i> <span>Dashboard</span>
    </a>
</li>
<li class="nav-item mg-t-25 {{ request()->is('aldpSection*') ? 'active' : '' }}">
    <a href="/aldpSection" class="nav-link">
        <i data-feather="clipboard"></i> <span>ALDP</span>
    </a>
</li>
<li class="nav-item mg-t-25 {{ request()->is('assessmentValidation*') ? 'active' : '' }}">
    <a href="/assessmentValidation" class="nav-link">
        <i data-feather="check-square"></i> <span>Assessment Validation</span>
    </a>
</li>

<li class="nav-item mg-t-25 {{ request()->is('subordinate*') ? 'active' : '' }}">
    <a href="/subordinate" class="nav-link">
        <i data-feather="users"></i> <span>Subordinate</span>
    </a>
</li>
