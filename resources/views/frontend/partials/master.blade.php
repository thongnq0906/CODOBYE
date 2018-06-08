<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="vi" />
    <meta content="noodp,noydir" name="robots">
    <meta name='keywords' content='' />
    <meta name='description' content='' />
    <title>@yield('title')</title>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/style1.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/style_new.css') }}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ddsmoothmenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/lightslider.css') }}" type="text/css">
</head>

<body id="r-home">
    @include('frontend.partials.header')
    <div class="box-content">
        @yield('content')
    </div>
    @include('frontend.partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/lightslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/ddsmoothmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/devjs.js') }}"></script>
    {{-- <script src="{{ asset('js/jcarousellite_1.0.1c4.js') }}" type="text/javascript"></script> --}}
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.validate.js') }}"></script>
    <link href="{{ asset('frontend/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('frontend/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/js/jcarousellite_1.0.1c4.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        ddsmoothmenu.init({
            mainmenuid: "smoothmenu3",
            orientation: 'h',
            classname: 'ddsmoothmenu3',
            contentsource: "markup"
        })
    </script>
    <script type="text/javascript">
            ddsmoothmenu.init({
                mainmenuid: "smoothmenu4",
                orientation: 'h',
                classname: 'dm',
                contentsource: "markup"
            })
        </script>
    {{-- <script type="text/javascript">
        $(function($) {
            $(".newsticker-jcarousellite").jCarouselLite({
                vertical: true,
                hoverPause:true,
                visible: 4,
                auto:500,
                speed:3000,
                liWidth: 207,
                liHeight: 180
            });
        });
    </script> --}}
    <script>
        $("#img_01").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', scrollZoom : true});
        $("#img_01").bind("click", function(e) {
        var ez =   $('#img_01').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
        });
    </script>

    <script type="text/javascript">
        $(function(){
            $(".content").hide();
            $(".activeDiv").show(1);

            $(".pvt_compe").click(function(){
            //chuyển tap li
            $(".pvt_compe").each(function(){
                $(this).removeClass("active");
            })
            $(this).addClass("active");


            $(".content").hide();
            stt = $(this).attr("stt");
            $(".content").each(function(){

                if($(this).attr("sttdiv")==stt){
                    $(this).fadeIn(1);
                }

            });
            });
            });
    </script>
    @yield('script')
</body>

</html>