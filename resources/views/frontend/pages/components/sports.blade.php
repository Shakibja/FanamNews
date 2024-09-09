@if(!empty($sports_1))
<section class="sports-n-game py-1 my-1 container border-1 border-top">
    <div class="col-12 border-5 border-start  border-primary ">
        <div class="py-2 ps-3 fw-semibold fw-semibold ">খেলাধুলা</div>
    </div>
    <div class="d-md-flex">
        <div class="col-md-5">
            <div class="d-flex flex-wrap mt-1  ">
                <a aria-label="{{$sports_1->news_headline}}" href="{{ route('news_details', $sports_1->slug)}}">
                    <div class="d-flex col-12 my-2">
                    <img class="col-12" src="{{asset('backend/images/news-himages/'.$sports_1->news_title_image)}}" alt="Sports" style="image-size: cover; image-repeat: no-repeat; background-position: cover;height: 312px; min-width: 100%">
                    </div>
                    <div>
                    <span class="title" style="font-weight: bold;font-size: 16px;">
                        {{$sports_1->news_headline}}
                    </span>
                    <br>
                    <span class="seb-slug ">
                            {{ limitText($sports_1->news_body, 600) }}
                    </span>
                    <p class="text-danger">বিস্তারত...</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-7">
            <div class="d-flex flex-wrap mt-1  ">
            @foreach($sports_2 as $news)
                <div class="col-md-4">
                    <a aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                        <div class="mx-2 col-12 col-md-12 d-flex flex-md-column ">
                            <div class="col-6 col-md-12 d-flex p-2">
                            <img class="img-fluid" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="Sports" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                            </div>
                            <div class="col-6 col-md-12 mx-md-2 px-2 bg">
                                <div class="col-md-12 title my-2 ">
                                <span class="title" style="font-weight: bold;font-size: 16px;">
                                {{$news->news_headline}}
                                </span>
                                </div>

                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endif