@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'ABC')
<!-- 左边菜单 -->
@section('sidebar')
@parent
@endsection
<style>
    table{
        text-align:center;

    }
</style>
<!-- 内容输入区 -->
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> 客房设施列表
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
                    <th>客房设施名称</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list as $k=>$v)
                <tr>
                  
                   <td><font color="Gray">{{$v->rooms_facilities_name}}</font></td>
                    <td><font color="Gray">{{$v->sort}}</font></td>
                    <td><font color="Gray">
                        @if($v->status==1)
                        <font color="red">开启</font>
                        @else
                        关闭
                        @endif</font>
                    </td>
                    <td>
                            <font color="SkyBlue">
                             <a href="{{url('admin/rooms/facilities_save')}}?id=<?=$v->rooms_facilities_id?>">编辑</a>　   
                            <a href="{{url('admin/rooms/facilities_del')}}?id=<?=$v->rooms_facilities_id?>">删除</a>
                            </font>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
        <nav>
             <div>
                    <div class="pull-right">{{$list->render()}}</div>
            </div>
     
    </div>
</div>
</div>
<!--/.col-->
</div>
@endsection