<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? 'V RAM TRANSPORT' }} | {{ config('app.name') }}</title>
    <meta content="{{ config('app.name') }}" name="description">
    <meta content="" name="keywords">

    @include('inc.headerLinks')

    @yield('head')
</head>

<body class="m-0   text-base antialiased font-normal leading-default bg-gray-50 text-slate-500" style="background: rgb(127 0 23 / 5%); font-family: 'Roboto', sans-serif;">

    @include('inc.header')

    @yield('content')

    @include('inc.footer')

    @include('inc.footerLinks')

    @yield('scripts')
</body>

</html>
