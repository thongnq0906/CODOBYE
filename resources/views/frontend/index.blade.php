@extends('frontend.partials.master')
@section('title', 'Trang chủ')
@section('content')
@include('frontend.partials.slide')
<div class="content-1">
    <div id="box-item1">
        <div class="container">
            <h2 id="tt-news">Nhà thầu thi công</h2>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <div id="item-1">
                    <a href=""><img src="http://cuv.com.vn/admin/img/danhmuc/201805081728112360b47453c188327b1911de8ea02b65.png"></a>
                    <a href=""><h2>Hệ thống thông gió, điều hoà </h2></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <div id="item-1">
                    <a href=""><img src="http://cuv.com.vn/admin/img/danhmuc/201805081632487a06e8b4547ababc3f44311fe7863b6a.png"></a>
                    <a href=""><h2>Hệ thống Cơ Điện</h2></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <div id="item-1">
                    <a href=""><img src="http://cuv.com.vn/admin/img/danhmuc/20180508163307e5b01564847bc01a61c4997844518d7b.png"></a>
                    <a href=""><h2>Hệ thống phòng cháy chữa cháy</h2></a>
                </div>
            </div>
        </div>
    </div>
    <div id="box-item3">
        <h2 id="tt-news">Sản phẩm của chúng tôi</h2>
        <div class="container">
            @foreach($product as $p)
            <div class="col-md-4 col-sm-6 col-xs-12  ">
                <div class="catproduct">
                    <div class="img">
                        <a title="{{ $p->name }}" href="">
                            <img alt="{{ $p->name }}" src="{{ asset($p->image) }}">
                        </a>
                    </div>
                    <div class="clear"></div>
                    <div class="infopr">
                        <center>
                            <a class="name" title="{{ $p->name }}" href="">{{ $p->name }}</a>
                        </center>
                        <p style="color: #0d1fa0;text-align: center;">
                            <a href="{{ route('add-cart', $p->id) }}"><i class="fa fa-cart-plus"></i></a>
                            <strong>Giá : {{ number_format($p->price) }}</strong>
                            {{-- <span style="text-decoration: line-through;">200000</span></p> --}}
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div id="box-item4">
        <h2 id="tt-news2">Phương châm làm việc</h2>
        <div class="container">
            <div style="width:100%;overflow:hidden;">
                <div class="col-xs-4 col-sm-4 col-lg-4" id="itemphuongcham">
                    <div class="main_box21">
                        <a title="">
                            <div class="product-image2">
                                <img class="img-responsive" src="http://cuv.com.vn/images/b1.png" alt="">
                            </div>
                            <p>Giá cả cạnh tranh</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4" id="itemphuongcham">
                    <div class="main_box21">
                        <a>
                            <div class="product-image2">
                                <img class="img-responsive" src="http://cuv.com.vn/images/b2.png" alt="">
                            </div>
                            <p>Đáp ứng tiến độ</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4" id="itemphuongcham">
                    <div class="main_box21">
                        <a>
                            <div class="product-image2">
                                <img class="img-responsive" src="http://cuv.com.vn/images/b3.png" alt="">
                            </div>
                            <p>Chất lượng mong muốn</p>
                        </a>
                    </div>
                </div>
            </div>
            <div id="box0909">
                <h2 id="tt-news2">Tiêu chí sản phẩm</h2>
                <div class="col-xs-4 col-sm-4 col-lg-4" id="itemphuongcham">
                    <div class="main_box21">
                        <a>
                            <div class="product-image2">
                                <img class="img-responsive" src="http://cuv.com.vn/images/b4.png" alt="">
                            </div>
                            <p>Tiết kiệm năng lượng</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4" id="itemphuongcham">
                    <div class="main_box21">
                        <a>
                            <div class="product-image2">
                                <img class="img-responsive" src="http://cuv.com.vn/images/b5.png" alt="">
                            </div>
                            <p>Thân thiện con người</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4" id="itemphuongcham">
                    <div class="main_box21">
                        <a>
                            <div class="product-image2">
                                <img class="img-responsive" src="http://cuv.com.vn/images/b6.png" alt="">
                            </div>
                            <p>Bảo vệ môi trường</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="doitac">
        <div class="container">
            <h2 id="tt-news">Đối tác của chúng tôi</h2>
            <ul id="content-slider3" class="content-slider">
                @foreach($doitac as $d)
                <li>
                    <img src="{{ asset($d->image) }}" alt="imgSlide" title="" id="wows1_0" class="img-responsive img100 " />
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="doitac2" style="margin-bottom: 20px;">
        <div class="container">
            <!-- <h2 id="tt-news">Các sản phẩm hợp tác</h2> -->
            <ul id="content-slider2" class="content-slider">
                @foreach($sp_hoptac as $h)
                <li>
                    <a href=""><img src="{{ asset($h->image) }}" alt="imgSlide"  title=""  id="wows1_0" class="img-responsive img100 "/>
                    </a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
