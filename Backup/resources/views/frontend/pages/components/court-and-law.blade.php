<div class="col-md-6">
    <!-- section header -->
     @if(!empty($law_1))
    <div class="col-12 border-5 border-start  border-primary ">
        <div class="py-2 ps-3 fw-semibold ">আইন-আদালত</div>
        rakib
    </div>
    @endif
    <div class="d-flex border-md-start  border-primary  flex-wrap">
    @isset($law_1)
        <div class="col-md-6">
        @foreach($law_2 as $news)
            <div class="px-2 col-12 ">
                <a class="row py-2" href="{{ route('news_details', $news->slug)}}">
                    <div class="col-6">
                        <h6 class="title title-13">
                        {{ limitText($news->news_headline, 150) }}...
                        </h6>
                        <p class="text-danger">বিস্তারিত...</p>
                    </div>

                    <div class="col-6 d-flex">
                            <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="{{$news->news_headline}}">
                    </div>
                </a>
            </div>
        @endforeach

        </div>
    @endisset 

    @isset($law_1)
        <div class="col-md-6">
            <a href="{{ route('news_details', $law_1->slug)}}">
                <div class="d-flex col-12 my-2">
                <img class="col-12" src="{{ asset('backend/images/news-himages/'.$law_1->news_title_image) }}" alt="{{$law_1->news_headline}}">
                </div>
                <div>
                    <p class="title h4">{{$law_1->news_headline}}</p>
                    <p class="seb-slug ">{{ limitText($law_1->news_body, 200) }}...</p>
                </div>

            </a>


        </div>
    @endisset     
    </div>
</div>