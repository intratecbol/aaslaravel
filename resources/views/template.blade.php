
<!DOCTYPE html>
<html>
<head>
    @yield('cabeceras')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @yield('menutop')
    @yield('menu')
    @yield('central')
    @yield('pie')
</div>
<!-- ./wrapper -->
    @yield('scripts')
</body>
</html>
