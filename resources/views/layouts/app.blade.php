<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="skin-blue sidebar-mini wysihtml5-supported">
    <div class="wrapper">

        @include('layouts.partials.mainheader')

        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </div><!-- /.content-wrapper -->
    
        @include('layouts.partials.footer')
    </div><!-- ./wrapper -->
@section('scripts')
    @include('layouts.partials.scripts')
    @yield('page-script')
@show

</body>
</html>
