@if(!empty($economics_1))
<section class="economics py-1 my-1 container border-1 border-top">
    <div class="d-md-flex">
        <div class="col-md-9">
            <!-- section header -->
            <div class="col-12 d-flex ps-2">
                <div class="pt-1 pe-5  fw-semibold border-2 border-bottom  border-primary  ">অর্থনীতি</div>
            </div>
            <div class="d-flex flex-wrap mt-0  ">
            @foreach($economics_1 as $news)
                <div class="col-md-4">
                    <a aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                        <div class="me-2 my-2 col-12 col-md-12 d-flex flex-md-column ">
                            <div class="col-6 col-md-12 d-flex p-2">
                            <img class="w-100 img-fluid" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="Economy" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                            </div>
                            <div class="col-6 col-md-12 mx-md-2 px-2 bg">
                                <div class="col-md-12 my-2 ">
                                <span class="title" style="font-weight: bold;font-size: 16px;">
                                    {{$news->news_headline}}
                                </span>   
                                </div>
                                <div class="col-md-12">
                                <span class="seb-slug ">
                                        {{ limitText($news->news_body, 300) }}
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
        <div class="col-md-3">
            <!-- section header -->
            <div class="col-md-12 ">

                <div class="quickPostSectionItem ">
                        <ul class="list-group bg-transparent">
                            @foreach($economics_2 as $news)
                            <li class="list-group-item">
                                <a class="h7" aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                                <span class="title" style="font-weight: bold;font-size: 16px;">
                                    {{$news->news_headline}}
                                </span>  
                                </a>
                            </li>
                            @endforeach
                        </ul>
                </div>


            </div>

        </div>


    </div>

</section>
@endif