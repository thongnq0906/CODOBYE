@extends('admin.partials.master')
@section('title', 'Thêm')
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
                    <li>Giới thiệu</li>
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
                                    action="{{ route('admin.intro.createPost') }}"
                                    enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Tiêu đề: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                        placeholder="Nhập tiêu đề" name="name" value="{{ old('name') }}">
                                                    @if($errors->has('name'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('name') }}
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
                                            <div class="form-group{{ $errors->has('description') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Nội dung: </label>
                                                <div class="col-md-8">

                                                        <textarea name="description" class="form-control "
                                                        id="editor1">
                                                            {{ old('description') }}
                                                        </textarea>
                                                    @if($errors->has('description'))
                                                        <strong>
                                                            <span class="help-block">
                                                                {{ $errors->first('description') }}
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
                                            <div class="form-group{{ $errors->has('title_seo') ? 'has-error' : '' }}">
                                                <label class="col-md-3 control-label">Title_SEO: </label>
                                                <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Title SEO"
                                                        name="title_seo" value="{{ old('title_seo') }}">
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
                                                        <textarea class="form-control" placeholder="Meta_key"
                                                        name="meta_key" value="{{ old('meta_key') }}"></textarea>
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
                                                <label class="col-md-3 control-label">Meta_Des: </label>
                                                <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Meta_Des"
                                                        name="meta_des" value="{{ old('meta_des') }}"></textarea>
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
                                                    <a class="btn-default btn"
                                                    href="{{ route('admin.intro.create') }}">
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
@section('script')
<script>
    CKEDITOR.replace( 'editor1', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
} );
</script>
<script>
    CKEDITOR.replace( 'editor2',{
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
} );
</script>
@endsection
