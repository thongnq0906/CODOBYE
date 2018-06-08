@extends('admin.partials.master')
@section('title', 'Quản lý Hóa đơn')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Quản lý Hóa đơn</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý Hóa đơn</li>
            <li class="active">Hóa đơn</li>
        </ol>
    </section>
    <div class="container">
        <div class="row" style="border-bottom: 2px #eeeeee solid; margin-bottom: 30px; padding-left: 20px;">
            <div class="col-md-6">
                <div class="card" style="background-color: #eeeeee;">
                    <div class="card-content">
                        <h4 style="border-bottom: 1px solid white; padding-bottom: 5px;">Đơn hàng</h4>
                        <p><strong>ID Đơn hàng : </strong>#DH2</p>
                        <p><strong>Ngày đặt hàng :</strong> {{ $order->created_at }}</p>
                        <p><strong>Tổng tiền :</strong> {{ $order->total }} $</p>
                        <p><strong>Phương thức thanh toán :</strong>
                            @if($order->payment == 1)
                            Ship
                            @else
                            Online
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="background-color: #eeeeee;">
                    <div class="card-content">
                        <h4 style="border-bottom: 1px solid white; padding-bottom: 5px;">Khách hàng</h4>
                        <p><strong>Tên khách hàng :</strong> {{ $order->name }}</p>
                        <p><strong>Địa chỉ giao hàng và thanh toán :</strong> {{ $order->address }}</p>
                        <P><strong>Số điện thoại :</strong> {{ $order->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.postStatus', $order->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group col-md-4">
                    <div class="row">
                        <div class="col-md-7">
                            <select class="form-control" name="status">
                                <option {{ $order->status == 1? 'selected' : '' }} value="1">Chờ xử lý</option>
                                <option {{ $order->status == 2? 'selected' : '' }} value="2">Đang xử lý</option>
                                <option {{ $order->status == 3? 'selected' : '' }} value="3">Hoàn thành</option>
                                <option {{ $order->status == 4? 'selected' : '' }} value="4">Hủy</option>
                            </select>
                        </div>
                        <div class="col-md-2"><button class="btn btn-primary">Lưu</button></div>
                    </div>
                </div>
            </form>
        </div>
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
                                        <table id="datatable_bill" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Ảnh</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bill as $key => $c)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset($c->Product->image) }}" alt="" style="width: 80px; height: 60px;">
                                                    </td>
                                                    <td>{{ $c->Product->name }}</td>
                                                    <td>{{ $c->quantity }}</td>
                                                    <td>{{ $c->price }}</td>
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
    </section>
</div><!-- /.content-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $("#datatable_bill").DataTable();
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