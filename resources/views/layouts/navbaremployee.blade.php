<li class="nav-label">
    Main Menu</li>

<li class="nav-item {{ request()->is('profileEmploy*') ? 'active' : '' }}">
    <a href="/profileEmploy" class="nav-link">
        <i data-feather="monitor"></i> <span>Dashboard</span>
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
        <i data-feather="book-open"></i> <span>Learning Journey</span>
    </a>
</li>
