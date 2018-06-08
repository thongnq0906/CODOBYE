@extends('frontend.partials.master')
@section('title', 'Giới thiệu')
@section('content')
@include('frontend.partials.sidebar')
<div class="col-xs-12 col-sm-9 col-lg-9" style="padding:0;">
    <div class="row">
        <div class="container get-product" style="padding:0;">
            <div class="r-content">
                <div class="col-xs-12 col-sm-12 col-lg-9" style="    padding-right: 0;">
                    <h2 id="r-tieude1">Giới thiệu</h2>
                    <?php
                        if(isset($intro))
                        {
                            echo(html_entity_decode($intro->description));
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection