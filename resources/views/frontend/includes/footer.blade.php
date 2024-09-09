<footer>
    <div class="container">
        <div class="row">
            <div class="container" style="border-bottom: 3px solid #b3d9f2;">
                <div class="row d-flex align-items-center justify-content-center flex-wrap px-2 mb-3">
                    <div class="col-12 col-md-2 mb-3 mb-md-0 ">
                        <ul class="list-unstyled d-flex flex-column text-center text-md-start text-lg-start text-xl-start " style="border-left: 3px solid #b3d9f2;">
                            <li class="px-2"><a href="#">শেয়ারবাজার</a></li>
                            <li class="px-2"><a href="#"> পণ্যের বাজার</a></li>
                            <li class="px-2"><a href="#">আজকের দিন</a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-2 mb-3 mb-md-0 ">
                        <ul class="list-unstyled d-flex flex-column text-center text-md-start text-lg-start text-xl-start" style="border-left: 3px solid #b3d9f2;">
                            <li class="px-2"><a href="#">রাশিফল</a></li>
                            <li class="px-2"><a href="#">চট্টগ্রাম</a></li>
                            <li class="px-2"><a href="#">খুলনা</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 mb-3 mb-md-0  ">
                        <ul class="list-unstyled d-flex flex-column text-center text-md-start text-lg-start text-xl-start" style="border-left: 3px solid #b3d9f2;">
                            <li class="px-2"><a href="#">সিলেট</a></li>
                            <li class="px-2"><a href="#">লন্ডন</a></li>
                            <li class="px-2"><a href="#">নিউ ইয়র্ক</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 mb-3 mb-md-0">
                        <ul class="list-unstyled d-flex flex-column text-center text-md-start text-lg-start text-xl-start" style="border-left: 3px solid #b3d9f2;">
                            <li class="px-2"><a href="#">টরেন্টো</a></li>
                            <li class="px-2"><a href="#">সিডনী</a></li>
                            <li class="px-2"><a href="#">কুয়ালালামপুর</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 mb-3 mb-md-0">
                        <ul class="list-unstyled d-flex flex-column text-center text-md-start text-lg-start text-xl-start" style="border-left: 3px solid #b3d9f2;">
                            <li class="px-2"><a href="#"> ব্যাংকক  </a></li>
                            <li class="px-2"><a href="#">দুবাই </a></li>
                            <li class="px-2"><a href="#">চাকরি</a></li>

                        </ul>
                    </div>
                    
                </div>
            </div>


            <div class="footerMiddleSection">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <p class="my-1"><a href="#">যোগাযোগ</a></p>
                        <p class="my-1"><a href="#">গোপনীয়তার নীতি</a></p>
                        <p class="my-1"><a href="#">শর্তাবলী</a></p>
                        <p class="my-1"><a href="{{route('converter')}}">বাংলা কনভার্টার</a></p>
                        <p class="my-1">Design & Developed By <a href="https://techsolutionsbd.com/">Techsolutions Plex Ltd.</a></p>
                    </div>
                    <div class="col-lg-4 col-12">
                        <p>সম্পাদক ও প্রকাশক :</p>
                        <h6 class="fw-bold">{{ $SiteSetting->editor_name }}</h6>
                        <p>ফোন : {{ $SiteSetting->phone_number }}</p>
                        <p>ই-মেইল: {{ $SiteSetting->email }}
                        </p>
                        <address class="mt-2">{{ $SiteSetting->address }}</address>
                    </div>
                    <div class="col-lg-4 col-12">
                        <h5 class="FSocialHeadLine ">ফলো করুন </h5>
                        <div class="FSocialShare">
                            <ul>
                                @foreach ($footer_icon as $footer)
                                <li><a href="{{ $footer->social_url }}" target="_blank"
                                        aria-label="Visit our {{ $footer->social_name }} page"><i
                                            class="{{ $footer->social_link }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="" class="Flogo" rel="home">
                            <img src="{{asset('backend/images/site_settings/'.$SiteSetting->header_logo)}}"
                                title="GET THE LATEST ONLINE BANGLA NEWS" alt="GET THE LATEST ONLINE BANGLA NEWS"
                                class="img-fluid img100">
                        </a>

                        <h5 class="FCopyRight "><a href="#">{{ $SiteSetting->copyright }}</a> </h5>
                        <script>
                            let banglaNumber = {
                                0: "০",
                                1: "১",
                                2: "২",
                                3: "৩",
                                4: "৪",
                                5: "৫",
                                6: "৬",
                                7: "৭",
                                8: "৮",
                                9: "৯",
                            };
                            const engToBdNum = (str) => {
                                for (var x in banglaNumber) {
                                    str = str.replace(new RegExp(x, "g"), banglaNumber[x]);
                                }
                                return str;
                            };
                            const year = new Date().getFullYear().toString()
                            const bnYear = engToBdNum(year)

                            document.getElementById('copywrightTear').innerText = bnYear
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>