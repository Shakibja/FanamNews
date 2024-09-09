@extends('frontend.mastering.master')
@section('page-content')
<style>
    * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 50vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 410px;
  width: 100%;
  text-align: center;
}

.notfound .notfound-404 {
  height: 280px;
  position: relative;
  z-index: -1;
}

.notfound .notfound-404 h1 {
  font-family: 'Montserrat', sans-serif;
  font-size: 230px;
  margin: 0px;
  font-weight: 900;
  position: absolute;
  left: 50%;
  -webkit-transform: translateX(-50%);
      -ms-transform: translateX(-50%);
          transform: translateX(-50%);
  background-image: url('{{ asset('frontend/images/bg.jpg')}}');
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-size: cover;
  background-position: center;
}


.notfound h2 {
  font-family: 'Montserrat', sans-serif;
  color: #000;
  font-size: 24px;
  font-weight: 700;
  text-transform: uppercase;
  margin-top: 0;
}

.notfound p {
  font-family: 'Montserrat', sans-serif;
  color: #000;
  font-size: 14px;
  font-weight: 400;
  margin-bottom: 20px;
  margin-top: 0px;
}

.notfound a {
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  text-decoration: none;
  text-transform: uppercase;
  background: #0046d5;
  display: inline-block;
  padding: 15px 30px;
  border-radius: 40px;
  color: #fff;
  font-weight: 700;
  -webkit-box-shadow: 0px 4px 15px -5px #0046d5;
          box-shadow: 0px 4px 15px -5px #0046d5;
}


@media only screen and (max-width: 767px) {
    .notfound .notfound-404 {
      height: 142px;
    }
    .notfound .notfound-404 h1 {
      font-size: 112px;
    }
}

</style>
<?php
function limitText($text, $limit) {
    // Remove any HTML tags from the text
    $text = strip_tags($text);
    // Check if the length of the text is already within the limit
    if (strlen($text) <= $limit) {
        return $text; // No need to truncate
    }
    // Find the last space within the limit
    $lastSpace = strrpos(substr($text, 0, $limit), ' ');
    // Truncate the text to the last space within the limit
    $truncatedText1 = substr($text, 0, $lastSpace);

    return $truncatedText1;
}
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    <!-- TODO adv content to remove -->
                    @if(!empty($category_banner1))
                    <div class=" container">
                        <div class="adv-row"> 
                        <img src="{{ asset('backend/images/advertise/' . $category_banner1->adimage) }}" style="width: 100%;height: 150px; " />

                        </div>
                    </div>
                    @endif
                    <!-- TODO adv content to remove -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="category-area mt-3">
            <div class="heading-title d-flex align-items-center fs-4">

                <a href="#">
                    <h1>{{$category_name->category_name}} </h1>
                </a>
                <p><i class="fa-solid fa-angles-right fs-4 px-2"></i></p>
            </div>


            <div class="category-lead mt-2">
                <div class="row my-4">
                    <div class="col-md-9">
                    <div id="notfound">
                      <div class="notfound">
                        <div class="notfound-404">
                          <h1>Oops!</h1>
                        </div>
                        <h2>404 - News not found</h2>
                        <!-- <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p> -->
                        <a href="{{ route('home') }}">Go To Homepage</a>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="DRightSideAdd mt-3 mb-4 col-12">
                            <!-- TODO remove line -->

                            <!-- <div class="adv-col flex-grow-1 ">

                            </div> -->

                            @if(!empty($category_banner2))
                                <div class="adv-col" >
                                <img src="{{ asset('backend/images/advertise/' . $category_banner2->adimage) }}" style="height: 300px;width: 100%;" />
                                </div>
                            @endif


                            <!-- TODO remove line -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="ad-area d-flex justify-content-center">

                <div class="col-12">
                    <div class="d-flex justify-content-center mt-4">
                        <!-- TODO adv content to remove -->
                        @if(!empty($category_banner3))
                        <div class=" container">
                            <div class="adv-row"> 
                            <img src="{{ asset('backend/images/advertise/' . $category_banner3->adimage) }}" style="width: 100%;height: 150px; " />

                            </div>
                        </div>
                        @endif
                        <!-- TODO adv content to remove -->
                    </div>
                </div>

            </div>


        </div>
    </div>
</main>
@endsection

