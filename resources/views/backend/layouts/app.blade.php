
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
   @include('backend.includes.header')
   <body>
      <!-- Begin page -->
      <div id="layout-wrapper">
        @include('backend.includes.body_header')

        @include('backend.includes.menubar')
         <!-- Vertical Overlay-->
         <div class="vertical-overlay"></div>
         <!-- ============================================================== -->

         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                @php
                    $currentRoute = Route::current()->getName();
                @endphp
                @if ($currentRoute != 'dashboard')
                    @include('backend.includes.breadcrumb')
                @endif


                @yield('page-content')
               </div>
               <!-- container-fluid -->
            </div>
            @include('backend.includes.body_footer')
         </div>
         <!-- end main content-->

      </div>
      <!-- END layout-wrapper -->
      <!--start back-to-top-->
      <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
      <i class="ri-arrow-up-line"></i>
      </button>
      <!--end back-to-top-->
      <!--preloader-->
      <div id="preloader">
         <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
         </div>
      </div>


      @include('backend.includes.footer')
   </body>
</html>
