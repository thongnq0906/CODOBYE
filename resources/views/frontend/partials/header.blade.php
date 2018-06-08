<div id="top11">
    <div class="container">
        <form class="navbar-form" id="frmsearch1" action="" method="POST" style="margin-top: 5px;margin-bottom: 5px;">
            <input style="     border-radius: 0;
                width: 66%;
                float: left;    border: none;
                box-shadow: none;
                height: 25px;" type="text" class="form-control" name="txtsearch" placeholder="Search" value=""
                onclick="this.value=''" onblur="if (this.value == '')  {this.value = '';}">
            <div class="input-group-btn">
                <button style="     background: #ffffff;
                    border-radius: 0;
                    font-size: 12px;
                    border: none;
                    color: #17479e;padding: 4px 18px;" class="btn btn-default" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div id="giohang">
            <span><a href=""><img  src="{{ asset('images/vietnam.png') }}"></a><a href="">
                <img  src="{{ asset('images/english.png') }}"></a>
            </span>
        </div>
        <div>
            <a href="{{ route('cart.index') }}">SL: {{ $count }}  Tổng:{{ $total }}</a>
        </div>
    </div>
</div>
<div class="box-search">
    <a href="{{ route('index') }}">
        <?php
            $banner = DB::table('banners')->where('status', 1)->first();
        ?>
        @if(isset($banner))
            <img src="{{ asset($banner->image) }}" border="0" alt>
        @endif
    </a>
</div>
<div id="menutop1">
    <div class="container " id="" style="">
        <div class="navbar" style="">
            <div id="smoothmenu3" class="ddsmoothmenu3">
                <ul>
                    <li style="border-left:none;">
                        <a href="{{ route('index') }}"><span><i class="fas fa-home"></i></span> Trang chủ</a></li>
                    <li style=" "><a href="{{ route('intro') }}">Giới thiệu</a></li>
                    <li style=" "><a href="{{ route('cate_product_lv1') }}">Sản phẩm</a>
                        <?php
                            $level_1 = DB::table('cate_products')->where([['status', 1], ['parent_id', 0]])
                                ->orderBy('position', 'ASC')->get();
                        ?>
                        <ul id="box098">
                            @foreach($level_1 as $l)
                                <li>
                                    <ul>
                                        <div id="row-right"><a href="{{ route('product', $l->id) }}" class="sf-with-ul">{{ $l->name }}</a>
                                            <?php
                                                $level_2 = DB::table('cate_products')->where('status', 1)
                                                    ->where('parent_id', $l->id)->orderBy('position', 'ASC')->get();
                                            ?>
                                            @foreach($level_2 as $v)
                                                <li>
                                                    <a href="{{ route('product', $v->id) }}" class="sf-with-ul">{{ $v->name }}</a>
                                                </li>
                                            @endforeach
                                        </div>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <?php
                        $lv1 = DB::table('cate_posts')->where([['status', 1], ['parent_id', 0]])->orderBy('position', 'ASC')->get();
                    ?>
                    @foreach($lv1 as $l)
                        <li><a href="{{ route('list_post', $l->id) }}" class="sf-with-ul">{{ $l->name }}</a>
                            <ul>
                                <?php
                                    $lv2 = DB::table('cate_posts')->where('status', 1)->where('parent_id', $l->id)->orderBy('position', 'ASC')->get();
                                ?>
                                @foreach ($lv2 as $v)
                                    <li><a href="{{ route('list_post', $v->id) }}" class="sf-with-ul">{{ $v->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <li style="border-right:none;"><a href="{{ route('contact') }}"> Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-display" style="display: none;">
            <i class="fa fa-bars" onclick="displaymenu();"></i>
            <div class="clear-main"></div>
            <input type="text" style="width: 0; height: 0; display: none;" id="input_tem" value="0" />
            <div class="menu-respon">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <p><a class="accordion-toggle" href="">Trang chủ</a></p>
                            @foreach($level_1 as $l)
                                <p><a class="accordion-toggle" href="">{{ $l->name }}</a></p>
                            @endforeach
                            <p><a class="accordion-toggle" href="">Tin tức</a></p>
                            <p> <a class="accordion-toggle" href="{{ route('contact') }}">Liên hệ</a></p>
                        </div>
                        <div id="collapse" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="menu-cap2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end accordion-group-->
                </div>
            </div>
            <!--end menu-respon-->
        </div>
    </div>
</div>
