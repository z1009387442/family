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
        <i class="fa fa-align-justify"></i> 商品积分列表
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
                    <th>商品积分名称</th>
                    <th>商品所需积分</th>
                    <th>商品图片</th>
                    <th>使用抵用券</th> 
                    <th>商品描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list as $k=>$v)
                <tr>     
                   <td><font color="Gray">{{$v->goods_name}}</font></td>
                   <td><font color="Gray">{{$v->goods_price}}</font></td>
                   <td><font color="Gray"><img width="100" height="100" src="{{$v->goods_img}}" alt="{{$v->img_name}}" /></font></td>
                    <td><font color="Gray">{{$v->use_of}}</font></td>
                  <td><font color="Gray">{{$v->goods_desc}}</font></td>
                    <td>
                            <font color="SkyBlue">
                             <a href="{{url('admin/goods/goods_save')}}?id=<?=$v->goods_id?>">编辑</a>　   
                            <a href="{{url('admin/goods/goods_del')}}?id=<?=$v->goods_id?>">删除</a>
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
        </nav>
    </div>
</div>
</div>
<!--/.col-->
</div>
@endsection