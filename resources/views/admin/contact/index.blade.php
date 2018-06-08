@extends('admin.partials.master')
@section('title', 'Quản lý liên hệ')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    <div class="page-heading">
                        <h1>Liên hệ</h1>
                        <div class="options">
                            <div class="btn-toolbar">

                            </div>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <li>Trang chủ</li>
                        <li>Quản lý liên hệ</li>
                    </ol>
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
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Nội dung</th>
                                                    <th>Ngày gửi</th>
                                                    <th>Xử lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($contact as $key => $c)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $c->name }}</td>
                                                    <td>{{ $c->email }}</td>
                                                    <td>{{ $c->phone }}</td>
                                                    <td>{{ $c->title }}</td>
                                                    <td>{{ $c->content }}</td>
                                                    <td>{{ $c->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.contact.destroy', $c->id) }}"
                                                            type="button"
                                                            onclick="return confirm_delete('Bạn có muốn xóa không ?')">
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $contact->links() }}
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