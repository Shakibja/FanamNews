<!DOCTYPE html>
<html lang="en">
  <head>
  @include('backend.includes.head')
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- topbar starts  -->
      @if(!empty($admin))
          @include('backend.includes.topbar')
      @elseif(!empty($user))
          @include('backend.includes.staff.topbar')
      @endif
      <!-- topbar ends  -->


      
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- leftbar starts  -->
        
        <!-- leftbar ends  -->
        @if(!empty($admin))
          @include('backend.includes.leftbar')
        @elseif(!empty($user))
          @include('backend.includes.staff.leftbar')
        @endif


        @yield('shakib')


        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    
   <!-- script starts  -->
   @include('backend.includes.scripts')
  <!-- script ends  -->
  </body>
</html>