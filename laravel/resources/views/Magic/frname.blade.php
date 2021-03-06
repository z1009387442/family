<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="/frname/img/favicon.png">

    <title>Laravel-@yield('title')</title>

    <!-- Icons -->
    <link href="/frname/css/font-awesome.min.css" rel="stylesheet">
    <link href="/frname/css/simple-line-icons.css" rel="stylesheet">
    <link href="/frname/zhezhao/style.css" rel="stylesheet">
    <script src="/qiantai/js/jquery.js"></script>
    <!-- Main styles for this application -->
    <link href="/frname/css/style.css" rel="stylesheet">
    <style>
        .app-footer{
            position: relative;
            bottom: 0;
            width: 100%;
            left: -200px;
        }
    </style>
</head>



<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
@section('header')
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
            </li>

            <li class="nav-item px-1">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item px-1">
                <a class="nav-link" href="#">Users</a>
            </li>
            <li class="nav-item px-1">
                <a class="nav-link" href="#">Settings</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item hidden-md-down">
                <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
            </li>
            <li class="nav-item hidden-md-down">
                <a class="nav-link" href="#"><i class="icon-list"></i></a>
            </li>
            <li class="nav-item hidden-md-down">
                <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="/frname/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="hidden-md-down">
                    @if(Session::has('admin_name'))
                    {{Session::get('admin_name')}}
                    @endif
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>

                    <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>

                    <div class="dropdown-header text-center">
                        <strong>Settings</strong>
                    </div>

                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-default">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
                    <div class="divider"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
                    <a class="dropdown-item" href="{{URL('admin/login/logout')}}"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
            <li class="nav-item hidden-md-down">
                <a class="nav-link navbar-toggler aside-menu-toggler" href="#">☰</a>
            </li>

        </ul>
    </header>
@show


    <div class="app-body">
        
        <div class="sidebar">
        @section('sidebar')
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> 测试 <span class="badge badge-info">NEW</span></a>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>地区管理/浮动值</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/region/region_add')}}"><i class="icon-shield"></i> 添加地区</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="{{url('admin/region/region_list')}}"><i class="icon-question"></i> 修改地区</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>相册管理</a>
                        <ul class="nav-dropdown-items">
                         <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/picture/hotel_album_add')}}"><i class="icon-shield"></i> 酒店内部图片添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/region/region_list')}}"><i class="icon-puzzle"></i> 修改地区/浮动值</a>
                            </li>
                        </ul>
                    </li>

                     <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>团队管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/about/add_about')}}"><i class="icon-puzzle"></i> 添加队员</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/about/team_list')}}"><i class="icon-puzzle"></i> 队员列表</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-calculator"></i>类型管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/type/type_add')}}"><i class="icon-puzzle"></i> 类型添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/type/type_list')}}"><i class="icon-puzzle"></i> 类型编辑</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i>酒店管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/hotel/hotel_add')}}"><i class="icon-puzzle"></i> 酒店添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/hotel/hotel_list')}}"><i class="icon-puzzle"></i> 酒店编辑</a>

                            </li>
                        </ul>
                    </li>
                    <!--                 客房设施 -->
                        <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>客房设施管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/rooms/facilities_add')}}"><i class="icon-shield"></i> 客房设施添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/rooms/facilities_list')}}"><i class="icon-shield"></i> 客房设施编辑</a>

                            </li>
                        </ul>
                    </li>
                    <!--综合设施管理-->
                        <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i>综合设施管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/complex/facilities_add')}}"><i class="icon-puzzle"></i> 综合设施添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/complex/facilities_list')}}"><i class="icon-puzzle"></i> 综合设施编辑</a>

                            </li>
                        </ul>
                    </li>

                    <!--商品积分列表-->
                        <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>商品积分管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/goods/goods_add')}}"><i class="icon-shield"></i> 商品积分添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/goods/goods_list')}}"><i class="icon-shield"></i> 商品积分编辑</a>

                            </li>
                        </ul>
                    </li>


                       <!--招商管理管理-->
                        <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i>招商管理</a>
                        <ul class="nav-dropdown-items">
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/join/join_list')}}"><i class="icon-puzzle"></i> 招商内容展示</a>

                            </li>
                        </ul>
                    </li>
                        <!--品牌管理-->
                     <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-calculator"></i>品牌管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/brand/brand_add')}}"><i class="icon-puzzle"></i> 品牌添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/brand/brand_list')}}"><i class="icon-puzzle"></i> 品牌编辑</a>
                            </li>
                        </ul>
                    </li>
                    <!--打折管理-->

                     <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>打折管理</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/discounts/discounts_add')}}"><i class="icon-puzzle"></i> 折扣添加</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/discounts/discounts_list')}}"><i class="icon-puzzle"></i> 折扣编辑</a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="nav-title">                   
                </ul>
            </nav>
            @show
        </div>

        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>

                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu hidden-md-down">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                        <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                    </div>
                </li>
            </ol>

@yield('content')


<footer class="app-footer">

Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://www.17sucai.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>      
</footer>
@section('js')
    <script src="/frname/assets/js/libs/jquery.min.js"></script>
@show
	<!-- Bootstrap and necessary plugins -->
	
	<script src="/frname/assets/js/libs/tether.min.js"></script>
	<script src="/frname/assets/js/libs/bootstrap.min.js"></script>
	<script src="/frname/assets/js/libs/pace.min.js"></script>
	<!-- Plugins and scripts required by all views -->
	<script src="/frname/assets/js/libs/Chart.min.js"></script>
	
	<!-- GenesisUI main scripts -->
	<script src="/frname/js/app.js"></script>
	<!-- Plugins and scripts required by this views -->
	<!-- Custom scripts required by this view -->
	<script src="/frname/js/views/main.js"></script>
	
</body>
</html>