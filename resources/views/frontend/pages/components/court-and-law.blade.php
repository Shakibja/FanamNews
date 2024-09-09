<div class="col-md-6">
    <!-- section header -->
     @if(!empty($law_1))
    <div class="col-12 border-5 border-start  border-primary ">
        <div class="py-2 ps-3 fw-semibold ">আদালত</div>
    </div>
    @endif
    <div class="d-flex border-md-start  border-primary  flex-wrap">
    @isset($law_1)
        <div class="col-md-6">
        @foreach($law_2 as $news)
            <div class="px-2 col-12 ">
                <a class="row py-2" aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                    <div class="col-6 text-start text-md-end text-xl-end text-xxl-end" style="padding-left:10px;">
                        <span class="title" style="font-weight: bold;font-size: 14px;">
                        {{$news->news_headline}}
                        </span>
                    </div>

                    <div class="col-6 d-flex">
                            <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="Court_and_law" style="image-size: cover; image-repeat: no-repeat; background-position: cover; height: 90px; min-width: 100%">
                    </div>
                </a>
            </div>
        @endforeach

        </div>
    @endisset 

    @isset($law_1)
        <div class="col-md-6">
            <a aria-label="{{$law_1->news_headline}}" href="{{ route('news_details', $law_1->slug)}}">
                <div class="d-flex col-12 my-2">
                <img class="col-12" src="{{ asset('backend/images/news-himages/'.$law_1->news_title_image) }}" alt="Court_and_law" style="image-size: cover; image-repeat: no-repeat; background-position: cover;height: 150px; ; min-width: 100%">
                </div>
                <div>
                    <span class="title" style="font-weight: bold;font-size: 16px;">
                        {{$law_1->news_headline}}
                    </span>
                    <br>
                    <span class="seb-slug ">
                            {{ limitText($law_1->news_body, 300) }}
                    </span>
                    <p class="text-danger">বিস্তারত...</p>
                </div>

            </a>


        </div>
    @endisset     
    </div>
</div>