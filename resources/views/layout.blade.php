<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    @toastr_css
</head>

<body id="page-top">
    <div id="wrapper">
        @include('includes.menu')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('includes.header')
                @yield('content')
            </div>
            @include('includes.footer')
        </div>
    </div>
    @include('includes.foot')
</body>
    @jquery
    @toastr_js
    @toastr_render
</html>


