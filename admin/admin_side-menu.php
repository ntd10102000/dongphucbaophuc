<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="../index.php">GUNO STORE</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="../assets/img/user.png" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <strong>Administrator</strong>
                    </span>
                    <span class="user-role">Administrator</span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                    </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar-search  -->

            <!-- sidebar-menu  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>QUẢN LÝ HỆ THỐNG</span>
                    </li>
                    <li>
                        <a href="./admin_account.php">
                            <i class="fas fa-users"></i> Quản lý tài khoản
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-clipboard-list"></i>
                            <span>Đơn hàng</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="./admin_billAll.php"><i class="fas fa-clipboard-check"></i>Danh sách đơn hàng</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-reply"></i>Trả hàng</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="./admin_customer.php">
                            <i class="fas fa-user"></i>
                            <span>Khách hàng</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fab fa-shopify"></i>
                            <span>Sản phẩm</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="./admin_productsAll.php"><i class="fas fa-shopping-basket"></i>Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="./admin_typeProducts.php"><i class="fas fa-layer-group"></i>Loại sản phẩm</a>
                                </li>
                                <li>
                                    <a href="./admin_productsInStore.php"><i class="fas fa-store"></i>Kho</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-chart-line"></i>
                            <span>Báo cáo</span>
                        </a>

                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="./admin_dashbroad.php?option=day"><i class="fas fa-calendar-day"></i>Báo cáo bán hàng</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-store"></i>Báo cáo kho</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
            </a>
            <a href="#">
                <i class="fa fa-envelope"></i>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
            </a>
            <a href="#">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">