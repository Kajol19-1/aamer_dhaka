<!DOCTYPE html>
<html lang="en">
    <head>
    @include('residentDashboard.includes.head')
    </head>
    <body class="sb-nav-fixed">
       @include('residentDashboard.includes.nav')
        <div id="layoutSidenav">
          @include('residentDashboard.includes.sidebar')
            <div id="layoutSidenav_content">
                <main>
                   @yield('content')
                </main>
               @include('residentDashboard.includes.footer')
            </div>
        </div>
        @include('residentDashboard.includes.script')
    </body>
</html>
