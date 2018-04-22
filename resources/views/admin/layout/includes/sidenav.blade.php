<div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.html" class="logo">
                            <span>
                                <img src="{{ asset('admin/images/logo.png')}}" alt="" height="22">
                            </span>
                            <i>
                                <img src="{{ asset('admin/images/logo_sm.png')}}" alt="" height="28">
                            </i>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            <li>
                                <a href="{{route('admin.index')}}">
                                    <i class="fi-air-play"></i><span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('category.index')}}"><i class="fi-bag"></i>  <span> Categories </a>
                            </li>
                            <li>
                                <a href="{{route('package.index')}}"><i class="fi-bag"></i>  <span> Packages </a>
                            </li> 
                            <li>
                                <a href="{{route('member.index')}}"><i class="fi-bag"></i>  <span> Members </a>
                            </li> 
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
                {{-- Side Navigation
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('product.index')}}">Products</a></li>
                    <li><a href="{{route('product.create')}}">Add Product</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV--> --}}