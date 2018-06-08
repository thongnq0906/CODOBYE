@extends('frontend.partials.master')
@section('title', 'Trang chủ')
@section('content')
@include('frontend.partials.sidebar')
<div class="col-xs-12 col-sm-9 col-lg-9" style="padding:0;">
    <div class="row">
        <div class="container get-product" style="padding:0;">
            <div class="r-content">
                <div class="col-xs-12 col-sm-12 col-lg-9" style="    padding-right: 0;">
                    <h2 id="r-tieude1">{{ $cate_post->name }}</h2>
                    @foreach($post as $p)
                    <div class="row" style="margin-top:10px;">
                        <div class="col-xs-12 col-sm-3 col-lg-3">
                            <a href="{{ route('detail', $p->id) }}" title="{{ $p->name }}">
                                <img style="width: 100%;" src="{{ asset($p->image) }}" alt="">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-lg-9">
                            <a href="{{ route('detail', $p->id) }}" title="{{ $p->name }}">
                                <h4>{{ $p->name }}</h4>
                            </a>
                            <p><span style="font-size: 14px;"><strong>{{ $p->title }}</strong></span><br /></p>
                            <p>
                                <a id="xemthem" href="{{ route('detail', $p->id) }}" title="{{ $p->name }}">Xem chi tiết</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection