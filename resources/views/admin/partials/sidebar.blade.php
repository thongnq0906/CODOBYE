<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/avatar5.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p style="text-transform: capitalize;">{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <a href="{{ route('index') }}"> Xem trang chủ</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i> <span>Trang chủ</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/cate_product*','admin/product*') ? 'active' : '' }} treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Quản lý sản phẩm</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/cate_product*') ? 'active' : '' }}">
                        <a href="{{ route('admin.cate_product.home') }}"><i class="fa fa-circle-o"></i> Danh mục</a>
                    </li>
                    <li class="{{ Request::is('admin/product*') ? 'active' : '' }}">
                        <a href="{{ route('admin.product.index') }}"><i class="fa fa-circle-o"></i> Sản phẩm</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/cate_post*','admin/post*') ? 'active' : '' }} treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Quản lý tin</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/cate_post*') ? 'active' : '' }}">
                        <a href="{{ route('admin.cate_post.home') }}"><i class="fa fa-circle-o"></i> Danh mục</a>
                    </li>
                    <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
                        <a href="{{ route('admin.post.index') }}"><i class="fa fa-circle-o"></i> Bài viết</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/banner*') ? 'active' : '' }}">
                <a href="{{ route('admin.banner.index') }}">
                    <i class="fa fa-file-image-o"></i> <span>Quản lý banner</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/intro*') ? 'active' : '' }}">
                <a href="{{ route('admin.intro.index') }}">
                    <i class="fa fa-file-text"></i> <span>Quản lý giới thiệu</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/support*') ? 'active' : '' }}">
                <a href="{{ route('admin.support.index') }}">
                    <i class="glyphicon glyphicon-briefcase"></i> <span>Quản lý hỗ trợ</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/banner*') ? 'active' : '' }}">
                <a href="{{ route('admin.banner.index') }}">
                    <i class="fa fa-file-image-o"></i> <span>Quản lý banner</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact*') ? 'active' : '' }}">
                <a href="{{ route('admin.contact.index') }}">
                    <i class="glyphicon glyphicon-envelope"></i> <span>Quản lý contact</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/administrator*') ? 'active' : '' }}">
                <a href="{{ route('admin.administrator.home') }}">
                    <i class="glyphicon glyphicon-user"></i> <span>Quản lý administrator</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/cart*') ? 'active' : '' }}">
                <a href="{{ route('admin.order') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}">
                <a href="{{ route('admin.setting') }}">
                    <i class="glyphicon glyphicon-wrench"></i> <span>Cấu hình</span>
                </a>
            </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
</aside>
