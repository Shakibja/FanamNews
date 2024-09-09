<div class="col-md-8">
    <!-- section header -->
    <div class="col-12 border-5 border-start border-primary ">
        <h3 class="py-2 ps-3 fw-semibold ">আলোচনার শীর্ষে</h3>
    </div>
    <div class="d-flex flex-wrap">
    @isset($tott_1)
        <div class="col-md-6">
            <a href="{{ route('news_details', $tott_1->slug)}}">
                <div class="d-flex col-12 my-2">
                <img class="col-12" src="{{ asset('backend/images/news-himages/'.$tott_1->news_title_image) }}" alt="{{$tott_1->news_headline}}">
                </div>
                <div>
                    <h4 class="title h4">
                        @if($tott_1->news_headline)
                            {{$tott_1->news_headline}}
                        @endif
                    </h4>
                    <p class="seb-slug ">
                        
                    </p>
                </div>
            </a>
        </div>
    @endisset  

    @isset($tott_2)
        <div class="col-md-6">
            <div class="px-2 col-12 ">
            @foreach($tott_2 as $news)
                <a class="row py-2" href="/">
                    <div class="col-6 d-flex">
                    <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image) }}" alt="{{$news->news_headline}}">
                    </div>
                    <div class="col-6">
                      {{--  <div class="division py-2">
                            খেলাধুলা

                        </div> --}}
                        <h4 class="title fs-6">
                                {{$news->news_headline}}
                        </h4>
                        <p class="text-danger">বিস্তারত...</p>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
        @endisset 
    </div>
</div>