<div class="col-md-9">
@if(!empty($international_1))
    <!-- section header -->
    <div class="col-12 d-flex ps-2 me-md-2">
        <div class="pt-1 pe-5  fw-semibold border-2 border-bottom  border-primary  ">বিদেশ</div>
    </div>
    <div class="d-flex flex-wrap mt-2">

        <div class="col-md-6 d-md-flex">
            <div class="col-md-6">
                @foreach($international_2 as $news)
                <div class="px-2 col-12 ">
                    <a class="py-2" aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">

                        <div class="col-12 d-flex">
                        <img class="img-fluid w-100" src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}" alt="International" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                        </div>
                        <div class="col-12 py-2" >
                            <span class="title" style="font-weight: bold;font-size: 16px;">
                                {{$news->news_headline}}
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                @foreach($international_3 as $news)
                <div class="row px-1">
                    <div class="col-md-12 pt-2 text-start text-md-end text-lg-end text-xl-end text-xxl-end ">
                        <h2 class="fs-6">
                            <a class="title h7" aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                                <span style="font-weight: bold;font-size: 16px;">
                                {{$news->news_headline}}
                                </span>
                            </a>
                        </h2>
                        <hr>
                    </div>
                    {{-- <div class="quickPostSectionItem ">
                        <ul class="list-group">
                            <ul class="list-group bg-transparent">
                                <li class="list-group-item">
                                    
                                </li>
                            </ul>
                        </ul>
                    </div> --}}
                </div>
                @endforeach
            </div>

        </div>
        <div class="col-md-6" style="padding-left:20px;">
            <a aria-label="{{$international_1->news_headline}}" href="{{ route('news_details', $international_1->slug)}}">
                <div class="d-flex col-12 my-2">
                <img class="col-12 img-fluid w-100" src="{{asset('backend/images/news-himages/'.$international_1->news_title_image)}}" alt="International" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                </div>
                <div>
                    <span class="title" style="font-weight: bold;font-size: 16px;">
                        {{$international_1->news_headline}}
                    </span>
                    <br>
                    <span class="seb-slug ">
                            {!! limitText($international_1->news_body, 600) !!}
                    </span>
                    <p class="text-danger">বিস্তারত...</p>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>
