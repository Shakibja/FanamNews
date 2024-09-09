<?php 

  use Carbon\Carbon;
  use App\Models\Backend\Category;
  use App\Models\Backend\PostNews;

  $now = Carbon::now()->locale('bn');


  $dayInBangla = $now->isoFormat('dddd');
  $date = $now->isoFormat('D MMMM YYYY');
  $time = $now->isoFormat('A h:mm');


  $eng = array('1','2','3','4','5','6','7','8','9','0');
  $bng = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');

    // $categories_1 = Category::where('category_status', 1)->orderBy('priority','asc')->take(10)->get();
	// $categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(13)->take(13)->get();

?>
<header>
        <div>
            <div class="d-md-flex d-none my-3 col-12 justify-content-between align-items-end container">
                <div class="d-flex gap-2 date-container">
                    <span><i class="fa-regular fa-calendar-days"></i></span>
                    <span class="">{{$dayInBangla}}, {{str_ireplace($eng, $bng, $date)}}</span>
                </div>
                <div class="flex-grow-1 d-flex justify-content-center py-3">
                    <a href="{{route('home')}}">
                    <img height="50" src="{{asset('backend')}}/assets/images/main_logo.png" alt="logo">
                    </a>
                </div>
                <div class="d-flex align-items-baseline justify-content-end gap-2 social-container ">
                    <div class="FSocialShare">
                        <ul>
                            <li><a href="https://www.facebook.com/fanamnews" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/" target="_blank"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                            <li><a href="https://www.youtube.com/" target="_blank"><i
                                        class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-md-none my-3 col-12 justify-content-between align-items-end container">

                <div class="flex-grow-1 d-flex justify-content-center ">
                    <img src="{{asset('backend')}}/assets/images/main_logo.png" alt="logo" style="width: 250px;">
                </div>
                <div class="d-flex gap-2 date-container">
                    <span><i class="fa-regular fa-calendar-days"></i></span>
                    <span class="">{{$dayInBangla}}, {{str_ireplace($eng, $bng, $date)}}</span>
                </div>
                <div class="d-flex align-items-baseline  gap-2 social-container FSocialShare ">

                    <ul class="">
                        <li><a href="https://www.facebook.com/" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/" target="_blank"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                        <li><a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <nav class="navbar navbar-expand-md notun-asha-nav" aria-label="Second navbar example">
                <div class="container">
                    <a class="navbar-brand" href="{{route('home')}}"><i class="fa-solid fa-house-chimney"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav me-auto ">
                            <li class="nav-item HomeBtn"><a class="nav-link"
                                    href="{{route('latestNews')}}">সর্বশেষ</a>
                            </li>
                            @foreach($categories_1 as $category)
                            <li class="nav-item HomeBtn"><a class="nav-link"
                                    href="{{ route('news_by_category', $category->category_slug)}}">{{$category->category_name}}</a>
                            </li>
                            @endforeach
                         
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    অন্যান্য
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($categories_2 as $category)
                                        <a class="dropdown-item" href="{{ route('news_by_category', $category->category_slug)}}">{{$category->category_name}}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/binodon"></a></li>


                        </ul>
                    </div>
                </div>


            </nav>
        </div>
    </header>