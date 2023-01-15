
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="base-url" property="base-url" content="{!! url(" /") !!}" />
    @yield('title')
    @include('admin.layout.link_css')

</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('user.layout.header')
    @include('user.layout.side-bar')
    <div class="page-wrapper">
    <div class="content container-fluid" style="padding-left: 0px; padding-right: 0px">
            @yield('content')
        </div>
    </div>
</div>
@include('admin.layout.link_js')
@yield('js_location')
</body>
</html>
