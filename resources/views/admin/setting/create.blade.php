@extends('admin.partials.master')
@section('title', 'Thêm danh mục')
@section('content')
<form role="form" class="form-horizontal" method="POST"
action="{{ route('admin.setting.create') }}"
enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label">Tên danh mục: </label>
            <div class="col-md-8">
                    <input type="text" class="form-control"
                    placeholder="Name" name="name">
                @if($errors->has('name'))
                    <strong>
                        <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                    </strong>
                @endif
            </div>
        </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <button class="btn-success btn">Lưu</button>
            </div>
        </div>
    </div>
</form>

</section>
<!-- Main content -->
</div><!-- /.content-wrapper -->
@endsection
