@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'Gallery-list')
<!-- 左边菜单 -->
@section('sidebar')
    @parent
 
@endsection
<!-- 内容输入区 -->
@section('content')
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> 团队列表
                                    <!-- <label class="switch switch-3d switch-primary">
                                        <input type="checkbox" class="switch-input" checked="">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label> -->
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>图片</th>
                                                <th>图片名称</th>
                                                <th>图片描述</th>
                                                <th>使用状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list as $k=>$v)
                                            <tr>
                                                <td><img width="200" height="100" src="{{$v->team_images}}" alt="{{$v->img_name}}" /></td>
                                                <td><font color="Gray">{{$v->team_name}}</font></td>
                                                <td><font color="Gray">{{$v->team_desc}}</font></td>
                                                <td><font color="Gray">
                                                    @if($v->status==1)
                                                    开启
                                                    @else
                                                    关闭
                                                    @endif</font>
                                                </td>
                                                <td>
                                                        <font color="SkyBlue">
                                                        <i class="fa fa-pencil-square fa-lg mt-2"></i> <a href="{{url('admin/about/team_save')}}?id=<?=$v->id?>">编辑</a>　   
                                                        <i class="fa fa-trash fa-lg mt-2"></i> <a href="{{url('admin/about/team_del')}}?id=<?=$v->id?>">删除</a>
                                                        </font>
                                                </td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                    <nav>
                                        <!-- <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#"><</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">></a>
                                            </li>
                                        </ul> -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
@endsection