<!doctype html>
<html lang="en">

<head>
    <title>BASSEL SALEH & CO - @yield('title')</title>
    @include('main.layouts.meta')
    @yield('style')
</head>
@if(app()->getLocale() =='ar')
    <body class="gradient--active" style="direction: rtl">
    @else
        <body class="gradient--active">
        @endif


@include('main.layouts.nav')
<div class="main-container">

<div >
    @include('main.layouts.alerts')
</div>

     @yield('content')

    @include('main.layouts.footer')
</div>
@include('main.layouts.scripts')
@yield('script')
</body>

</html>