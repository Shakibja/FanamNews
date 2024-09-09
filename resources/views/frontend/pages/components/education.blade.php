@if(!empty($education_1))
<div class="col-md-6">
    <!-- section header -->
    <div class="col-12 border-5 border-start  border-primary ">
        <div class="py-2 ps-3 fw-semibold ">শিক্ষা</div>
    </div>
    <div class="d-flex border-md-start  border-primary  flex-wrap">

        <div class="col-md-6">
        @foreach($education_2 as $news)
            <div class="px-2 col-12 ">
                <a class="row py-2" aria-label="{{$news->news_headline}}" href="{{ route('news_details', $news->slug)}}">
                    <div class="col-6 text-start text-md-end text-xl-end text-xxl-end" style="padding-left:10px;">
                        <span class="title" style="font-weight: bold;font-size: 14px;">
                        {{$news->news_headline}}
                        </span>
                    </div>
                    <div class="col-6 d-flex">
                    <img class="w-100 img-fluid" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="Education" style="image-size: cover; image-repeat: no-repeat; background-position: cover; height: 90px; min-width: 100%">
                    </div>
                </a>
            </div>
        @endforeach
        </div>
        <div class="col-md-6">
            <a aria-label="{{$education_1->news_headline}}" href="{{ route('news_details', $education_1->slug)}}">
                <div class="d-flex col-12 my-2">
                <img class="col-12 img-fluid w-100" src="{{asset('backend/images/news-himages/'.$education_1->news_title_image)}}" alt="Education" style="image-size: cover; image-repeat: no-repeat; background-position: cover;">
                </div>
                <div>
                    <span class="title" style="font-weight: bold;font-size: 16px;">
                        {{$education_1->news_headline}}
                    </span> 
                    <br>
                    <span class="seb-slug">
                        {{ limitText($education_1->news_body, 350) }}
                    </span>
                    <p class="text-danger">বিস্তারত...</p>
                </div>

            </a>


        </div>
    </div>
</div>
@endif