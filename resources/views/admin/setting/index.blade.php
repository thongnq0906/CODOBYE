@extends('admin.partials.master')
@section('title', 'Cấu hình web')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Cấu hình web</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li class="active">Cấu hình</li>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal" method="get"
                                    action="{{ route('admin.setting.update') }}"
                                    enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tên công ty: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Tên công ty" name="name" value="{{ $product->name }}">
                                                    @if($errors->has('name'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('name') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tiêu đề: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Tiêu đề" name="title" value="{{ $product->title }}">
                                                    @if($errors->has('title'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('title') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Địa chỉ: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Địa chỉ" name="address" value="{{ $product->address }}">
                                                    @if($errors->has('address'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('address') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Điện thoại: </label>
                                                <div class="col-md-8">
                                                        <input type="number" class="form-control"
                                                        placeholder="Điện thoại" name="phone" value="{{ $product->phone }}">
                                                    @if($errors->has('phone'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('phone') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('holine') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Hotline: </label>
                                                <div class="col-md-8">
                                                        <input type="number" class="form-control"
                                                        placeholder="Hotline" name="holine" value="{{ $product->holine }}">
                                                    @if($errors->has('holine'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('holine') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('facebook') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Link facebook: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Link facebook" name="facebook" value="{{ $product->facebook }}">
                                                    @if($errors->has('facebook'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('facebook') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('zalo') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Zalo: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Zalo" name="zalo" value="{{ $product->zalo }}">
                                                    @if($errors->has('zalo'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('zalo') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('contact_info') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Miêu tả: </label>
                                                <div class="col-md-8">
                                                        <textarea class="form-control" placeholder=">Miêu tả"
                                                        name="contact_info" id="contact_info">
                                                            {{ $product->contact_info }}
                                                        </textarea>
                                                    @if($errors->has('contact_info'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('contact_info') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('title_seo') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Title_SEO: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Title SEO"
                                                        name="title_seo" value="{{ $product->title_seo }}">
                                                    @if($errors->has('title_seo'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('title_seo') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('meta_key') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Meta_key: </label>
                                                <div class="col-md-8">
                                                        <textarea type="text" class="form-control" placeholder="Meta_key"
                                                        name="meta_key">{{ $product->meta_key }}</textarea>
                                                    @if($errors->has('meta_key'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('meta_key') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('meta_des') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Meta_des: </label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" placeholder="Meta_Des"
                                                    name="meta_des">{{ $product->meta_des }}</textarea>
                                                    @if($errors->has('meta_des'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('meta_des') }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
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
@section('script')
<script>
    CKEDITOR.replace( 'contact_info', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    } );
</script>
@endsection