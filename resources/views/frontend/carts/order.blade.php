@extends('frontend.partials.master')
@section('title', 'Trang chủ')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ul>
                <li class="home"> <a title="Go to Home Page" href="http://www.magikcommerce.com/">Home</a><span>&mdash;›</span></li>
                <li class="category13"><strong>Mua hàng</strong></li>
            </ul>
        </div>
    </div>
</div>
<!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-9 wow">
                <div class="page-title">
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <h2>Mua hàng</h2>
                </div>
                <div class="static-contain">
                    <fieldset class="group-select">
                        <form action="{{ route('postOrder') }}" method="post">
                            {{ csrf_field() }}
                        <ul>
                            <li id="billing-new-address-form">
                                <fieldset>
                                    <input type="hidden" name="billing[address_id]" value="" id="billing:address_id">
                                    <ul>
                                        <li>
                                            <div class="customer-name">
                                                <div class="input-box name-firstname{{ $errors->has('name') ? 'has-error' : '' }}">
                                                    <label for="billing:firstname"> Name<span class="required">*</span>
                                                        @if($errors->has('name'))
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                        @endif
                                                    </label>
                                                    <br>
                                                    <input type="text" name="name" title="First Name" class="input-text ">
                                                </div>
                                                <div class="input-box name-lastname{{ $errors->has('email') ? 'has-error' : '' }}">
                                                    <label for="billing:lastname"> Email <span class="required">*</span>
                                                        @if($errors->has('email'))
                                                        <strong>{{ $errors->first('email') }}</strong></label>
                                                        @endif
                                                    </label>
                                                    <br>
                                                    <input type="email" name="email" value="" title="Last Name" class="input-text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="input-box{{ $errors->has('address') ? 'has-error' : '' }}">
                                                <label for="billing:company">Địa chỉ<span class="required">*</span>
                                                    @if($errors->has('address'))
                                                    <strong>{{ $errors->first('address') }}</strong></label>
                                                    @endif
                                                </label>
                                                <br>
                                                <input type="text" id="billing:company" name="address" value="" title="Company" class="input-text">
                                            </div>
                                            <div class="input-box{{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <label for="billing:email">Điện thoại <span class="required">*</span>
                                                    @if($errors->has('phone'))
                                                    <strong>{{ $errors->first('phone') }}</strong></label>
                                                    @endif
                                                </label>
                                                <br>
                                                <input type="text" name="phone" id="billing:email" value="" title="Email Address" class="input-text validate-email">
                                            </div>
                                        </li>
                                        <li class="{{ $errors->has('note') ? 'has-error' : '' }}">
                                            <label for="comment">Ghi chú<em class="required"></em>
                                                @if($errors->has('note'))
                                                <strong>{{ $errors->first('note') }}</strong></label>
                                                @endif
                                            </label>
                                            <br>
                                            <div style="float:none" class="">
                                                <textarea name="note" id="comment" title="Comment" class="required-entry input-text" cols="5" rows="3"></textarea>
                                            </div>
                                        </li>
                                    </ul>
                                </fieldset>
                            </li>
                            <div class="control-group">
                                <label class="control-label">Chọn phương thức thanh toán</label>
                                <select class="form-control" name="payment">
                                    {{-- @foreach($payment as $p) --}}
                                    <option value="1">Ship</option>
                                    <option value="2">Online</option>
                                    {{-- @endforeach --}}

                                </select>
                            </div>
                            <div class="buttons-set">
                                <button type="submit" title="Submit" class="button submit"> <span>Mua ngay</span> </button>
                            </div>
                        </ul>
                        </form>
                        <br>
                        <br>
                    </fieldset>
                </div>
            </section>
            <aside class="col-right sidebar col-sm-3 wow">
                <div class="block block-company">
                    <div class="block-title">Company </div>
                    <div class="block-content">
                        <ol id="recently-viewed-items">
                            <li class="item odd"><a href="#">About Us</a></li>
                            <li class="item even"><a href="#">Sitemap</a></li>
                            <li class="item  odd"><a href="#">Terms of Service</a></li>
                            <li class="item even"><a href="#">Search Terms</a></li>
                            <li class="item last"><strong>Contact Us</strong></li>
                        </ol>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection