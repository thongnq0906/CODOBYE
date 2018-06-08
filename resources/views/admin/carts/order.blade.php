@extends('admin.partials.master')
@section('title', 'Quản lý đơn hàng')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Quản lý đơn hàng</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý đơn hàng</li>
            <li class="active">Đơn hàng</li>
        </ol>
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
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="options">
                                        </div>
                                    </div>
                                    <div class="panel-body" style="overflow-x:auto;">
                                        <form method="post" action="{{ route('admin.cart.checkbox') }}">
                                            {{ csrf_field() }}
                                            <table id="datatable_order" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkall" name="checkall" /></th>
                                                        <th>STT</th>
                                                        <th>Ngày đặt</th>
                                                        <th>Tên</th>
                                                        <th>Thanh toán</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Ghi chú</th>
                                                        <th>Trạng thái</th>
                                                        <th>Xử lý</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order as $key => $c)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="checkbox[]" class="checkbox" value="{{ $c->id }}">
                                                        </td>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $c->created_at }}</td>
                                                        <td>{{ $c->name }}</td>
                                                        <td>
                                                            @if($c->payment == 1)
                                                            Ship
                                                            @else
                                                            Online
                                                            @endif
                                                        </td>
                                                        <td>{{ $c->total }}</td>
                                                        <td>{{ $c->note }}</td>
                                                        <td>
                                                            @if($c->status == 1)
                                                            Chờ xử lý
                                                            @elseif($c->status == 2)
                                                            Đang xử lý
                                                            @elseif($c->status == 3)
                                                            Hoàn thành
                                                            @else
                                                            Hủy
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.bill', $c->id)}}">
                                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                            </a>
                                                            <a href="{{ route('admin.destroyOrder', $c->id) }}"
                                                                type="button"
                                                                onclick="return confirm_delete('Bạn có muốn xóa không ?')">
                                                                <i class="fa fa-times-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th><input type="checkbox" class="checkall" name="checkall" /></th>
                                                    <th>STT</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Tên</th>
                                                    <th>Thanh toán</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Ghi chú</th>
                                                    <th>Trạng thái</th>
                                                    <th>Xử lý</th>
                                                </tfoot>
                                            </table>
                                            <select class="" name="select_action">
                                                <option value="0">Lựa chọn</option>
                                                <option value="1">Xóa</option>
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
<script type="text/javascript">
    $(document).ready(function() {
    $('#datatable_order').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
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