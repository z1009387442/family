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
        <i class="fa fa-align-justify"></i> 品牌列表
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
                    <th>品牌名称</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list as $k=>$v)
                <tr>
                  
                   <td><font color="Gray">{{$v->brand_name}}</font></td>
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
                             <a href="{{url('admin/complex/facilities_save')}}?id=<?=$v->brand_id?>">编辑</a>　   
                            <a href="{{url('admin/complex/facilities_del')}}?id=<?=$v->brand_id?>">删除</a>
                            </font>
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
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
            </ul>
        </nav>
    </div>
</div>
</div>
<!--/.col-->
</div>
@endsection