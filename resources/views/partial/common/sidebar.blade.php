<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
            <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
            @if(Auth::user()->type == App\Model\Common\User::SUPER_ADMIN)
            <a href="#" class="d-block" style="color: #fd7e14">Xin chào: {{ Auth::user()->account_name }}</a>
            @else
            <a href="#" class="d-block" style="color: #fd7e14">{{ App\Model\Common\User::find(Auth::user()->id)->name }}</a>
            @endif
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Trang chủ
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{route('category_special.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-stream"></i>
                    <p>
                        Danh mục đặc biệt
                    </p>
                </a>
            </li>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item has-treeview
                    {{ Request::is('colors*') || Request::is('sizes*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link
                        {{ Request::is('colors*') || Request::is('sizes*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Quản lý thuộc tính
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- Danh sách màu sắc --}}
                        <li class="nav-item">
                            <a href="{{ route('colors.index') }}"
                               class="nav-link {{ Request::routeIs('colors.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Danh sách màu sắc</p>
                            </a>
                        </li>
                        {{-- Danh sách loại size --}}
                        <li class="nav-item">
                            <a href="{{ route('sizes.index') }}"
                               class="nav-link {{ Request::routeIs('sizes.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Danh sách loại size</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <li class="nav-item has-treeview  {{ request()->is('common/products') || request()->is('uptek/products*') || request()->is('admin/categories') || request()->is('admin/categories*') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-dropbox"></i>
                    <p>
                        Quản lý hàng hóa
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('Category.index') }}" class="nav-link {{ Request::routeIs('Category.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Category.create') }}" class="nav-link {{ Request::routeIs('Category.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Product.index') }}" class="nav-link {{ Request::routeIs('Product.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách hàng hóa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Product.create') }}" class="nav-link {{ Request::routeIs('Product.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới hàng hóa</p>
                        </a>
                    </li>
                </ul>
            </li>



            {{-- <li class="nav-item has-treeview">
                <a href="{{route('vouchers.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-tag"></i>
                    <p>
                        Danh mục mã giảm giá
                    </p>
                </a>
            </li> --}}

{{--            <li class="nav-item has-treeview  {{ request()->is('admin/posts') || request()->is('admin/posts/*') || request()->is('admin/post-categories') || request()->is('admin/post-categories/*') ? 'menu-open' : '' }} ">--}}

{{--                <a href="#" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-newspaper"></i>--}}
{{--                    <p>--}}
{{--                        Bài viết--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('PostCategory.index') }}" class="nav-link {{ Request::routeIs('PostCategory.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục bài viết</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('PostCategory.create') }}" class="nav-link {{ Request::routeIs('PostCategory.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Thêm mới danh mục</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('Post.index') }}" class="nav-link {{ Request::routeIs('Post.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh sách bài viết</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('Post.create') }}" class="nav-link {{ Request::routeIs('Post.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Thêm mới bài viết</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="nav-item has-treeview  {{ request()->is('admin/stores') ||  request()->is('admin/banners') ||  request()->is('admin/origins') || request()->is('admin/manufacturers/*') || request()->is('admin/attributes') ? 'menu-open' : '' }} ">--}}

{{--                <a href="#" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-newspaper"></i>--}}
{{--                    <p>--}}
{{--                        Danh mục khác--}}
{{--                        <i class="fas fa-angle-left right"></i>--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('origins.index') }}" class="nav-link {{ Request::routeIs('origins.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục xuất xứ</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('manufacturers.index') }}" class="nav-link {{ Request::routeIs('manufacturers.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục hãng sản xuất</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    --}}{{-- <li class="nav-item">--}}
{{--                        <a href="{{ route('Project.index') }}" class="nav-link {{ Request::routeIs('Project.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục dự án</p>--}}
{{--                        </a>--}}
{{--                    </li> --}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('partners.index') }}" class="nav-link {{ Request::routeIs('partners.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Quản lý đối tác</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item ">--}}
{{--                        <a href="{{ route('Review.index') }}" class="nav-link {{ Request::routeIs('Review.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>--}}
{{--                                Quản lý review--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('banners.index') }}" class="nav-link {{ Request::routeIs('banners.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục banner trang chủ</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('stores.index') }}" class="nav-link {{ Request::routeIs('stores.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục đơn vị thành viên</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('consultants.index') }}" class="nav-link {{ Request::routeIs('consultants.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục nhân viên liên hệ</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('contacts.index') }}" class="nav-link {{ Request::routeIs('contacts.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục khách hàng liên hệ</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('recruitments.index') }}" class="nav-link {{ Request::routeIs('recruitments.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục tin tuyển dụng</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('apply-recruitments.index') }}" class="nav-link {{ Request::routeIs('apply-recruitments.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Danh mục đơn ứng tuyển</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

             <li class="nav-item has-treeview">
                <a href="{{route('orders.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-file-invoice-dollar"></i>

                    <p>
                        Quản lý đơn hàng
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('admin/abouts') || request()->is('admin/abouts/*') || request()->is('admin/abouts') || request()->is('admin/abouts/*') ? 'menu-open' : '' }} ">

                <a href="{{route('abouts.edit', [1])}}" class="nav-link">
                    <i class="nav-icon fas fa-info"></i>
                    <p>
                        Về chúng tôi
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('contacts.index') }}" class="nav-link {{ Request::routeIs('contacts.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>Danh mục khách hàng liên hệ</p>
                </a>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('admin/topic') || request()->is('admin/topic/*') || request()->is('admin/topic') || request()->is('admin/topic/*') ? 'menu-open' : '' }} ">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-question"></i>
                    <p>
                        FAQs
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('topics.index') }}" class="nav-link {{ Request::routeIs('topics.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chủ đề câu hỏi</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('questions.index') }}" class="nav-link {{ Request::routeIs('questions.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách câu hỏi</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{--            <li class="nav-item has-treeview">--}}
{{--                <a href="{{route('design_orders.index')}}" class="nav-link">--}}
{{--                    <i class="nav-icon fa fa-file-invoice-dollar"></i>--}}

{{--                    <p>--}}
{{--                        Quản lý đơn thiết kế--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}

            {{-- <li class="nav-item has-treeview  {{ request()->is('admin/blocks') || request()->is('admin/blocks/*') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                        Khối nội dung HTML
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('Block.index') }}" class="nav-link {{ Request::routeIs('Block.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách</p>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{ route('Block.create') }}" class="nav-link {{ Request::routeIs('Block.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới</p>
                        </a>
                    </li> --}}


                    {{-- <li class="nav-item">
                        <a href="{{ route('showrooms.index') }}" class="nav-link {{ Request::routeIs('showrooms.create') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Khối nội dung trang Showroom</p>
                        </a>
                    </li> --}}

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('e-brochure.index') }}" class="nav-link {{ Request::routeIs('e-brochure.create') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Khối nội dung trang E-brochure</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                {{-- </ul>
            </li> --}}

            {{-- <li class="nav-item has-treeview  {{ request()->is('admin/reviews') || request()->is('admin/reviews*') ? 'menu-open' : '' }} ">
                <a href="{{ route('Review.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-star"></i>
                    <p>
                        Đánh giá khách hàng
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-handshake"></i>
                    <p>
                        Khách hàng
                        <i class=" fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('CustomerGroup.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Nhóm khách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Customer.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách khách</p>
                        </a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="nav-item {{ Request::routeIs('Supplier.index') ? 'active' : '' }}">
                <a href="{{ route('Supplier.index') }}" class="nav-link">
                    <i class="fas fa-truck nav-icon"></i>
                    <p>
                        Nhà cung cấp
                    </p>
                </a>
            </li> --}}
            {{-- <li class="nav-item has-treeview {{ request()->is('common/cars*') || request()->is('vehicle-manufacts*') || request()->is('vehicle-types*') || request()->is('vehicle-categories*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Danh mục xe
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('VehicleManufact.index') }}" class="nav-link {{ Request::routeIs('VehicleManufact.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh mục hãng xe</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('VehicleType.index') }}" class="nav-link {{ Request::routeIs('VehicleType.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh mục loại xe</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('VehicleCategory.index') }}" class="nav-link {{ Request::routeIs('VehicleCategory.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh mục dòng xe</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Car.index') }}" class="nav-link {{ Request::routeIs('Car.index') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh mục xe</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-codepen"></i>
                    <p>
                        Tài sản cố định
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('FixedAsset.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách tài sản</p>
                        </a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-percent"></i>
                    <p>
                        CT Khuyến mãi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('PromoCampaign.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Danh sách chương trình</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('PromoCampaign.create') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Thêm mới chương trình</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Báo cáo thông kê
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Báo cáo doanh thu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Báo cáo kho</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Report.promoReport') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Báo cáo khuyến mại</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Report.promoProductReport') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Báo cáo khuyến mại tặng hàng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Report.customerSaleReport') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Báo cáo bán hàng theo khách</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Báo cáo quỹ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Báo cáo khác</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>
                        Danh mục khác
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('privacy.edit') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chính sách bảo mật</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('delivery.edit') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chính sách vận chuyển</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('refund.edit') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chính sách hoàn trả</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('term.edit') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Điều khoản & Điều kiện</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ route('User.create') }}" class="nav-link">
                            <i class="far fas fa-angle-right nav-icon"></i>
                            <p>Tạo tài khoản</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Role.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chức vụ</p>
                        </a>
                    </li> --}}
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Người dùng
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('User.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Tài khoản</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ route('User.create') }}" class="nav-link">
                            <i class="far fas fa-angle-right nav-icon"></i>
                            <p>Tạo tài khoản</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Role.index') }}" class="nav-link">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Chức vụ</p>
                        </a>
                    </li> --}}
                </ul>
            </li>

            <li class="nav-item has-treeview  {{ request()->is('uptek/configs') || request()->is('uptek/customer-levels') || request()->is('uptek/accumulate-point/*') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Cấu hình hệ thống
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('Config.edit') }}" class="nav-link  {{ Request::routeIs('Config.edit') ? 'active' : '' }}">
                            <i class="far fas  fa-angle-right nav-icon"></i>
                            <p>Cấu hình chung</p>
                        </a>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('configStatistic.index') }}" class="nav-link {{ Request::routeIs('configStatistic.index') ? 'active' : '' }}">--}}
{{--                            <i class="far fas  fa-angle-right nav-icon"></i>--}}
{{--                            <p>Cấu hình số liệu thống kê</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
