<div class="col-md-4">
    <div class=" special-section ">
        <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
            <div class="d-flex align-items-center justify-content-between col-12 py-2">
                <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>

                <p class="flex-grow-1 my-auto">সর্বশেষ</p>

            </div>

        </div>
        <div class="quickPostSectionItem bg-transparent my-3">
                <ul class="list-group bg-transparent">
                    @foreach($latest as $news)
                    <li class="list-group-item">
                        <a class="title h7" aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                            <span style="font-weight: bold;font-size: 16px;">
                            {{$news->news_headline}}
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
        </div>

    </div>
</div>