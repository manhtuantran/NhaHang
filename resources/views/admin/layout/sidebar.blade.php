@php use Illuminate\Support\Facades\Auth @endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin/layout/index" class="brand-link">
        <img src="images/restaurant.png" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="color: white; font-weight: bold;">
            @php
                use App\Restaurant;$restaurant =  Restaurant::where('id','=',Auth::user()->id_restaurant)->first();
                    echo $restaurant->name
            @endphp
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="display: grid; grid-template-columns: 5fr 5fr;">
            <div class="image" style="margin-top: .5rem;">
                <img src="images/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span style="color: white">
                    {{Auth::user()->name}}
                </span>
                <br>
                <span style="color: white">
                    Chức danh:
                {{Auth::user()->level}}
                </span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="admin/layout/index" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang quản trị
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'Quản lý')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users" style="margin-right: .5rem;"></i>
                            <p>
                                Quản lý nhân viên
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/user/danhsach/{{Auth::user()->id_restaurant}}" class="nav-link">
                                    <i class="fas fa-list" style="margin-right: .5rem;"></i>
                                    <p>Danh sách nhân viên</p>
                                </a>
                            </li>
                            @if(Auth::user()->level=='admin')
                                <li class="nav-item">
                                    <a href="admin/user/them" class="nav-link">
                                        <i class="fas fa-user-plus" style="margin-right: .5rem;"></i>
                                        <p>Thêm nhân viên</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->level=='admin')
                    <li class="nav-item has-treeview">
                        <a href="admin/restaurant/danhsach" class="nav-link">
                            <i class="fas fa-utensils" style="margin-right: .5rem;"></i>
                            <p>
                                Quản lý các nhà hàng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/restaurant/danhsach" class="nav-link">
                                    <i class="fas fa-list" style="margin-right: .5rem;"></i>
                                    <p>Danh sách các nhà hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/restaurant/them" class="nav-link">
                                    <i class="fas fa-plus-square" style="margin-right: .5rem;"></i>
                                    <p>Thêm nhà hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="admin/container/danhsach" class="nav-link">
                            <i class="fas fa-warehouse" style="margin-right: .5rem;"></i>
                            <p>
                                Quản lý kho
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/container/danhsach" class="nav-link">
                                    <i class="fas fa-list" style="margin-right: .5rem;"></i>
                                    <p>Danh sách kho</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/container/them" class="nav-link">
                                    <i class="fas fa-plus-square" style="margin-right: .5rem;"></i>
                                    <p>Thêm kho</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'Quản lý')
                    <li class="nav-item has-treeview">
                        <a href="admin/material/danhsach" class="nav-link">
                            <i class="fas fa-carrot" style="margin-right: .6rem;"></i>
                            <p>
                                Quản lý nguyên liệu
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/material/danhsach" class="nav-link">
                                    <i class="fas fa-list" style="margin-right: .6rem;"></i>
                                    <p>Danh sách các nguyên liệu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/material/them" class="nav-link">
                                    <i class="fas fa-plus-square" style="margin-right: .6rem;"></i>
                                    <p>Thêm nguyên liệu</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'Quản lý')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-drumstick-bite" style="margin-right: .6rem;"></i>
                            <p>
                                Quản lý menu đồ ăn
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/food/danhsach" class="nav-link">
                                    <i class="fas fa-list" style="margin-right: .6rem;"></i>
                                    <p>Danh sách đồ ăn</p>
                                </a>
                            </li>
                            @if(Auth::user()->level=='admin' || Auth::user()->level=='Quản lý')
                                <li class="nav-item">
                                    <a href="admin/food/them" class="nav-link">
                                        <i class="fas fa-plus-square" style="margin-right: .6rem;"></i>
                                        <p>Thêm đồ ăn</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'Quản lý' || Auth::user()->level == 'Order')
                    <li class="nav-item has-treeview">
                        <a href="admin/desk/danhsach" class="nav-link">
                            <img src="images/desk.png" alt="" style="width: 1.5rem; background: white; padding: .1rem;"
                                 style="margin-right: .4rem;">
                            <p>
                                Quản lý đặt bàn
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/desk/danhsach" class="nav-link">
                                    <i class="fas fa-list" style="margin-right: .6rem;"></i>
                                    <p>Danh sách bàn</p>
                                </a>
                            </li>
                            @if(Auth::user()->level=='admin')
                                <li class="nav-item">
                                    <a href="admin/desk/them" class="nav-link">
                                        <i class="fas fa-plus-square" style="margin-right: .6rem;"></i>
                                        <p>Thêm bàn</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li class="nav-item has-treeview">
                    <a href="admin/order/danhsach" class="nav-link">
                        <i class="fas fa-file-invoice-dollar" style="margin-right: .6rem;"></i>
                        <p>
                            Quản lý Order
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin/order/danhsach" class="nav-link">
                                <i class="fas fa-list" style="margin-right: .6rem;"></i>
                                <p>Danh sách Oder</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/order/tao" class="nav-link">
                                <i class="fas fa-plus-square" style="margin-right: .6rem;"></i>
                                <p>Tạo Order</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->level=='admin' || Auth::user()->level=='Quản lý')
                    <li class="nav-item has-treeview">
                        <a href="admin/statistic/danhsach" class="nav-link">
                            <i class="fas fa-money-bill-wave" style="margin-right: .6rem;"></i>
                            <p>
                                Thống kê doanh thu
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/statistic/danhsach" class="nav-link">
                                    <i class="fas fa-money-bill-wave" style="margin-right: .6rem;"></i>
                                    <p>Tổng doanh thu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/statistic/homnay" class="nav-link">
                                    <i class="fas fa-money-bill-wave" style="margin-right: .6rem;"></i>
                                    <p>Doanh thu hôm nay</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/statistic/thangnay" class="nav-link">
                                    <i class="fas fa-money-bill-wave" style="margin-right: .6rem;"></i>
                                    <p>Doanh thu tháng này</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/statistic/namnay" class="nav-link">
                                    <i class="fas fa-money-bill-wave" style="margin-right: .6rem;"></i>
                                    <p>Doanh thu năm nay</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/statistic/user" class="nav-link">
                                    <i class="fas fa-money-bill-wave" style="margin-right: .6rem;"></i>
                                    <p>Doanh thu theo nhân viên order</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
