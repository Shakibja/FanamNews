@if(!empty($economics_1))
<section class="economics py-1 my-1 container border-1 border-top">
    <div class="d-md-flex">
        <div class="col-md-9">
            <!-- section header -->
            <div class="col-12 d-flex ps-2">
                <div class="pt-1 pe-5  fw-semibold border-2 border-bottom  border-primary  ">অর্থ ও বাণিজ্য</div>
            </div>
            <div class="d-flex flex-wrap mt-0  ">
            @foreach($economics_1 as $news)
                <div class="col-md-4">
                    <a href="{{ route('news_details', $news->slug)}}">
                        <div class="me-2 my-2 col-12 col-md-12 d-flex flex-md-column ">
                            <div class="col-6 col-md-12 d-flex p-2">
                            <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="{{$news->news_headline}}">
                            </div>
                            <div class="col-6 col-md-12 mx-md-2 px-2 bg">
                                <div class=" col-md-12 title my-2 ">
                                {{$news->news_headline}}     
                                </div>
                                <div class=" col-md-12 seb-slug">
                                {{ limitText($news->news_body, 300) }}...

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
                    <ul class="list-group">
                        <ul class="list-group bg-transparent">
                            @foreach($economics_2 as $news)
                            <li class="list-group-item">
                                <a class="title h7" href="{{ route('news_details', $news->slug)}}">{{$news->news_headline}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </ul>
                </div>


            </div>

        </div>


    </div>

</section>
@endif