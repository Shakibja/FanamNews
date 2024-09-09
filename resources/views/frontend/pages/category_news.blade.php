@extends('frontend.mastering.master')
@section('page-content')
<?php
function limitText($text, $limit) {
    // Remove any HTML tags from the text
    $text = strip_tags($text);
    // Check if the length of the text is already within the limit
    if (strlen($text) <= $limit) {
        return $text; // No need to truncate
    }
    // Find the last space within the limit
    $lastSpace = strrpos(substr($text, 0, $limit), ' ');
    // Truncate the text to the last space within the limit
    $truncatedText1 = substr($text, 0, $lastSpace);

    return $truncatedText1;
}
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    <!-- TODO adv content to remove -->
                    @if(!empty($category_banner1))
                    <div class=" container">
                        <div class="adv-row"> 
                        <img src="{{ asset('backend/images/advertise/' . $category_banner1->adimage) }}" style="width: 100%;height: 150px; image-size: cover; image-repeat: no-repeat; background-position: cover;" alt="Advertise" loading="lazy"/>

                        </div>
                    </div>
                    @endif
                    <!-- TODO adv content to remove -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="category-area mt-3">
            <div class="heading-title d-flex align-items-center fs-4">

                <a href="#">
                    <h1>{{$category_name->category_name}} </h1>
                </a>
                <p><i class="fa-solid fa-angles-right fs-4 px-2"></i></p>

                {{-- <p ><i class="fa-solid fa-angles-right fs-4 px-2"></i></p>
                    <p class="d-inline-block " >ফুটবল</p> --}}
            </div>


            <div class="category-lead mt-2">
                <div class="row my-4">
                    <div class="col-md-9">
                        <div class="DCatLead ">
                            <!-- TODO dynamic -->
                            <a href="{{ route('news_details', $relatedNews->slug)}}">
                                <div class="row">
                                    <div class="col-md-7 ">
                                        <div class="img-box overflow-hidden">
                                            <picture>
                                                <img data-src="{{ asset('backend/images/news-himages/'.$relatedNews->news_title_image)}}" src="{{ asset('backend/images/news-himages/'.$relatedNews->news_title_image)}}" alt="{{$relatedNews->news_headline}}" title="{{$relatedNews->news_headline}}" class="img-fluid w-100 img100 rounded"  loading="lazy" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                                            </picture>
                                        </div>
                                    </div>
                                    <div class="col-md-5 position-relative">
                                        <div class="DCatLeadTitle ">
                                            <h1 class="title fs-3"> {{$relatedNews->news_headline}}</h1>
                                            <p class="CatDesc fs-6">{{ limitText($relatedNews->news_body, 700) }}...</p>
                                            <p class="text-danger">বিস্তারিত...</p>
                                        </div>
                                        {{-- <span class="publishTime fs-8 position-absolute bottom-0">আপডেটঃ ১১ জানুয়ারি ২০২৪ | ১১:৪৩</span> --}}                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="DRightSideAdd mt-3 mb-4 col-12">
                            <!-- TODO remove line -->

                            <!-- <div class="adv-col flex-grow-1 ">

                            </div> -->

                            @if(!empty($category_banner2))
                                <div class="adv-col" >
                                <img src="{{ asset('backend/images/advertise/' . $category_banner2->adimage) }}" style="height: 300px;width: 100%; image-size: cover; image-repeat: no-repeat; background-position: cover;" alt="Advertise" loading="lazy" />
                                </div>
                            @endif


                            <!-- TODO remove line -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="category-card-area my-2">
                <div class="row">
                 @foreach($categories2 as $news)
                 <div class="col-md-3 d-flex">
                        <div class="Catcards align-items-stretch px-2  pt-2 pb-3 position-relative">
                            <a href="{{ route('news_details', $news->slug)}}">
                                <div class="img-box overflow-hidden">
                                    <picture>
                                        <img data-src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                            src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                            alt="{{$news->news_headline}}"
                                            title="{{$news->news_headline}}"
                                            class="img-fluid img100 w-100" loading="lazy" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                                    </picture>
                                </div>
                                <div class="CatCardTitle my-3">
                                    <h3 class="fs-5 title">{{ limitText($news->news_headline, 150) }}</h3>
                                    <p class="text-danger">বিস্তারিত...</p>
                                </div>
                                {{-- <span class="publishTime fs-8 position-absolute bottom-0">আপডেটঃ ১১ জানুয়ারি ২০২৪ | ১১:৪৩</span> --}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="ad-area d-flex justify-content-center">

                <div class="col-12">
                    <div class="d-flex justify-content-center mt-4">
                        <!-- TODO adv content to remove -->
                        @if(!empty($category_banner3))
                        <div class=" container">
                            <div class="adv-row"> 
                            <img src="{{ asset('backend/images/advertise/' . $category_banner3->adimage) }}" style="width: 100%;height: 150px; image-size: cover; image-repeat: no-repeat; background-position: cover;" alt="Advertise" loading="lazy" />

                            </div>
                        </div>
                        @endif
                        <!-- TODO adv content to remove -->
                    </div>
                </div>

            </div>

            <div class="category-card-area my-2 ">
                <div class="row">
                    @foreach($categories_3 as $news)
                    <div class="col-md-3 mt-3">
                        <div class="card shadow border-0 rounded-4">
                            <a href="{{ route('news_details', $news->slug)}}" class="text-decoration-none text-dark">
                                <div class="card-img-top">
                                    <img data-src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                        src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                        alt="{{$news->news_headline}}"
                                        title="{{$news->news_headline}}"
                                        class="img-fluid img100 w-100" loading="lazy" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title fs-5 mb-3">{{ limitText($news->news_headline, 82) }}</h3>
                                    <!-- <p class="text-danger mb-0">বিস্তারিত...</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div  class="my-2 mt-2 d-flex justify-content-center ">
                {{$categories_3->links()}}
            </div>

        </div>
    </div>
</main>
@endsection