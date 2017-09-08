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
                    <th>加盟人姓名</th>
                    <th>加盟人手机号</th>
                    <th>加盟人邮箱</th>
                    <th>加盟人传真</th>
                    <th>合作意向</th>
                    <th>产权情况</th>
                    <th>查看状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list as $k=>$v)
                <tr>     
                   <td><font color="Gray">{{$v->join_people_name}}</font></td>
                   <td><font color="Gray">{{$v->join_people_phone}}</font></td>
                   <td><font color="Gray">{{$v->join_people_email}}</font></td>
                   <td><font color="Gray">{{$v->join_people_fax}}</font></td>
                   <td><font color="Gray">{{$v-> corporation}}</font></td>
                    <td><font color="Gray">{{$v->property}}</font></td>
                  <td><font color="Gray">  @if($v->status==1)
                        <font color="red">已经查看</font>
                        @else
                        未查看
                        @endif</font></font></td>
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