@if(!empty($most_readed))
<div class="col-md-3 ">
    <!-- section header -->
    <div class="col-md-12">
        <div class=" special-section   ms-md-4 ">
            <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
                <div class="d-flex align-items-center justify-content-between col-12 py-2">
                    <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>

                    <p class="flex-grow-1 my-auto">সর্বাধিক পঠিত</p>

                </div>

            </div>
            <div class="quickPostSectionItem bg-transparent h-100">
                <ul class="list-group bg-transparent h-100">
                @foreach($most_readed as $news)
                    <li class="list-group-item">
                        <a aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                            <div class="d-flex">
                                <div class="d-flex col-5">
                                <img class="col-12" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="Most_readed">
                                </div>

                                <div class="col-7" style="padding-left:10px;"> 
                                    <span class="title" style="font-weight: bold;font-size: 16px;">
                                        {{$news->news_headline}}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>

        </div>

    </div>

</div>
@endif