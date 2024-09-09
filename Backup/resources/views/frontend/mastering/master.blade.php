<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.includes.head')
</head>
<body>
    <!-- header starts  -->
    @include('frontend.includes.navigation')
    <!-- header ends  -->

    <!-- content starts  -->
    @yield('page-content')
    <!-- content ends  -->
    
    <!-- footer starts  -->
    @include('frontend.includes.footer')
    <!-- footer ends  -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

   <!-- script starts  -->
   @include('frontend.includes.script')
   <!-- script ends  -->

</body>

</html>