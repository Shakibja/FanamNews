@extends('frontend.mastering.master')
@section('page-content')
<?php
use App\Models\Backend\Category;
use Illuminate\Support\Facades\File;
$file_exist = File::exists('backend/images/news-himages/' . $singleNews->news_title_image);
?>
<section class="details-page py-2">
    <div class="container">
        <!-- breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-wrap py-2">
                    <nav aria-label="breadcrumb " class="breadcrumbs large-font">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" role="button" tabindex="0">
                                    <i class="fa-solid fa-house-chimney"></i></a></li>
                            <!-- TODO dynamic   -->
                            <li class="breadcrumb-item"><a href="/">
                                    @php
                                        $categogy = Category::where('category_slug', $singleNews->category_slug)->first();
                                        echo $categogy->category_name;
                                    @endphp
                            </a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
        <div class="row">
            <!-- main news -->
            <div class="col-lg-9">
                <div class="dheading my-2">
                    <!-- TODO dynamic  sub header -->
                   {{-- <h2 class="DsubHead h5">{{$singleNews->news_shoulder}}</h2> --}} 
                    <!-- TODO dynamic   header -->
                    <h1 class="h2">{{$singleNews->news_headline}}</h1>
                    <h2 class="DShoulder"></h2>
                </div>
                <!-- TODO dynamic   photo & captions -->
                <div class="DNewsImg">
                    <img class="{{$file_exist?'img-fluid w-100':''}}" data-src="{{ asset('backend/images/news-himages/'.$singleNews->news_title_image) }}" src="{{ asset('backend/images/news-himages/'.$singleNews->news_title_image) }}" alt="{{$singleNews->title_image_courtecy}}" title="{{$singleNews->news_headline}}">
                    <p class="text-center"></p>

                </div>
                <div class="row MobileShow d-lg-none my-3">
                    <div class="col-12">
                        <div class="d-flex justify-content-center mt-4">
                            <!-- TODO remove line -->


                            <div class=" container">
                                <!-- <div class="adv-row "> </div> -->
                                

                            </div>
                            <!-- TODO remove line -->
                        </div>
                    </div>
                </div>

                <!-- social share  -->
                <div class="d-flex ">
                    <div class="col-lg-4 d-flex">
                        <div class="align-self-stretch justify-content-center">
                            <div class="writter ">
                                <p>অনলাইন ডেস্ক</p>
                            </div>
                            <div class="dateAndTime">
                                <!-- TODO dynamic date and time -->
                                <!-- <p><i class="fa-regular fa-clock"></i> প্রকাশ: ০৫ জানুয়ারি ২০২৪ | ০৭:৫৮ </p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="sharethis-wrap d-flex align-self-stretch justify-content-center">
                            <!-- add2any share btn -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="line-height: 32px;">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_whatsapp"></a>
                                <a class="a2a_button_linkedin"></a>
                                <a class="a2a_button_telegram"></a>
                                <a class="a2a_button_facebook_messenger"></a>
                                <a class="a2a_button_email"></a>
                                <!-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
                                <div style="clear: both;"></div>
                            </div>
                            <script async="" src="https://static.addtoany.com/menu/page.js" type="text/javascript"></script>

                        </div>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center">
                        <div class="DTextZoom d-flex align-self-stretch justify-content-end w-100 ">
                            <button id="btnDecrease">-</button>
                            <button id="btnOriginal">অ</button>
                            <button id="btnIncrease">+</button>
                        </div>

                    </div>
                </div>
                <!-- social share  -->
                <!-- contentDetails -->
                <div class="dNewsDesc" id="contentDetails">
                    <p>{!! $singleNews->news_body !!}</p>
                    
                </div>
                <!-- contentDetails end-->

                <div class="row MobileShow d-flex d-lg-none">
                    <div class="col-md-12">
                        <div class="DetailsAdd d-flex justify-content-center">
                            <!-- TODO remove line -->
                            <div class=" container">
                                <!-- <div class="adv-row "> </div> -->
                            </div>
                            <!-- TODO remove line -->
                        </div>
                    </div>
                </div>
                <div class="sharethis-wrap mt-4">
                    <div class="sharethis-inline-share-buttons">
                        <div class="sharethis-wrap d-flex align-self-stretch justify-content-center">
                            <!-- add2any share btn -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="line-height: 32px;">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_whatsapp"></a>
                                <a class="a2a_button_linkedin"></a>
                                <a class="a2a_button_telegram"></a>
                                <a class="a2a_button_facebook_messenger"></a>
                                <a class="a2a_button_email"></a>
                                <!-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="CatNewsListArea mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="catSectionHeading my-3 fs-4 ">
                                <h3>আরও পড়ুন</h3>

                            </div>
                        </div>
                    </div>
                    <div class="CatNewsListWrap">
                        <div class="row gx-4">
                            <!-- TODO dynamic news -->
                            @foreach($relatedNews as $news)
                            <div class="col-lg-6 ">
                                <a href="{{ route('news_details', $news->slug)}}">
                                    <div class="CatNewsListContent">
                                        <div class="row">
                                            <div class="col-lg-5 col-5">
                                                <div class="CatNewsListImg">
                                                    <img data-src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}" src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}" alt="{{$news->title_image_courtecy}}" title="{{$news->news_headline}}" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-7">
                                                <div class="CatNewsLisText">
                                                    <div class="Desc">
                                                        <h3 class="title fs-5">{{$news->news_headline}}</h3>
                                                        <span class="PublishTime"><i class="fa-regular fa-clock"></i>
                                                        {{-- আপডেট ০৬ জানুয়ারি ২০২৪ | ০৪:৫২ --}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <div class="row MobileHide d-none d-lg-flex ">
                    <div class="col-12">
                        <div class="d-flex justify-content-center mb-5">
                            <!-- TODO remove line -->
                            <div class=" container">
                                <!-- <div class="adv-row "> </div> -->

                            </div>
                            <!-- TODO remove line -->

                        </div>
                    </div>
                </div>
                <div class="row MobileShow d-lg-none">
                    <div class="col-md-12">
                        <div class="DetailsAdd d-flex justify-content-center">
                            <!-- TODO remove line -->
                            <div class=" container">
                                <!-- <div class="adv-row "> </div> -->

                            </div>
                            <!-- TODO remove line -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dAddImg-wrap MobileHide  d-lg-flex flex-column">
                    <div class="DRightSideAdd mt-3 mb-4 col-12">
                        <!-- TODO remove line -->

                        @if(!empty($details_banner1))
                                <div class="adv-col" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner1->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif


                        <!-- TODO remove line -->

                    </div>
                    <div class="DRightSideAdd col-12">
                        <!-- TODO remove line -->
                        @if(!empty($details_banner2))
                                <div class="adv-col" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner2->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif
                        <!-- TODO remove line -->

                    </div>
                </div>

                <div class="DlastNews">
                    <div class="dlastHead position-relative mt-3">
                        <a href="/latest/news">
                            <h3>সর্বশেষ</h3>
                        </a>
                    </div>
                    <div class="dAllListWrap  ">
                        @foreach($latestNews as $news)
                        <div class="DlastNews-list py-2">
                            <a href="{{ route('news_details', $news->slug)}}">
                                <div class="row gx-2">
                                    <div class="col-5">
                                        <div class="dLastNewsImg">
                                            <img class="img-fluid" data-src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="{{$news->title_image_courtecy}} &nbsp;&nbsp;" title="{{$news->news_headline}} &nbsp;&nbsp;">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="dLastNewsText">
                                            <h5 class="title fs-6">{{$news->news_headline}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach  
                    </div>
                    <div class="DreadMoreBtn">
                        <a class="fs-5 fw-semibold" href="{{route('latestNews')}}">আরও পড়ুন <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="DRightSideAdd mt-4 mb-4 MobileHide d-none d-lg-flex">
                    <!-- TODO remove line -->
                    <div class=" container">
                    @if(!empty($details_banner3))
                                <div class="adv-col" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner3->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif

                    </div>
                    <!-- TODO remove line -->


                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-none">
    <div class="DContentAdd2">
        <div class="row mt-3 mb-3 MobileHide d-none d-lg-flex">
            <div class="col-md-12">
                <div class="DetailsAdd d-flex justify-content-center">

                    <!-- TODO replace for Adv -->
                    <div class=" container">
                    @if(!empty($details_banner4))
                                <div class="adv-col" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner4->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif

                    </div>
                    <!-- TODO replace for Adv -->
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3 MobileShow d-lg-none">
            <div class="col-md-12">
                <div class="DetailsAdd d-flex justify-content-center">

                    <div class=" container">
                        @if(!empty($details_banner3))
                                <div class="adv-row" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner3->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="DContentAdd">
        <div class="row mt-3 mb-3 MobileHide d-none d-lg-flex">
            <div class="col-md-12">
                <div class="DetailsAdd d-flex justify-content-center">
                    <div class=" container">
                    @if(!empty($details_banner3))
                                <div class="adv-row" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner3->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif

                    </div>



                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3 MobileShow d-lg-none">
            <div class="col-md-12">
                <div class="DetailsAdd d-flex justify-content-center">
                    <!-- TODO remove line -->
                    <div class=" container">
                    @if(!empty($details_banner3))
                                <div class="adv-row" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner3->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif

                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <div class="DetailsAdd d-flex justify-content-center">
                    <!-- TODO remove line -->
                    <div class=" container">
                    @if(!empty($details_banner3))
                                <div class="adv-row" >
                                <img src="{{ asset('backend/images/advertise/' . $details_banner3->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif

                    </div>



                </div>
            </div>
        </div>
    </div>
</section>
@endsection