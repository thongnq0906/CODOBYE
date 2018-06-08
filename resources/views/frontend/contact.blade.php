@extends('frontend.partials.master')
@section('title', 'Intro')
@section('content')
<div class="col-xs-12 col-sm-9 col-lg-9" style="padding:0;">
    <div class="box-content" >
        <div class="container">
            <br/>
            <div class="col-sm-6 col-xs-6">
                <div id="contact" class="spacer">
                    <!--Contact Starts-->
                    <div class="contactform center">
                        <h2 class="text-center  wowload fadeInUp animated" style="visibility: visible;  text-transform: uppercase;">
                        </h2>
                        <p style="text-align:center;">Gửi liên hệ để nhận được sự hỗ trợ tốt nhất</p>
                        <div class="row wowload fadeInLeftBig animated" style="visibility: visible;">
                            <div class="col-sm-12 col-xs-12">
                                <form class="form-group" STYLE="  MARGIN-TOP: 34PX;" id="myform" name="contactForm" onsubmit="return validateForm();" method="post" action="{{ route('post_contact') }}">
                                    {{ csrf_field() }}
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Họ tên">
                                    <input class="form-control" name="address" id="address" type="text" placeholder="Địa chỉ">
                                    <input class="form-control" name="phone" id="phone" type="number" placeholder="Địện thoại">
                                    <input class="form-control" name="email" id="email" type="text" placeholder="Email">
                                    <input class="form-control" name="title" id="title" type="text" placeholder="Tiêu đề">
                                    <textarea class="form-control" name="content" id="content" rows="5" placeholder="Nội dung"></textarea>
                                    <p style="text-align:center;">
                                        <button class="btn btn-danger" type="submit" value="Gửi mail" name="save"><i class="fa fa-paper-plane"></i> Gửi email</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <span style="font-size:12px;">Hà Nội:&nbsp; Phòng 0311-C1, Mandarin Garden, đường Hoàng Minh Giám, Q. Cầu Giấy, Hà Nội<br style="font-size: 14px;" />
                    Đà Nẵng: Số 8 Bùi Vịnh, P. Hòa Thọ Đông, Q. Cẩm Lệ, TP. Đà Nẵng<br style="font-size: 14px;" />
                    Sài Gòn: Số 19, đường 15, khu số 5, P. Hiệp Bình Chánh, Q. Thủ Đức, TP. HCM<br style="font-size: 14px;" />
                    Hotline: 0932.511.666<br style="font-size: 14px;" />
                    Email: Supply@Cuv.com.vn<br />
                Website: Cuv.com.vn</span>
            </div>
        </div>
    </div>
</div>
            @endsection
@section('script')
    <script type="text/javascript">
            $(function(){
                $("#myform").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength:8
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            number: true,
                            minlength: 7,
                            maxlength: 15
                        },
                        address: {
                            required: true,
                            minlength:5
                        }
                    },
                    messages: {
                        name: {
                            required: " <span style='color:#FF0000; '>Xin vui lòng nhập họ tên của bạn!</span><br />",
                            minlength: " <span style='color:#FF0000; '>Họ tên bao gồm ít nhất 8 kí tự!</span><br />"
                        },
                        phone: {
                            required: " <span style='color:#FF0000; '>Xin vui lòng nhập số điện thoại!</span><br />",
                            number: "<span style='color:#FF0000; '>Số điện thoại chỉ bao gồm các số từ 0 - 9!</span><br />",
                            minlength: "<span style='color:#FF0000; '>Số điện thoại ít nhất 7 ký tự!</span><br />",
                            maxlength: "<span style='color:#FF0000; '>Số điện thoại lớn nhất 15 ký tự!</span><br />"
                        },
                        email: {
                            required: " <span style='color:#FF0000;'>Xin vui lòng nhập email!</span><br />",
                            minlength: " <span style='color:#FF0000;'>Họ tên bao gồm ít nhất 8 kí tự!</span><br />"
                        },
                        address: {
                            required: " <span style='color:#FF0000;'>Xin vui lòng nhập tên công ty của bạn!</span><br />",
                            minlength: " <span style='color:#FF0000;'>Địa chỉ bao gồm ít nhất 5 kí tự!</span><br />"
                        }
                    }
                });
            })
        </script>
@endsection