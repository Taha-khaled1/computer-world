<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Internet Explorer Compatible meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- first mobile meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Comouters World</title>
    <link href="ex/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="ex/css/style.css" rel="stylesheet" type="text/css">
    <link href="ex/css/media.css" rel="stylesheet" type="text/css">
    <script src="ex/js/html5shiv.min.js"></script>
    <script src="ex/js/respond.min.js"></script>
    <script src="ex/js/jquery-2.2.4.js"></script>
    <script src="ex/js/bootstrap.min.js"></script>
    <script src="{{ asset('ex/js/data.js') }}"></script>
    {{-- <script src="ex/js/function.js"></script> --}}
</head>


<body onload="footer(),data()">
    <div class="header bg-c-black">
        <div class="floatright logodiv">
            <img src="ex/images/cw.png" width="130px">
            <img src="ex/images/name.png" width="185px">
        </div>
        <div class="floatright divsearch">
            <label class="labelsearch">أبحث في الموقع :</label>
            <input type="text" class="inputsearch" placeholder="أبحث هنا">
            <input type="button" class="search" value="إبحث">
        </div>
    </div>
    <div class="clear"></div>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html"><span class="glyphicon glyphicon-home"
                                aria-hidden="true"></span> الرئيسة</a></li>
                    <li><a href="{{route('about')}}">من نحن</a></li>
                    <li><a href="#">اتصل بنا</a></li>
                    <li><a href="#">تحتاج مساعدة ؟</a></li>
                    <li><a href="{{ route('login') }}">دخـول</a></li>
                </ul>
            </div><!--/.nav-collapse -->
            <button class="cart">سلة الشراء</button>
        </div>
        {{--




                --}}



    </nav>
    <div>
        <!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle dep" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                اقسام الموقع <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('cat1') }}"> قسم ألبسة عامة</a></li>
                <li><a href="{{ route('cat2') }}">مفروشات</a></li>
                <li><a href="{{ route('cat3') }}">صحية </a></li>
                <li><a href="{{ route('cat4') }}"> أجهزة إلكترونية وكهربائية</a></li>
                <li><a href="{{ route('cat5') }}">قسم لحوم</a></li>
                <!-- <li><a href="#">اجهزة سيرفرات</a></li> -->
                <li><a href="{{ route('cat6') }}">اجهزة عرض</a></li>
                <li><a href="{{ route('cat7') }}">اجهزة ألعاب</a></li>
                <li><a href="{{ route('cat8') }}">حقائب لابتوبات ماركة</a></li>
            </ul>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img data-src="holder.ex/js/1140x500/auto/#777:#555/text:First slide" alt="First slide [1140x500]"
                        src="ex/images/1.png" data-holder-rendered="true" width="100%">
                </div>
                <div class="item">
                    <img data-src="holder.ex/js/1140x500/auto/#666:#444/text:Second slide"
                        alt="Second slide [1140x500]" src="ex/images/2.png" data-holder-rendered="true"
                        width="100%">
                </div>
                <div class="item">
                    <img data-src="holder.ex/js/1140x500/auto/#555:#333/text:Third slide" alt="Third slide [1140x500]"
                        src="ex/images/3.png" data-holder-rendered="true" width="100%">
                </div>
                <div class="item">
                    <img data-src="holder.ex/js/1140x500/auto/#555:#333/text:Third slide" alt="Third slide [1140x500]"
                        src="ex/images/4.png" data-holder-rendered="true" width="100%">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="clear"></div>

    <div class="divlast">
        <h2>آخر العروض في جميع الاقسام</h2>
        <div id="lap">
            @foreach ($products as $we)
                @if ($we->allaw == 1 & $we->type==3)
                {{-- $we->allaw == 1 & $we->type==3 --}}
                    <div class="w3-third">
                        <div class="w3-container">
                            <img src="img/{{ $we->image }}" alt="Person" style="width:100%">
                            <h3 class="name">{{ $we->dis }}</h3>
                            <p class="cred price">السعر :{{ $we->price }}</p>
                            <button class="w3-btn-block bgblack">معرفة المزيد + </button>
                            <a href="{{route('shoping',$we->id)}}"><button class="w3-btn-block bgred">إضافة إلى السلة + </button></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="clear"></div>
    <br>



    <div id="footer">
        <div id="sub-footer-1">
            <h2>للتواصل</h2>
            <hr>
            <div id="conect" class="cwhite"></div>
        </div>
        <div id="sub-footer-2">
            <h2>خدمة العملاء</h2>
            <hr>
            <a href="#">عنـــا</a>
            <a href="#">طرق الدفع</a>
            <a href="#">الشحن والتوصيل</a>
        </div>

        <div id="sub-footer-3">
            <h2>اسعار الصرف</h2>
            <hr>
            <div id="exchange" class="cwhite">

            </div>
        </div>
    </div>
    <div class="footerc"><span>جميع الحقوق محفوظة لفريق Genuis Programmer 2020</span></div>

</body>

</html>
