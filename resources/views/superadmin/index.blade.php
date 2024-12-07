<!DOCTYPE html>
<html lang="en">
  <head>
    @include('superadmin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner"></div>
      @include('superadmin.sidebar')
      @include('superadmin.header')
      @include('superadmin.navbar')
      @include('superadmin.footer')
    @include('superadmin.js')
  </body>
</html>