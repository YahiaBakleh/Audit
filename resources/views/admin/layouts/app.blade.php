<!doctype html>
<html class="fixed">
<head>
    <title>Admin - @yield('title')</title>
    @include('admin.layouts.meta')
    @yield('style')
</head>
<body >
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="../" class="logo">

            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                 data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">




            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="/assets/images/basel.jpg" alt="Joseph Doe" class="img-circle"
                             data-lock-picture="assets/images/!logged-user.jpg"/>
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">BASSEL SALEH</span>
                        <span class="role">Administrator</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        {{--<li>--}}
                        {{--<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>--}}
                        {{--</li>--}}
                        <li>
                            <a id="logout" role="menuitem" tabindex="-1" href="{{route('adminLogout')}}"><i class="fa fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
    @include('admin.layouts.sidebar')

    <!-- end: sidebar -->

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Admin Panel</h2>
            </header>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @include('admin.layouts.alerts')
                </div>
            </div>

            <!-- start: page -->
        @yield('content')
        <!-- end: page -->
        </section>
    </div>
</section>

@include('admin.layouts.scripts')
@yield('script')
<script>
    $('#logout').click(function () {
        axios.post('{{ action('AuthAdmin\LoginController@logout') }}')
        location.reload();
    })
</script>

</body>
</html>