<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('quickadmin.quickadmin_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('quickadmin.quickadmin_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

       


        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }}<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#logout" onclick="$('#logout').submit();">
                            <i class="fa fa-arrow-left"></i>
                            <span class="title">@lang('quickadmin.qa_logout')</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        

    </nav>
</header>



