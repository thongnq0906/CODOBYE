@extends('admin.partials.master')
@section('title', 'Quản lý sản phẩm')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Sản phẩm</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý sản phẩm</li>
            <li class="active">Sản phẩm</li>
        </ol>
    </section>
    <section class="content-header">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="search">
                        <form class="" method="get" enctype="multipart/form-data" action="{{ route('admin.product.search') }}">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                                    <i class=" fa fa-fw fa-plus"></i>
                                    Thêm mới
                                </a>
                                </div>
                                <div class="col-md-3">
                                    <select name="cate_product" class="form-control" id="target">
                                        <option value="0">Tất cả danh mục</option>
                                        <?php  menu($data);?>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn-primary btn">Tìm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="box">
                                    <div class="box-body">
                                        <form method="post" action="{{ route('checkbox') }}">
                                            {{ csrf_field() }}
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkall" name="checkall" /></th>
                                                        <th>STT</th>
                                                        <th>Ảnh</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Giá</th>
                                                        <th>Danh mục</th>
                                                        <th>Giới thiệu</th>
                                                        <th>Sản phẩm trang chủ</th>
                                                        <th>Trạng thái</th>
                                                        <th>Cập nhật</th>
                                                        <th>Xử lý</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($product as $key => $c)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="checkbox[]" class="checkbox"
                                                            value="{{ $c->id }}">
                                                        </td>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>
                                                            <img src="{{ asset($c->image) }}"
                                                            style="height: 60px; width: 60px;">
                                                        </td>
                                                        <td>{{ $c->name }}</td>
                                                        <td>{{ $c->price }}</td>
                                                        <td>{{ $c->Cate_product->name }}</td>
                                                        <td>{{ $c->title }}</td>
                                                        <td>
                                                            @if($c->is_home == 1)
                                                                <a href="{{ route('product.is_home.close' ,$c->id) }}"
                                                                    class="label label-success" title="Ẩn">Có</a>
                                                            @else
                                                                <a href="{{ route('product.is_home.open' ,$c->id) }}"
                                                                    class="label label-danger" title="Hiện">Không</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($c->status == 1)
                                                                <a href="{{ route('product.status.close' ,$c->id) }}"
                                                                    class="label label-success" title="Ẩn">Hiện</a>
                                                            @else
                                                                <a href="{{ route('product.status.open' ,$c->id) }}"
                                                                    class="label label-danger" title="Hiện">Ẩn</a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $c->updated_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.product.update', $c->slug)}}">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a href="{{ route('admin.product.destroy', $c->id) }}"
                                                                type="button"
                                                                onclick="return confirm_delete('Bạn có muốn xóa không ?')">
                                                                <i class="fa fa-times-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkall" name="checkall" /></th>
                                                        <th>STT</th>
                                                        <th>Ảnh</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Giá</th>
                                                        <th>Danh mục</th>
                                                        <th>Giới thiệu</th>
                                                        <th>Sản phẩm trang chủ</th>
                                                        <th>Trạng thái</th>
                                                        <th>Cập nhật</th>
                                                        <th>Xử lý</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <select class="" name="select_action">
                                                <option value="0">Lựa chọn</option>
                                                <option value="1">Xóa</option>
                                                <option value="2">Hiện</option>
                                                <option value="3">Ẩn</option>
                                            </select>
                                            <button id="delete_all" class="btn-success">Thực hiện</button>
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
@section('script')
{{-- <script type="text/javascript">
    $( "#target" ).on('change', function(e) {
        $value = $(this).val();
        $.ajax({
            type : 'get',
            url : '{{ URL::to('admin/product/search')}}',
            data : {'search':$value},
            success:function(data){
                $('tbody').html(data);
            }
        });
    });
</script> --}}
<script type="text/javascript">
    $(function () {
        $("#example2").DataTable();
    });
</script>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".checkall").change(function(){
            var checked = $(this).is(':checked');
            if(checked){
                $(".checkbox").each(function(){
                    $(this).prop("checked",true);
                });
            }else{
                $(".checkbox").each(function(){
                    $(this).prop("checked",false);
                });
            }
        });

        $(".checkbox").click(function(){
            if($(".checkbox").length == $(".checkbox:checked").length) {
                $(".checkall").prop("checked", true);
            } else {
                $(".checkall").removeAttr("checked");
            }
        });
    });
</script>
@endsection
