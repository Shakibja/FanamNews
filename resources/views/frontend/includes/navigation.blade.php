<?php

use Carbon\Carbon;
use App\Models\Backend\Category;
use App\Models\Backend\PostNews;

$now = Carbon::now()->locale('bn');

$dayInBangla = $now->isoFormat('dddd');
$date = $now->isoFormat('D MMMM YYYY');
$time = $now->isoFormat('A h:mm');

$eng = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
$bng = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'];

?>
<header>
    <!-- header  start-->
    <!-- main logo  -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center pt-3">
                <a href="{{ route('home') }}">
                    <img src="{{asset('backend/images/site_settings/'.$SiteSetting->header_logo)}}" alt="logo" style="width: 250px; height: 55px;">
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- calender with date -->
            <div class="col-md-12 d-flex flex-wrap justify-content-between align-items-end mb-2">
                <div class="d-flex gap-2 date-container">
                    <span><i class="fa-regular fa-calendar-days"></i></span>
                    <span class="">{{ $dayInBangla }}, {{ str_ireplace($eng, $bng, $date) }}</span>
                </div>
                <!-- social media -->
                <div class="d-flex align-items-baseline justify-content-end gap-2 social-container ">
                    <div class="FSocialShare">
                        <ul>
                            @foreach($footer_icon as $footer)
                            <li><a href="{{$footer->social_url}}" target="_blank" aria-label="Visit our {{$footer->social_name}} page"><i class="{{$footer->social_link}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header  end-->

    <div>


        <!-- Breaking News Starts  -->
        <div class="container">
            <section id="headline">
                <div class="headlines">
                    <div class="headline_left">
                        <p>শিরোনাম</p>
                    </div>
                    <ul>
                        <li>
                            <marquee direction="left" speed="normal" scrollamount="7" behavior="scroll"
                                onmouseover="this.stop();" onmouseout="this.start();">
                                @foreach ($breaking_news as $br_news)
                                <i class="fa fa-square text-brand ml-2 mr-1 font-10" aria-hidden="true"
                                    style="margin-right: 5px;color: #205797;"></i>

                                <a href="{{ route('news_details', $br_news->slug) }}" style="margin-right: 5px;">
                                    {{ $br_news->news_headline }}</a>
                                @endforeach

                            </marquee>
                        </li>
                    </ul>
                </div>
            </section>
        </div>


        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary notun-asha-nav">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('home') }}" aria-label="Visit our Home page">
                        <i class="fa-solid fa-house-chimney"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link fw-bold fs-6 text-dark" aria-label="Visit our Latest News page" href="{{ route('latestNews') }}">শীর্ষখবর</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold fs-6 text-dark" aria-label="Visit our Latest News page" href="{{ route('todayNews') }}">	আজকের খবর</a>
                            </li>
                            @foreach ($categories_1 as $category)
                            <li class="nav-item">
                                <a class="nav-link fw-bold fs-6 text-dark" aria-label="Visit our {{ $category->category_slug }} page" href="{{ route('news_details', $category->category_slug) }}">{{ $category->category_name }}</a>
                            </li>
                            @endforeach
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-bold fs-6 text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    অন্যান্য
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($categories_2 as $category)
                                    <li><a class="dropdown-item fw-bold fs-6 text-dark" aria-label="Visit our {{ $category->category_slug }} page" href="{{ route('news_details', $category->category_slug) }}">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>



    </div>
</header>