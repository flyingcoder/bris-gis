<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <li class="{!! Request::is('homeUI') ? 'active' : '' !!}" ><a href="{{ route('home.indexUI') }}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            <li class="{!! Request::is('usersUI') ? 'active' : '' !!}" ><a href="{{ route('users.indexUI') }}"><i class='fa fa-users'></i> <span>Users</span></a></li>
            <li class="{!! Request::is('provincesUI') ? 'active' : '' !!}"><a href="{{ route('provinces.indexUI') }}"><i class='fa fa-university'></i> <span>Pronvinces</span></a></li>
            <li class="{!! Request::is('barangaysUI') ? 'active' : '' !!}"><a href="{{ route('barangays.indexUI') }}"><i class='fa fa-legal'></i> <span>Barangays</span></a></li>
            <li class="{!! Request::is('householdsUI') ? 'active' : '' !!}"><a href="{{ route('households.indexUI') }}"><i class='fa fa-home '></i> <span>Households</span></a></li>
            <li class="{!! Request::is('reportsUI') ? 'active' : '' !!}"><a href="{{ route('reports.indexUI') }}"><i class='fa fa-bar-chart'></i> <span>Reports</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class='fa fa-map-marker'></i> <span>Maps</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="{!! Request::is('mapspopuUI') ? 'active' : '' !!}"><a href="{{ route('mapspopu.indexUI') }}"><i class="fa fa-circle-o"></i> Population</a></li>
                    <li class="{!! Request::is('mapsfloodUI') ? 'active' : '' !!}"><a href="{{ route('mapsflood.indexUI') }}"><i class="fa fa-circle-o"></i> Flood Maps</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
