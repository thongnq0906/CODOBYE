@extends('admin.partials.master')
@section('title', 'Thêm admin')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Thêm admin</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Quản lý admin</li>
                    <li class="active">Thêm</li>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal" method="POST"
                                    action="{{ route('admin.administrator.createPost') }}"
                                    enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tên </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Name" name="name" value="{{ old('name') }}">
                                                    @if($errors->has('name'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('name') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Email </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Name" name="email" value="{{ old('email') }}">
                                                    @if($errors->has('email'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('email') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-md-3 control-label">{{ __('Password') }}</label>
                                                <div class="col-md-8">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-3 control-label">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-8">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                </div>
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
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
                                                    <a class="btn-default btn"
                                                    href="{{ route('admin.administrator.create') }}">
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
