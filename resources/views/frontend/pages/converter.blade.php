@php
    $SiteSetting = get_latest_site_settings();
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $SiteSetting->site_title }} Bangla Bijoy to Unicode Converter</title>
    <meta content="text/html; charset=utf-8" http-equiv=content-type>
    <meta name=robots content="index, follow">
    <link href="{{asset('frontend')}}/bijoyTounicode/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{asset('frontend')}}/bijoyTounicode/css/center.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/static/version/0.04/js/jquery-1.11.2.js"></script>
    <script src="https://use.fontawesome.com/49434536cd.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/js/bijoy2uni.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/js/uni2bijoy.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/js/common.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/js/layout.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/js/js.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/js/js1.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/bijoyTounicode/js/count.js"></script>
</head>

<body>
    <table width="100%" border="0" align="center" style="margin: 0 auto; background:#d3d3d3">
        <tr>
            <td align="center">

                <table width="90%" style="max-width:1050px; margin:10px" border="0">
                    <form name="myForm" action="" method="post">

                        <tr>

                            <td align="center" valign="middle">

                                <div style="margin:10px 0 10px 0;">

                                    <a class="" href="#"> <img class="img-fluid" src="{{asset('backend/images/site_settings/'.$SiteSetting->header_logo)}}" style="height: 35px;max-width: 100%;max-height: 100%;"> </a>
                                    <p style="font-size:16px; font-weight:bold; margin-top:10px;">সহজেই কনভার্ট করুন বাংলা ফন্ট</p>

                                </div>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <div class="row">

                                    <div class="col-md-12">

                                        <h1 style="font-size:16px;font-weight:bold; font-family:SolaimanLipi">ইউনিকোড কি-বোর্ডের লেখা এখানে পেস্ট করুন</h1>

                                        <TEXTAREA class="unicode_textarea" onKeyPress="return KeyBoardPress(event);" id=EDT onKeyDown="return KeyBoardDown(event);" name="textarea" onBlur="InputLengthCheck();" onKeyUp="InputLengthCheck();" autofocus="autofocus" value="" placeholder=""></TEXTAREA>

                                    </div>
                                    <div class="col-md-12">
                                        <h1 style="font-size:16px;text-align:left;font-weight:bold;font-family: SutonnyMJ;">বিজয় কি-বোর্ডের লেখা এখানে পেস্ট করুন</h1>
                                        <TEXTAREA class="bijoy_textarea" id="CONVERTEDT" autofocus value="" placeholder=""></TEXTAREA>

                                    </div>

                                </div>

                            </td>

                        </tr>

                        <tr>

                            <td align="center" height="60px" valign="middle">

                                <div class="convert_button_left">

                                    <button type="button" class="bijoy_button btn btn-primary" onClick="ConvertToTextArea('CONVERTEDT');" name="ConvertToAsciiButton"><span class="fa fa-arrow-right" aria-hidden="true"></span> ইউনিকোড টু বিজয় </button>

                                    <button type="button" class="unicode_button btn btn-success" onClick="ConvertFromTextArea('CONVERTEDT');" name="ConvertButton"><span class="fa fa-arrow-left" aria-hidden="true"></span> বিজয় টু ইউনিকোড </button>

                                    <button type="reset" class="reset_button btn btn-danger" name=ClearButton><span class="fa fa-refresh" aria-hidden="true"></span> মুছে ফেলুন </button>


                                </div>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <div>

                                    <input readonly type="hidden" name="CharsTyped" size="2" style="font-weight:bold; border: 0px solid #2D69AE; color:#808080; text-align:left;">

                                    <input readonly type="hidden" name="WordsTyped" size="3" style="font-weight:bold; border: 1px solid #2D69AE; color:#808080; text-align:right;">

                                    <input readonly type="hidden" name="CharsLeft" size="8">

                                    <input readonly type="hidden" name="WordsLeft" size="8">

                                </div>
                            </td>
                        </tr>

                    </form>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>