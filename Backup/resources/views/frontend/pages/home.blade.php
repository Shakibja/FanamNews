@extends('frontend.mastering.master')
@section('page-content')

<section class="container">
        <!-- <div class="marquee d-flex align-items-center ">

            <h6><i class="px-1">
                    <img src="./images/fire-icon-flame-sign-png.ico" alt="fire" height="20" />
                </i> ভোটের দিন সকালে অধিকাংশ কেন্দ্রে ব্যালট যাবে: সিইসি
                <i class="px-1 ">
                    <img src="./images/fire-icon-flame-sign-png.ico" alt="fire" height="20" />
                </i>
            </h6>
        </div> -->
    </section>
    <!-- <section class=" container">
        <div class="adv-row "> </div>

    </section> -->

    <section class="top-news container py-4">
        <div class="row">
            <!-- lead page starts  -->
            @include('frontend.pages.components.lead')
            <!-- lead page ends  -->
            <div class="col-lg-3 d-flex flex-column">
                <!-- <div class="adv-col flex-grow-1"></div> -->
                @if(!empty($banner_right))
                    <div class="adv-col" >
                    <img src="{{ asset('backend/images/advertise/' . $banner_right->adimage) }}" style="height: 300px;width: 100%;" />
                    </div>
                @endif
                
                <!-- editorial page starts  -->
                @include('frontend.pages.components.editorial')
                <!-- editorial page ends  -->

            </div>
        </div>

    </section>

    <!-- 1ast page 1st ads  -->
    @if(!empty($banner_show))

    <section class="container">
        <div class="adv-row" >
        <img src="{{ asset('backend/images/advertise/' . $banner_show->adimage) }}" style="width: 100%;height: 150px; " />
         </div>
    </section>
    @endif


    <section class="top-of-the-talk py-1 my-2 container border-1 border-top">
        <div class="d-md-flex">
        {{-- আলোচনার শীর্ষে --}}
        @include('frontend.pages.components.talk_of_the_town')

        {{-- সর্বশেষ --}}
        @include('frontend.pages.components.latest')
        </div>

    </section>
    <section class="politics-n-cities py-1 my-1 container border-1 border-top">
        <div class="d-md-flex">
            <!-- রাজনীতি -->
            @include('frontend.pages.components.politics')

            <!-- আইন-আদালত -->
            @include('frontend.pages.components.court-and-law')
            
            


        </div>

    </section>

    <section class="Bangladesh py-1 my-1 container border-1 border-top">
        <div class="d-md-flex">
            <!-- সারাদেশ -->
            @include('frontend.pages.components.total-country')

            <!-- বাংলা-প্রবাস -->
            @include('frontend.pages.components.bangla-abroad')
        </div>

    </section>

    <!--  -->
    <!-- <section class=" container">
        <div class="adv-row "> </div>

    </section> -->
    <!-- খেলাধুলা -->
    @include('frontend.pages.components.sports')

    <section class="international py-1 my-2 container border-1 border-top">
        <div class="d-md-flex">
            <!-- আন্তর্জাতিক -->
            @include('frontend.pages.components.international')
            

            <!-- সর্বাধিক পঠিত -->
            @include('frontend.pages.components.most-readed')
        </div>

    </section>

    <!-- অর্থ ও বাণিজ্য-->
    @include('frontend.pages.components.economy-trade')

    
    <section class="tech-n-education py-2 my-1 container border-1 border-top">
        <div class="d-md-flex">
            <!-- প্রযুক্তি -->
            @include('frontend.pages.components.technology')
            
            <!-- শিক্ষাঙ্গন -->
            @include('frontend.pages.components.education')
            


        </div>

    </section>

@endsection