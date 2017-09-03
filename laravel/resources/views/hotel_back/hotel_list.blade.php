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
        <i class="fa fa-align-justify"></i> 酒店列表
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
                    <th>酒店名称</th>
                    <th>所属地区</th>
                    <th>首页照片</th>
                    <th>酒店电话</th>
                    <th>酒店传真</th>
                    <th>详细地址</th>
                    <th>酒店介绍</th>
                    <th>入住提示</th>
                    <th>服务项目</th>
                    <th>客房设施</th>
                    <th>添加时间</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list as $k=>$v)
                <tr>
                    <td><font color="Gray"><a href="{{url('admin/hotel_type/hotel_type_list')}}?id={{$v->hotel_id}}">{{$v->hotel_name}}</a></font></td>
                    <td><font color="Gray">{{$v->region_id}}</font></td>
                    <td><font color="Gray"><img  style="width: 140px;height: 120px;" src="{{$v->hotel_img}}" /></font></td>
                    <td><font color="Gray">{{$v->hotel_tel}}</font></td>
                    <td><font color="Gray">{{$v->hotel_fax}}</font></td>
                    <td><font color="Gray">{{$v->hotel_address}}</font></td>
                    <td><font color="Gray">{{$v->hotel_desc}}</font></td>
                    <td><font color="Gray">{{$v->hotel_hint}}</font></td>
                    <td><font color="Gray">{{$v->service_items_id}}</font></td>
                    <td><font color="Gray">{{$v->room_facilities_id}}</font></td>
                    <td><font color="Gray">{{$v->created_at}}</font></td>
                    <td><font color="Gray">{{$v->sort}}</font></td>
                    <td><font color="Gray">
                        @if($v->status==1)
                        开启
                        @else
                        关闭
                        @endif</font>
                    </td>
                    <td>
                            <font color="SkyBlue">
                             <a href="{{url('admin/gallery/img_save')}}?id=<?=$v->id?>">编辑</a>　   
                            <a href="{{url('admin/type/type_del/id')}}?id=<?=$v->id?>">删除</a>
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