@extends('frontend.partials.master')
@section('title', 'Trang chủ')
@section('content')
@include('frontend.partials.sidebar')
<div class="col-xs-12 col-sm-9 col-lg-9" style="padding:0;">
    <div class="r-content">
        <h2 id="r-tieude1">Sản phẩm</h2>
        <div class="row">
            @foreach($product as $c)
            <div class="col-md-4 col-sm-6 col-xs-12  ">
                <div class="catproduct">
                    <div class="img">
                        <a title="{{ $c->name }}" href="{{ route('detail_product', $c->id) }}">
                            <img alt="{{ $c->name }}" src="{{ asset($c->image) }}">
                        </a>
                    </div>
                    <div class="clear"></div>
                    <div class="infopr">
                        <center><a class="name" title="{{ $c->name }}" href="{{ route('detail_product', $c->id) }}">{{ $c->name }}</a></center>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <style type="text/css">#slide{display: none;}</style>
</div>
@endsection
