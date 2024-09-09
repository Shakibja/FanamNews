<footer>
        <div class="container">
            <div class="row">
                <div class="footerTopSection">
                    <ul>
                        <li class="px-2"><a href="#">বিশেষ আয়োজন</a></li>
                        <li class="px-2"><a href="#">মিডিয়ওেয়াচ</a></li>
                        <li class="px-2"><a href="#">ফেসববুক লাইভ</a></li>
                        <li class="px-2"><a href="/advertise">বিজ্ঞাপন মূল্য তালিকা</a></li>
                        <li class="px-2"><a href="#">শিক্ষা বার্তা</a></li>
                        <li class="px-2"><a href="#">ফিচার</a></li>
                        <li class="px-2"><a href="#">আর্কাইভ</a></li>
                        <li class="px-2"><a href="#">ছবি</a></li>
                        <li class="px-2"><a href="#">ভিডিও</a></li>
                        <li class="px-2"><a href="#">উৎসবের বাংলা</a></li>
                    </ul>
                </div>
                <div class="footerMiddleSection">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <p><a href="/privacy">PRIVACY POLICY</a></p>
                            <p><a href="/terms">TERMS OF USE</a></p>
                            <p><a href="#">ALL RIGHTS RESERVED</a></p>
                        </div>
                        <div class="col-lg-4 col-12">
                            
                            <h5 class="h9">সম্পাদক ও প্রকাশক :</h5>
                            <h5 class="fw-bold">গোলাম রাব্বানী</h5>
                            <p>ফোন : <a href="tel:+880121120571">+8801212 005 571</a> <br> <a
                                    href="tel:+880121547744">+8801 210 224 722</a></p>
                            <p> </p>
                            <p>ই-মেইল: <a href="mailto:fanamnews@gmail.com">fanamnews@gmail.com</a>,
                                <a href="mailto:info@fanamnews.com">info@fanamnews.com</a>
                            </p>
                            <address class="mt-2">বাড়ি- ১, ব্লক- এইচ, মেইন রোড, </address>
                            <address>বনশ্রী, রামপুরা, ঢাকা- ১২১৩।</address>
                        </div>
                        <div class="col-lg-4 col-12">
                            <h5 class="FSocialHeadLine ">ফলো করুন </h5>
                            <div class="FSocialShare">
                                <ul>
                                    <li><a href="https://www.facebook.com/" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/" target="_blank"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/" target="_blank"><i
                                                class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li><a href="https://www.youtube.com/" target="_blank"><i
                                                class="fa-brands fa-youtube"></i></a></li>
                                    <li><a href="https://www.instagram.com/" target="_blank"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <a href="" class="Flogo" rel="home">
                                <img src="{{asset('backend')}}/assets/images/main_logo.png" title=" GET THE LATEST ONLINE BANGLA NEWS"
                                    alt="GET THE LATEST ONLINE BANGLA NEWS" class="img-fluid img100">
                            </a>

                            <h5 class="FCopyRight ">© <span id="copywrightTear"></span> <a href="#">ফানাম নিউজ</a>. সমস্ত
                                অধিকার সংরক্ষিত.® </h5>
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