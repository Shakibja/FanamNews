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
                                <a href="{{ route('news_details', $editorial_1->slug)}}">
                                    <div class="d-flex col-12 my-2">
                                        <img class="col-12" src="{{ asset('backend/images/news-himages/'.$editorial_1->news_title_image) }}" alt="{{$editorial_1->news_headline}}"  height="120px" width="120px">
                                    </div>
                                    <h3 class="h5">
                                    @if($editorial_1->news_headline)
                                        {{$editorial_1->news_headline}}
                                    @endif
                                    </h3>
                                </a>
                            </li>
                        @endisset

                        @isset($editorial_2)
                        @foreach($editorial_2 as $edit)
                            <li class="list-group-item">
                                <a href="{{ route('news_details', $edit->slug)}}">
                                    <div class="d-flex">
                                        <div class="d-flex col-5">
                                            <img class="col-12" src="{{ asset('backend/images/news-himages/'.$edit->news_title_image) }}" alt="{{$edit->news_headline}}">
                                        </div>
                                        <h4 class=" title col-7 ps-1 fs-5">
                                        @if($edit->news_headline)
                                        {{$edit->news_headline}}
                                        @endif
                                        </h4>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        @endisset
                        </ul>
                    </div>

                </div>