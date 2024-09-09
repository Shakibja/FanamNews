@php
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
@endphp



<div class="col-lg-9">
    <div class="row ">
        <div class="col-md-12">
            <div class="top-news">
            @isset($lead_news)
                <a href="{{ route('news_details', $lead_news->slug)}}" aria-label="{{$lead_news->news_headline}}">
                    <div class="row">
                        <div class="col-lg-7 ">
                            <div class="d-flex py-2">
                                <picture>
                                    @if($lead_news->news_title_image)
                                        <img data-src="{{ asset('backend/images/news-himages/'.$lead_news->news_title_image)}}"
                                        src="{{ asset('backend/images/news-himages/'.$lead_news->news_title_image)}}"
                                        alt="Lead_News" style="image-size: cover; image-repeat: no-repeat; background-position: cover;"
                                        class="img-fluid img100 w-100" 
                                        >
                                    @endif
                                </picture>
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-first">
                            <div class="desc h-100">
                                
                                <span class="title" style="font-weight: bold;font-size:18px;">
                                            {{$lead_news->news_headline}}
                                </span>
                                <div class="Brief " style="font-size: 14px;text-align: justify;">
                                    <span>{!! limitText($lead_news->news_body, 1500) !!}...</span>
                                </div>
                                {{-- <span class="PublishTime mt-auto mb-2 "><i class="fa-regular fa-clock"></i> আপডেট ০৬
                                    জানুয়ারি ২০২৪ | ১৬:০৫</span> --}}
                            </div>
                        </div>
                    </div>
                </a>
            @endisset    
            </div>
            <div class="top-4-news mt-4">
                <div class="d-flex flex-wrap ">
                @isset($second_lead)
                 @foreach($second_lead as $news)
                    <div class="col-md-4  p-1" >
                                    <a class="row " aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                                        <div class="col-4 d-flex">
                                            <img class="img-fluid" src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}"
                                            alt="Lead_News" style="height: 80px; min-width: 100%;">
                                        </div>
                                        <div class="col-8 ">
                                            <span class="title" style="font-weight: bold;font-size:16px;">
                                            {{$news->news_headline}}
                                            </span>
                                            <p class="fs-7 text-danger">
                                            বিস্তারিত...
                                            </p>
                                        </div>
                                    </a>
                                </div>
                 @endforeach
                @endisset

                </div>
            </div>
        </div>
    </div>

    @isset($national)
    <div class="col-12 border-5 border-start border-primary mt-3">
        <h3 class="py-2 ps-3 fw-semibold ">আজকের খবর</h3>
    </div>
    <div class="d-flex flex-wrap mt-3  border-top  border-primary border-2">
    @foreach($national as $news)
        <div class="col-md-4 col-12">
            <a href="{{ route('news_details', $news->slug)}}">
                <div class="me-2 my-2 ">
                    <div class="col-md-6 col-md-12 d-flex">
                    <img class="w-100 img-fluid" style="image-size: cover; image-repeat: no-repeat; background-position: cover; " src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}" alt="Lead_News">
                    </div>
                    <div class="col-md-6 col-md-12 py-2">
                    <span class="title" style="font-weight: bold;font-size: 18px;">
                                            {{$news->news_headline}}
                    </span>

                        <p class="mt-1" style="font-size: 16px;">{!! limitText($news->news_body, 250) !!}</p>
                        <a href="{{ route('news_details', $news->slug)}}" class="text-danger">বিস্তারিত...</a>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
       
    </div>

    @endisset
</div>