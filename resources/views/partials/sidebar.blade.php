@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             <!-- ADMIN -->
            @if(Auth::user()->role_id == 1)
            {{-- DASHBOARD --}}
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            {{-- USER MANAGEMENT --}}
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-male"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan

            {{-- ROOM MANAGEMENT --}}
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span class="title">@lang('quickadmin.room-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                @can('room_access')
                <li class="{{ $request->segment(2) == 'rooms' ? 'active' : '' }}">
                    <a href="{{ route('admin.rooms.index') }}">
                        <i class="fa fa-gears"></i>
                        <span class="title">@lang('quickadmin.rooms.title')</span>
                    </a>
                </li>
                @endcan

                @can('country_access')
                <li class="{{ $request->segment(2) == 'room_types' ? 'active' : '' }}">
                    <a href="{{ route('admin.room_types.index') }}">
                        <i class="fa fa-gears"></i>
                        <span class="title">@lang('quickadmin.room_types.title')</span>
                    </a>
                </li>
                @endcan
                </ul>
            </li>
            @endcan

            {{-- COUNTRY --}}
            <!-- @can('country_access')
            <li class="{{ $request->segment(2) == 'countries' ? 'active' : '' }}">
                <a href="{{ route('admin.countries.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.countries.title')</span>
                </a>
            </li>
            @endcan -->
            
           
            {{-- CUSTOMERS --}}
            @can('customer_access')
            <li class="{{ $request->segment(2) == 'customers' ? 'active' : '' }}">
                <a href="{{ route('admin.customers.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.customers.title')</span>
                </a>
            </li>
            @endcan
            
            {{-- FEES --}}
            @can('fee_access')
            <li class="{{ $request->segment(2) == 'fees' ? 'active' : '' }}">
                <a href="{{ route('admin.fees.index') }}">
                    <i class="fa fa-plus-circle"></i>
                    <span class="title">@lang('quickadmin.fees.title')</span>
                </a>
            </li>
            @endcan
            
            {{-- FIND ROOM --}}
            @can('find_room_access')
            <li class="{{ $request->segment(2) == 'find_rooms' ? 'active' : '' }}">
                <a href="{{ route('admin.find_rooms.index') }}">
                    <i class="fa fa-arrows"></i>
                    <span class="title">@lang('quickadmin.find-room.title')</span>
                </a>
            </li>
            @endcan







            <!-- MARKETING -->
            @elseif(Auth::user()->role_id == 2)
            {{-- DASHBOARD --}}
            <li class="{{ $request->segment(2) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            {{-- CUSTOMERS --}}
            @can('customer_access')
            <li class="{{ $request->segment(2) == 'customers' ? 'active' : '' }}">
                <a href="{{ route('admin.customers.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.customers.title')</span>
                </a>
            </li>
            @endcan

            {{-- INQUIRIES --}}
            @can('inquiry_access')
            <li class="{{ $request->segment(2) == 'inquiries' ? 'active' : '' }}">
                <a href="{{ route('admin.inquiries.index') }}">
                    <i class="fa fa-folder-open"></i>
                    <span class="title">@lang('quickadmin.inquiries.title')</span>
                </a>
            </li>
            @endcan

            {{-- QUOTATIONS --}}
            @can('quotation_access')
            <li class="{{ $request->segment(2) == 'quotations' ? 'active' : '' }}">
                <a href="{{ route('admin.quotations.index') }}">
                    <i class="fa fa-barcode"></i>
                    <span class="title">@lang('quickadmin.quotations.title')</span>
                </a>
            </li>
            @endcan

            {{-- BOOKINGS --}}
            @can('booking_access')
            <li class="{{ $request->segment(2) == 'bookings' ? 'active' : '' }}">
                <a href="{{ route('admin.bookings.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">@lang('quickadmin.bookings.title')</span>
                </a>
            </li>
            @endcan

            {{-- FIND ROOM --}}
            @can('find_room_access')
            <li class="{{ $request->segment(2) == 'find_rooms' ? 'active' : '' }}">
                <a href="{{ route('admin.find_rooms.index') }}">
                    <i class="fa fa-arrows"></i>
                    <span class="title">@lang('quickadmin.find-room.title')</span>
                </a>
            </li>
            @endcan





            @endif

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

