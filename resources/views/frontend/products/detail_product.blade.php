@extends('frontend.partials.master')
@section('title', 'Trang chủ')
@section('content')
@include('frontend.partials.sidebar')
<style type="text/css">
    #gallery_01 img{border:1px solid white;}
    .active img{border:1px solid #e1e2e2  !important;}
</style>
<div class="col-xs-12 col-sm-9 col-lg-9">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="row11" style="background-color: #fff;">
                <h2 id="r-tieude1">{{ $product->name }}</h2>
                <div class="col-xs-12 col-sm-5 col-lg-5" style="  margin-bottom: 20px;">
                    <div class="border">
                        <img  style="width:100%;margin-bottom:5px;" id="img_01" src="{{ asset($product->image) }}"
                        data-zoom-image="{{ asset($product->image) }}"/>
                        <div id="gallery_01">
                            <a class="active" href="#" data-image="{{ asset($product->image) }}"
                                data-zoom-image="{{ asset($product->image) }}" title="{{ $product->name }}">
                                <img style="width: auto; height: 51px; margin-bottom: 4px; max-height: 329px;" id="img_01"
                                src="{{ asset($product->image) }}" title="{{ $product->name }}" alt="{{ $product->name }}"/>
                            </a>
                        </div>
                    </div><!--end padding-detail-left-->
                </div>
                <div class="col-xs-12 col-sm-7 col-lg-7" >
                    <div id="r-shot">
                        <!--p id="gia" style="    margin: 10px 0;">Giá : <span>0 VNĐ</span></p-->
                        <p id="gia" style="    margin: 10px 0; ">Mã SP : <strong>RF series</strong> </p>
                        <div id="boxsshort">
                         </div>
                    </div>
                </div>
                <div class="row111">

                <br/><br/>
            <div id="pvt_divClick">
                <ul class="pvt_header">
                    <li stt="1" class="pvt_compe active">Giới thiệu tổng quan</li>
                    <li stt="2" class="pvt_compe">Thông số kỹ thuật</li>
                    <!-- <li stt="3" class="pvt_compe">Nguyên lý</li> -->
                </ul>
                <div sttdiv="1" class="content activeDiv" id="noidungsp">
                    <?php echo(html_entity_decode($product->content)) ?>
                    <br/><br/>
                    <div id="fb-root"></div>
                    <div id="fb-root"></div>
                    <div class="fb-like" data-href="http://cuv.com.vn/chi-tiet/quat-gan-mai-rf-series" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
                    <div class="fb-comments" data-href="http://cuv.com.vn/chi-tiet/quat-gan-mai-rf-series" data-numposts="5"></div>
                </div>
                <div sttdiv="2" class="content" id="noidungsp">
                    <?php echo(html_entity_decode($product->content2)) ?>
                </div>
        </div>
        <div style="height: 35px; clear: both;"></div>
    </div>
    </div>
        <div class=" " style="  background-color: #fff;">
            <div class=" "  >
                <h2 id="r-tieude1">SẢN PHẨM LIÊN QUAN</h2>
                <div class="row" style="">
                    @foreach($involve_product as $i)
                    <div class="col-md-4 col-sm-6 col-xs-12  ">
                        <div class="catproduct">
                            <div class="img">
                                <a title="{{ $i->name }}" href=""><img alt="{{ $i->name }}" src="{{ asset($i->image) }}"></a>
                            </div>
                            <div class="clear"></div>
                            <div class="infopr">
                                <center><a class="name" title="" href="">{{ $i->name }}</a></center>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        #pvt_divClick{width: 100%;    overflow: hidden;}
        #pvt_divClick ul.pvt_header{  padding-bottom: 22px;
        margin: 0px;  padding-top: 10px;}
        #pvt_divClick ul.pvt_header li{     display: inline;
            list-style: none;
            ;padding: 10px 24px;    font-family: OpenSansB;
            / border: 1px solid #727785; /
            / border-radius: 5px 5px 0px 0px; /
            padding: 14px 51px;
            background: #e1e2e2;
            color: #333;
            padding-top: 14px;}
            #pvt_divClick ul.pvt_header li:hover{cursor: pointer; color: #ff6666;}

            .active{  background: #0174af!important;color:#fff!important;}
            #pvt_tableCompePrice{width: 100%;}
            #pvt_tableCompePrice tr{border-bottom: 1px solid #333333;display: block;}
            #pvt_tableCompePrice tr td{padding: 3px;}
            #pvt_tableCompePrice tr td p{margin: 2px 0px;}
            .pvt_view{background: url("images/backgroundXem.jpg") repeat-x; border-radius: 5px; padding: 5px;}
            .pvt_name{color: #605D57; font-weight: bold;}
            .pvt_name:hover{color: #ff6600; }
            .pvt_price{color: red; font-size: 12px; font-weight: bold;}
            .update{color: #9f9f9f; font-size: 12px;}
            .pvt_contentName{font-size: 13px; color: #362b36;}
            .clear{clear: both;}
            #pvt_left{width: 19.5%; float: right; border-top: 5px solid #cccccc; border: 1px solid #cccccc; }
            #pvt_left h3{margin: 0px;}
            #pvt_left ul{padding: 0px; margin: 0px;}
            #pvt_left ul li{list-style: none; padding: 0px; margin: 0px;}
            #pvt_left ul li img{width: 40%; float: left;}
            .pvt_contentLeft{width: 60%; float: right;}
            .pvt_contentLeft p{margin: 0px;}
    </style>
    <style type="text/css">
        #slide{display: none;}
        .zoomContainer{display: none;}
        .fancybox-overlay{background: rgba(0,0,0,0.5);}
    </style>
</div>

</div>
@endsection
@section('script')
<script>
    (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1579370508992302";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endsection