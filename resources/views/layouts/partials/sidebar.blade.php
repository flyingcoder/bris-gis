<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" id="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <li class="{!! Request::is('homeUI') ? 'active' : '' !!}" ><a href="{{ route('home.indexUI') }}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            <li class="{!! Request::is('usersUI') ? 'active' : '' !!}" ><a href="{{ route('users.indexUI') }}"><i class='fa fa-users'></i> <span>Users</span></a></li>
            <li class="{!! Request::is('provinces') ? 'active' : '' !!}"><a href="{{ route('provinces.index') }}"><i class='fa fa-university'></i> <span>Pronvinces</span></a></li>
            <li class="{!! Request::is('barangaysOption') ? 'active' : '' !!}"><a href="{{ route('barangays.option') }}"><i class='fa fa-legal'></i> <span>Barangays</span></a></li>
            <li class="{!! Request::is('householdsOption') ? 'active' : '' !!}"><a href="{{ route('buildings.option') }}"><i class='fa fa-home '></i> <span>Households</span></a></li>
            <li class="{!! Request::is('disastersOption') ? 'active' : '' !!}"><a href="{{route('disasters.option')}}"><i class='fa fa-bolt'></i> <span>Disasters</span></a></li>
            <li class="{!! Request::is('healthOption') ? 'active' : '' !!}"><a href="{{route('health.option')}}"><i class='fa fa-medkit'></i> <span>Health</span></a></li>
            <li class="{!! Request::is('reportsOption') ? 'active' : '' !!}"><a href="{{ route('reports.option') }}"><i class='fa fa-bar-chart'></i> <span>Reports</span></a></li>
            <li class="{!! Request::is('mapsOption') ? 'active' : '' !!}"><a href="{{ route('maps.option') }}"><i class='fa fa-map-marker'></i> <span>Maps</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
