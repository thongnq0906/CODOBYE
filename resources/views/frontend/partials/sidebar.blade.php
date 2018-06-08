<div class="container">
    <div class="col-xs-12 col-sm-3 col-lg-3" style="padding: 0; padding-right: 15px;padding-top: 19px;">
        <div id="sidebar-left" style="margin-left:5px;">
            <div class="menu" style="border:1px solid #e5e5e5;margin-bottom:20px;">
                <div id="smoothmenu4" class="markermenu">
                    <ul>
                        <div id="tieude"><label>DANH MỤC SẢN PHẨM</label></div>
                        @foreach($cate_lv1 as $c)
                        <li><a href="{{ route('product', $c->id) }}">{{ $c->name }}</a>
                            <ul>
                                <?php
                                    $cate_lv2 = DB::table('cate_products')->where('status', 1)->where('parent_id', $c->id)->orderBy('position', 'ASC')->get();
                                ?>
                                @foreach($cate_lv2 as $v)
                                <li><a href="{{ route('product', $v->id) }}" title="{{ $v->name }}">{{ $v->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="menu support_col " style="border:1px solid #e5e5e5;margin-bottom:30px;    padding-bottom: 13px;">

                <div id="tieude"><label>HỖ TRỢ TRỰC TUYẾN</label></div>
                <div class="clearfix"></div>
                    @foreach($support_sidebar as $p)
                    <div class="chat">
                        <div class="ymgyahoo2">
                            <p class="name">{{ $p->name }}</p>
                            <div class="skype">
                                <a href="mailto:{{ $p->email }}">
                                    <img style="    width: 32px;" class="mail" src="{{ asset('images/mail.png') }}">
                                </a>
                                <a href="skype:?chat">
                                    <img class="skype" src="{{ asset('images/img_sky.gif') }}" align="absmiddle"></a>
                                </div>
                                <p class="phone text-left">{{ $p->phone }}</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    @endforeach
                        <div class="clearfix"></div>
                    </div>
                    <div class="menu news-col-left" style="border:1px solid #e5e5e5;margin-bottom:30px;padding-bottom:15px;">
                        <div id="tieude"><label>DỊCH VỤ</label></div>
                        @foreach($post_sidebar as $p)
                        <div class="row" style="     margin-top: 10px;
                        margin-left: 5px;margin-right: 0px;">
                        <div class="main_box1" ><a href="" title="">
                            <img class="img-responsive" style="width:100px;float:left;padding-right:6px;" src="{{ asset($p->image) }}" alt="">
                            <p>{{ $p->name }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="menu news-col-left" style="border:1px solid #e5e5e5;margin-bottom:30px;padding-bottom:15px;">
                    <div id="tieude"><label>TIN TỨC</label></div>
                    @foreach($post_sidebar as $p)
                    <div class="row" style="     margin-top: 10px; margin-right: 0px;
                    margin-left: 5px;">
                    <div class="main_box1" >
                        <a href=" title="">
                            <img class="img-responsive" style="width:100px;float:left;padding-right:6px;" src="{{ asset($p->image) }}" alt="">
                            <p  >{{ $p->name }}</p>
                        </a>
                    </div>
                </div>

                @endforeach
        </div>
        <div id="fb-root"></div>

        <div class="fb-page" data-href=""  data-width="320px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="">
                    <a href=""> </a>
                </blockquote>
            </div>
        </div>

        <div class="menu" style="border:1px solid #e5e5e5;margin-bottom:30px;padding-bottom:15px;">
            {{-- <div id="tieude"><label>THỐNG KÊ TRUY CẬP</label>
            </div>
            <div style="text-align:left;color:#333;padding-left: 3px;
            font-size: 12px;padding-top:10px;
            padding-bottom: 4px;">
                <p><img style="  padding-right: 10px;" src="http://cuv.com.vn/images/icon-online.png"> Đang online :
                <span>8</span></p>

                <p><img style="  padding-right: 5px;" src="http://cuv.com.vn/images/icon2.png"> Hôm nay :
                    <span>105</span></p>
                <p><img style="  padding-right: 11px;" src="http://cuv.com.vn/images/icon_total.png"> Tổng số lượt truy cập :
                    <span>15083</span></p>
            </div> --}}
        </div>
    </div>
</div>