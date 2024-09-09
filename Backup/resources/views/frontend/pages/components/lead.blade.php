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
                <a href="{{ route('news_details', $lead_news->slug)}}">
                    <div class="row">
                        <div class="col-lg-7 "  style="border:5px solid green;">
                            <div class="d-flex py-2">
                                <picture >
                                    @if($lead_news->news_title_image)
                                        <img data-src="{{ asset('backend/images/news-himages/'.$lead_news->news_title_image)}}"
                                        src="{{ asset('backend/images/news-himages/'.$lead_news->news_title_image)}}"
                                        alt="{{ $lead_news->news_headline }}"
                                        title="{{ $lead_news->news_headline }}"
                                        class="img-fluid img100 border-5">
                                    @endif
                                </picture>
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-first">
                            <div class="desc h-100">
                                <h1 class="title h4">{{ $lead_news->news_headline }}
                                </h1>
                                <div class="Brief " style="font-size: 12px;">
                                    <p>{{ limitText($lead_news->news_body, 1500) }}...</p>
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
                <div class="d-flex flex-wrap">
                @isset($second_lead)
                 @foreach($second_lead as $news)
                    <div class="col-md-6 p-1 ">
                                    <a class="row " href="{{ route('news_details', $news->slug)}}">
                                        <div class="col-6 d-flex  ">
                                            <img class="w-100 " src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}"
                                            alt="{{$news->news_headline}}">
                                        </div>
                                        <div class="col-6">

                                            <h4 class=" title  fs-5">
                                            {{$news->news_headline}}
                                            </h4>
                                            <p class="  fs-7">
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
    <h3 class=" my-0 pb-0 fw-semibold">জাতীয়</h3>
    <div class="d-flex flex-wrap mt-3  border-top  border-primary border-2">
    @foreach($national as $news)
        <div class="col-md-4 col-12">
            <a href="{{ route('news_details', $news->slug)}}">
                <div class="me-2 my-2 ">
                    <div class="col-md-6 col-md-12 d-flex">
                    <img class="w-100" src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}" alt="{{ $news->news_headline }}">
                    </div>
                    <div class="col-md-6 col-md-12 py-2">
                        <h2 class="mt-2" style="font-size: 20px;">{{ limitText($news->news_body, 150) }}...</h2>
                        <a href="{{ route('news_details', $news->slug)}}" class="text-danger">বিস্তারিত...</a>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
       
    </div>

    @endisset
</div>