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
    $truncatedText = substr($text, 0, $lastSpace);

    return $truncatedText;
}
?>
<main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title mt-4 my-3">
                        <a href="/latest/news">
                            <h1>শীর্ষখবর</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="DArchivePageSec">
                <div class="row" id="data-wrapper">
                @foreach($latestNews as $news)
                    <div class="col-lg-6">
                        <div class="CatListNews  py-2">
                            <a href="{{ route('news_details', $news->slug)}}">
                                <div class="row d-flex justify-content-end ">
                                    <div class="col-md-6 col-6 position-relative ">
                                        <div class="CatNameSP">{{$news->category->category_name}}</div>
                                        <div class="CatListhead">
                                            <h3 class="title"> {{limitText($news->news_headline, 100)}}... &nbsp;&nbsp;</h3>
                                        </div>
                                        <div class="ListDesc fs-6 pb-2">
                                            <p>{!! limitText($news->news_body, 150) !!}...</p>
                                        </div>
                                        <?php
                                        $eng = [
                                            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',
                                            'AM', 'PM',
                                            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
                                        ];
                                        $bng = [
                                            'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
                                            'এএম', 'পিএম',
                                            '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'
                                        ];
                                        
                                        $dateString = $news->created_at->isoFormat('D MMMM YYYY');
                                        $timeString = $news->created_at->isoFormat('h:mm');
                                        
                                        $dateStringBangla = str_replace($eng, $bng, $dateString);
                                        $timeStringBangla = str_replace($eng, $bng, $timeString);
                                        
                                        ?>
                                        <span class="publishTime fs-8 mt-3 position-absolute bottom-0">আপডেটঃ {{$dateStringBangla }} | {{$timeStringBangla}}</span> 
                                    </div>
                                    <div class="col-md-6 col-6 ">
                                        <div class="img-box overflow-hidden">
                                            <picture>
                                                <img src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                                    alt="{{$news->news_headline}} &nbsp;&nbsp;"
                                                    title="{{$news->news_headline}} &nbsp;&nbsp;"
                                                    class="img-fluid w-100 img100 rounded" loading="lazy" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                                            </picture>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" id="load-more-sec">
                    <div class="auto-load text-center" style="display: none;">
                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                            enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000"
                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                    from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform>
                            </path>
                        </svg>
                    </div>
                    <div class="read-more-btn d-flex justify-content-center my-2 ">
                       {{-- <a type="button" class="load-more-data">আরও</a> --}} 
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection