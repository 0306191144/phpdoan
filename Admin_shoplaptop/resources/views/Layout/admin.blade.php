
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
{{-- @if (!Cookie::get('user')) <script type="text/javascript">
  window.location = "{{url('/Admin/')}}";//here double curly bracket
</script>@endif --}}

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 @yield('title')
    @include("Layout.header")
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include("partals.header")
@include('partals.sidebar')



  @yield('content')
 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include("Layout.footer")
</body>
</html>



