@extends('admin.partials.master')
@section('title', 'Quản lý admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Admin</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý Admin</li>
            <li class="active">Danh mục</li>
        </ol>
        <a href="{{ route('admin.administrator.create') }}" class="btn btn-primary">
            <i class=" fa fa-fw fa-plus"></i>
            Thêm mới
        </a>
    </section>
	<section class="content-header">
	  	<div class="static-content-wrapper">
		    <div class="static-content">
		        <div class="page-content">
		            @if(Session::has('success'))
		                <div class="alert alert-success">{{ Session::get('success') }}</div>
		            @endif
		            <div class="container-fluid">
		                <div class="row">
		                    <div class="col-xs-12 col-sm-12 col-lg-12">
		                        <div class="box">
                                    <div class="box-header">
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
		                                <table id="example1" class="table table-bordered table-striped">
		                                    <thead>
		                                        <tr>
		                                            <th>STT</th>
                                                    <th>Tên</th>
		                                            <th>Email</th>
		                                            <th>Cập nhật</th>
		                                            <th>Xử lý</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        @foreach($administrator as $key => $c)
		                                        <tr>
		                                            <td>{{ $key + 1 }}</td>
                                                    <td>{{ $c->name }}</td>
		                                            <td>{{ $c->email }}</td>
		                                            <td>{{ $c->updated_at }}</td>
		                                            <td>
                                                        <a href="{{ route('admin.administrator.update', $c->id)}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
		                                                <a href="{{ route('admin.administrator.destroy', $c->id) }}"
                                                            type="button"
		                                                	onclick="return confirm_delete('Bạn có muốn xóa không ?')">
		                                                    <i class="fa fa-times-circle"></i>
		                                                </a>
		                                            </td>
		                                        </tr>
		                                        @endforeach
		                                    </tbody>
		                                </table>
                                        </div>
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
{{-- @section('script')
<script type="text/javascript">
        $(function () {
            $("#example1").DataTable();
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false
            // });
        });
    </script>
@endsection --}}