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
        <i class="fa fa-align-justify"></i> 酒店打折列表
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
                    <th>打折酒店名称</th>
                    <th>酒店城市对应ID</th>
                    <th>酒店打折数</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             @foreach($list as $v)
                <tr>  
              
                 <td><font color="Gray">{{$v->hotel_name}}</font></td>
                   <td><font color="Gray">{{$v->region_id}}</font></td>
                   <td><font color="Gray">{{$v->discounts_num}}折</font></td>
                  <td><font color="Gray">{{$v->sort}}</font></td>
                    <td>
                            <font color="SkyBlue"> 
                            <a href="{{url('admin/discounts/discounts_del')}}?id=<?=$v->discounts_id?>">删除</a>
                            </font>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
        <nav>
               <div>
                    
            </div>
        </nav>
    </div>
</div>
</div>
<!--/.col-->
</div>
@endsection