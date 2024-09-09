<div class=" special-section mt-3">
    <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
        <div class="d-flex align-items-center justify-content-between col-12 py-2">
            <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>

            <p class="flex-grow-1 my-auto">সম্পাদকীয়</p>

        </div>

    </div>
    <div class="quickPostSectionItem bg-transparent">
        <ul class="list-group bg-transparent">
            @isset($editorial_1)
            <li class="list-group-item ">
                <a aria-label="{{$editorial_1->news_headline}}" href="{{ route('news_details', $editorial_1->slug)}}">
                    <div class="d-flex col-12 my-2">
                        <img class="col-12" src="{{ asset('backend/images/news-himages/'.$editorial_1->news_title_image) }}" alt="Editorial" style="image-size: cover; image-repeat: no-repeat; background-position: cover; height: 120px; min-width: 100%">
                    </div>
                    <span class="title" style="font-weight: bold;font-size: 16px;">
                            {{$editorial_1->news_headline}}
                    </span>
                </a>
            </li>
            @endisset

            @isset($editorial_2)
            @foreach($editorial_2 as $edit)
            <li class="list-group-item">
                <a aria-label="{{$edit->news_headline}}" href="{{ route('news_details', $edit->slug)}}">
                    <div class="d-flex gap-1">
                        <div class="d-flex col-5">
                            <img class="col-12" src="{{ asset('backend/images/news-himages/'.$edit->news_title_image) }}" alt="Editorial" style="image-size: cover; image-repeat: no-repeat; background-position: cover; height: 90px; min-width: 100%">
                        </div>
                       
                        <span class="title col-7 ps-1" style="font-weight: bold;font-size: 16px;">
                            @if($edit->news_headline)
                            {{$edit->news_headline}}
                            @endif
                       </span>
                    </div>
                </a>
            </li>
            @endforeach
            @endisset
        </ul>
    </div>

</div>