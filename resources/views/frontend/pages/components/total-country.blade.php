@if(!empty($total_country))
<div class="col-md-9">
    <!-- section header -->
    
    <div class="col-12 d-flex ps-2">
        <div class="pt-1 pe-5  fw-semibold border-2 border-bottom  border-primary  ">দেশ</div>
    </div>
    
    <div class="d-flex flex-wrap   ">
    @foreach($total_country as $news)
        <div class="col-md-4">
            <a aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                <div class="me-2 my-2  col-12 col-md-12 d-flex flex-md-column ">
                    <div class="col-6 col-md-12 d-flex p-2">
                    <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="Total_Country" style="image-size: cover; image-repeat: no-repeat; background-position: cover;height: 170px; ; min-width: 100%">
                    </div>
                    <div class="col-6 col-md-12 mx-md-2 px-2 bg">
                        <div class=" col-md-12 title my-2">
                        <span class="title" style="font-weight: bold;font-size: 16px;">
                        {{$news->news_headline}}
                        </span>
                        </div>
                        <div class="col-md-12">
                        <span class="seb-slug ">
                            {{ limitText($law_1->news_body, 300) }}
                        </span>
                        <p class="text-danger">বিস্তারত...</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif