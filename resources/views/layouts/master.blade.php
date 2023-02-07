<!DOCTYPE html>
<html lang="zxx" class="js">
    
<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>California Garden Square</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.0') }}">
    @stack("styles")
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="./images/logo-small.png" srcset="./images/logo-small2x.png 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            @if(!auth()->user()->is_portal_user)
                            @include("layouts.menu")
                            @else
                            @include("layouts.menu-portal")
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    {{-- @include("layouts.notification") --}}
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    @if (auth()->user()->role == "employee")
                                                    <span>{{auth()->user()->employee->first_name[0] . auth()->user()->employee->first_name[1]}}</span>
                                                    @elseif (auth()->user()->role == "tenant")
                                                    <img src="{{ auth()->user()->tenant->image_src }}" alt="">
                                                    @else
                                                    <img src="{{ auth()->user()->owner->image_src }}" alt="">
                                                    @endif
                                                    
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-verified">
                                                        @if (auth()->user()->role == "employee")
                                                        Employee
                                                        @elseif (auth()->user()->role == "tenant")
                                                        Tenant
                                                        @else
                                                        Unit Owner
                                                        @endif
                                                    </div>
                                                    <div class="user-name dropdown-indicator">
                                                        @if (auth()->user()->role == "employee")
                                                        {{ auth()->user()->employee->full_name }}
                                                        @elseif (auth()->user()->role == "tenant")
                                                        {{ auth()->user()->tenant->full_name }}
                                                        @else
                                                        {{ auth()->user()->owner->full_name }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        @if (auth()->user()->role == "employee")
                                                        <span>{{auth()->user()->employee->first_name[0] . auth()->user()->employee->first_name[1]}}</span>
                                                        @elseif (auth()->user()->role == "tenant")
                                                        <img src="{{ auth()->user()->tenant->image_src }}" alt="">
                                                        @else
                                                        <img src="{{ auth()->user()->owner->image_src }}" alt="">
                                                        @endif
                                                        
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">
                                                        @if (auth()->user()->role == "employee")
                                                        {{ auth()->user()->employee->full_name }}
                                                        @elseif (auth()->user()->role == "tenant")
                                                        {{ auth()->user()->tenant->full_name }}
                                                        @else
                                                        {{ auth()->user()->owner->full_name }}
                                                        @endif
                                                        </span>
                                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield("content")
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2023 California Garden Square.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bundle.js?ver=3.0.0') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.0.0') }}"></script>
    @stack('scripts')
</body>

</html>