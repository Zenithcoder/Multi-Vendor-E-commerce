<?php
function current_page($uri= "/admin")
{
    return request()->path() == $uri;
}
?>


@include('backend.includes.header')
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="/admin">Pako Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
@include('backend.includes.top-nav')
<!--close-top-serch-->

<!--sidebar-menu-->
@include('backend.includes.side-nav')
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
@yield('content')

</div>
<!--end-main-container-part-->

<!--Footer-part-->
@include('backend.includes.footer')