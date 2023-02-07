<ul class="nk-menu">
    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Main</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('dashboard') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
            <span class="nk-menu-text">Dashboard</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('settings.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
            <span class="nk-menu-text">Settings</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('departments.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-building-fill"></em></span>
            <span class="nk-menu-text">Departments</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('positions.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
            <span class="nk-menu-text">Positions</span>
        </a>
    </li>
    
    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
            <span class="nk-menu-text">Units</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item">
                <a href="{{ route("clusters.index") }}" class="nk-menu-link"><span class="nk-menu-text">Clusters</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route("units.index") }}" class="nk-menu-link"><span class="nk-menu-text">Units</span></a>
            </li>
        </ul>
    </li>

    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-clock-fill"></em></span>
            <span class="nk-menu-text">Time off</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item">
                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Attendance</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('leaves.index') }}" class="nk-menu-link"><span class="nk-menu-text">Leaves</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('leave-types.index') }}" class="nk-menu-link"><span class="nk-menu-text">Leave types</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('leave-approvers.index') }}" class="nk-menu-link"><span class="nk-menu-text">Leave Approvers</span></a>
            </li>
        </ul>
    </li>
    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
            <span class="nk-menu-text">Users</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item">
                <a href="{{ route("employees.index") }}" class="nk-menu-link"><span class="nk-menu-text">Employees</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route("owners.index") }}" class="nk-menu-link"><span class="nk-menu-text">Unit Owners</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route("tenants.index") }}" class="nk-menu-link"><span class="nk-menu-text">Tenants</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">Visitors</span></a>
            </li>
        </ul>
    </li>

    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Helpdesk</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{route('tickets.index')}}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-ticket-fill"></em></span>
            <span class="nk-menu-text">Tickets</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="#" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-task"></em></span>
            <span class="nk-menu-text">Projects</span>
        </a>
    </li>

    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Inventory</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('stocks.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-box"></em></span>
            <span class="nk-menu-text">Stocks</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('vendors.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
            <span class="nk-menu-text">Vendors</span>
        </a>
    </li>
    

    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Finance</h6>
    </li>
    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
            <span class="nk-menu-text">Accounting</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item">
                <a href="{{ route('accounts.index') }}" class="nk-menu-link"><span class="nk-menu-text">Accounts</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('banks.index') }}" class="nk-menu-link"><span class="nk-menu-text">Banks</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('entries.index') }}" class="nk-menu-link"><span class="nk-menu-text">Cash Flow</span></a>
            </li>
        </ul>
    </li>
    <li class="nk-menu-item has-sub">
        <a href="#" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-meter"></em></span>
            <span class="nk-menu-text">Readings</span>
        </a>
        <ul class="nk-menu-sub">
            <li class="nk-menu-item">
                <a href="{{ route('waters.index') }}" class="nk-menu-link"><span class="nk-menu-text">Water Readings</span></a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('electrics.index') }}" class="nk-menu-link"><span class="nk-menu-text">Electric Readings</span></a>
            </li>
        </ul>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('invoices.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
            <span class="nk-menu-text">Invoices</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('payments.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-wallet-fill"></em></span>
            <span class="nk-menu-text">Payments</span>
        </a>
    </li>
</ul>