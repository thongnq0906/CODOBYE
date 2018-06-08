@extends('admin.partials.master')
@section('title', 'Thêm người hỗ trợ')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Thêm</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Hỗ trợ</li>
                    <li class="active">Thêm</li>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal" method="POST"
                                    action="{{ route('admin.support.createPost') }}"
                                    enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tên: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Nhập tên" name="name" value="{{ old('name') }}">
                                                    @if($errors->has('name'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('name') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Số điện thoại: </label>
                                                <div class="col-md-8">
                                                        <input type="number" class="form-control"
                                                        placeholder="Nhập số điện thoại" name="phone" value="{{ old('phone') }}">
                                                    @if($errors->has('phone'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('phone') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('zalo') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Zalo: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Nhập zalo" name="zalo" value="{{ old('zalo') }}">
                                                    @if($errors->has('zalo'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('zalo') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('skype') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Skype: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Nhập skype" name="skype" value="{{ old('skype') }}">
                                                    @if($errors->has('skype'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('skype') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('position') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Vị trí: </label>
                                                <div class="col-md-8">
                                                        <input type="number" class="form-control"
                                                        placeholder="Nhập vị trí" name="position" value="{{ old('position') }}">
                                                    @if($errors->has('position'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('position') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Trạng thái: </label>
                                                <label class="switch">
                                                    <input type="checkbox" name="status" value="0">

                                                    <span class="slider round"></span>
                                                    <input type="hidden" name="id" value="1">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
                                                    <a class="btn-default btn"
                                                    href="{{ route('admin.support.create') }}">
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
<!-- Main content -->
</div><!-- /.content-wrapper -->
@endsection
