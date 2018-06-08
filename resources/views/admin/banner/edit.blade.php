@extends('admin.partials.master')
@section('title', 'Sửa banner')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Sửa banner</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-plus"></i>Thêm mới</a>
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Quản lý banner</li>
                    <li>Bannrt</li>
                    <li class="active">Sửa</li>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal" method="POST"
                                        action="{{ route('admin.banner.postUpdate', $banner->id) }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tên: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Name"
                                                        name="name" value="{{ $banner->name }}">
                                                    @if($errors->has('name'))
                                                        <strong>
                                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Banner: </label>
                                                <div class="col-md-8">
                                                        <input type="file" class="form-control" name="image"
                                                        value="{{ $banner->image }}">
                                                    @if($errors->has('image'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('image') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-8">
                                                    <img src="{{asset($banner->image)}}" style="max-width: 30%;"/>
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;margin-bottom: 20px;">
                                                <label class="col-md-3 control-label">Trạng thái: </label>
                                                <label class="switch">
                                                    <input type="checkbox" name="status"
                                                    value="0" {{($banner->status)?'checked':''}}>

                                                    <span class="slider round"></span>
                                                    <input type="hidden" name="id" value="1">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
                                                    <a class="btn-default btn" href="{{ route('admin.banner.index') }}">
                                                        Hủy
                                                    </a>
                                                    <a class="btn-default btn" href='javascript:goback()'>Quay lại</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div><!-- /.content-wrapper -->
@endsection
