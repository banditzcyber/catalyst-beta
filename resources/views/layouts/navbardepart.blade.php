<li class="nav-label">Main Menu</li>

<li class="nav-item {{ request()->is('departmentDashboard*') ? 'active' : '' }}">

    <a href="/departmentDashboard" class="nav-link">
        <i data-feather="pie-chart"></i> <span>Dashboard</span>
    </a>
</li>
<li class="nav-item mg-t-25 {{ request()->is('departAldp*') ? 'active' : '' }}">
    <a href="/departAldp" class="nav-link">
        <i data-feather="clipboard"></i> <span>ALDP</span>
    </a>
</li>
<li class="nav-item mg-t-25 {{ request()->is('assessmentValidationDepartment*') ? 'active' : '' }}">
    <a href="/assessmentValidationDepartment" class="nav-link">
        <i data-feather="check-square"></i> <span>Assessment Verify</span>
    </a>
</li>

<li class="nav-item mg-t-25 {{ request()->is('departSubordinate*') ? 'active' : '' }}">
    <a href="/departSubordinate" class="nav-link">
        <i data-feather="users"></i> <span>Subordinate</span>
    </a>
</li>
