<div class="col-md-8">
    <!-- section header -->
    <div class="col-12 border-5 border-start border-primary ">
        <h3 class="py-2 ps-3 fw-semibold ">আলোচনার শীর্ষে</h3>
    </div>
    <div class="d-flex flex-wrap">
    @isset($tott_1)
        <div class="col-md-6">
            <a aria-label="{{$tott_1->news_headline}}" href="{{ route('news_details', $tott_1->slug)}}">
                <div class="d-flex col-12 my-2">
                <img class="col-12" src="{{ asset('backend/images/news-himages/'.$tott_1->news_title_image) }}" alt="Talk_of_the_Town">
                </div>
                <div>
                    <span class="title" style="font-weight: bold;font-size: 16px;">
                        @if($tott_1->news_headline)
                            {{$tott_1->news_headline}}
                        @endif
                    </span>
                    <br>
                    <span class="seb-slug ">
                            {{ limitText($sports_1->news_body, 600) }}
                    </span>
                    <p class="text-danger">বিস্তারত...</p>
                </div>
            </a>
        </div>
    @endisset  

    @isset($tott_2)
        <div class="col-md-6">
            <div class="px-2 col-12 ">
            @foreach($tott_2 as $news)
                <a aria-label="{{$news->news_headline}}" class="row py-2" href="{{ route('news_details', $news->slug)}}">
                    <div class="col-6 d-flex">
                    <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image) }}" alt="Talk_of_the_Town">
                    </div>
                    <div class="col-6">
                      {{--  <div class="division py-2">
                            খেলাধুলা

                        </div> --}}
                        <span class="title" style="font-weight: bold;font-size: 16px;">
                        {{$news->news_headline}}
                        </span>
                        <p class="text-danger">বিস্তারত...</p>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
        @endisset 
    </div>
</div>