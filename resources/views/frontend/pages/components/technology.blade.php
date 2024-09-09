@if(!empty($technology_1))
<div class="col-md-6">
    <!-- section header -->
    <div class="col-12 border-5 border-start  border-primary ">
        <div class="py-2 ps-3 fw-semibold ">প্রযুক্তি </div>
    </div>
    <div class="d-flex flex-wrap">
        <div class="col-md-6">
            <a aria-label="{{$technology_1->news_headline}}" href="{{ route('news_details', $technology_1->slug)}}">
                <div class="d-flex col-12 my-2">
                <img class="col-12 img-fluid" src="{{asset('backend/images/news-himages/'.$technology_1->news_title_image)}}" alt="Technology" >
                </div>
                <div>
                    <span class="title" style="font-weight: bold;font-size: 16px;">
                        {{$technology_1->news_headline}}
                    </span> 
                    <br>
                    <span class="seb-slug">
                        {!! limitText($technology_1->news_body, 350) !!}
                    </span>
                    <p class="text-danger">বিস্তারত...</p>
                </div>

            </a>


        </div>
        <div class="col-md-6">
        @foreach($technology_2 as $news)
            <div class="px-2 col-12">
                <a class="row py-2" aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                    <div class="col-6 text-start text-md-end text-xl-end text-xxl-end" style="padding-left:10px;">
                        <span class="title" style="font-weight: bold;font-size: 14px;">
                        {{$news->news_headline}}
                        </span>
                    </div>
                    <div class="col-6 d-flex">
                    <img class="w-100 img-fluid" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="Technology" style="image-size: cover; image-repeat: no-repeat; background-position: cover; height: 90px; min-width: 100%">
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endif