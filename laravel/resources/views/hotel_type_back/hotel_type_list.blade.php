@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'ABC')
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
                                    <i class="fa fa-edit"></i>添加酒店房间分类
                                     
                                       　 <font size="2"><a href="{{url('admin/type/type_list')}}">查看分类详情</a></font>
                                   
                                </div>
                                <div class="card-block">
                                    <form class="form-horizontal" action="{{url('admin/hotel_type/hotel_type_add')}}?hotel_id={{$hotel_id}}" method="post">
                                         <div class="form-group row">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            @if($type_list ==  '')
                                                该酒店已添加所有分类，更多房间分类敬请期待！
                                            @else
                                            <div class="col-md-9">                 
                                                @foreach($type_list as $k=>$v)
                                                <label class="checkbox-inline" for="inline-checkbox1">
                                                    <input type="checkbox" id="inline-checkbox1" name="hotel_room_type_id[]" value="{{$v->room_type_id}}"> {{$v->room_type_name}}
                                                </label>　
                                                @endforeach
                                            </div>
                                            <button type="submit" class="btn btn-primary">提交</button>　
                                            <input type="reset" class="btn btn-default" value="重置">
                                             @endif 
                                        </div>
                                        <!-- <div class="form-actions"> -->
                                            
                                        <!-- </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
<div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> 酒店房间类型列表
                                    <!-- <label class="switch switch-3d switch-primary">
                                        <input type="checkbox" class="switch-input" checked="">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label> -->
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                    @if($list!='')
                                    
                                        <thead>

                                            <tr>
                                                <th>类型名称</th>
                                                <th>床的类型</th>
                                                <th>入住人数</th>
                                                <th>房间面积</th>
                                                <th>门市价格</th>
                                                <th>会员价格</th>
                                                <th>房间描述</th>
                                                <th>排序</th>
                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                        @foreach($list as $k=>$v)
                                            <tr>
                                                <td><font color="Gray">{{$v->room_type_name}}</font></td>
                                                <td><font color="Gray">{{$v->bed_type}}</font></td>
                                                <td><font color="Gray">{{$v->max_people}}</font></td>
                                                <td><font color="Gray">{{$v->room_area}}</font></td>
                                                <td><font color="Gray">{{$v->rack_price}}</font></td>
                                                <td><font color="Gray">{{$v->vip_price}}</font></td>
                                                <td><font color="Gray">{{$v->room_desc}}</font></td>
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
                                                         <a href="{{url('admin/room/room_add')}}?type_id=<?=$v->room_type_id?>&&hotel_id=<?=$hotel_id?>">添加房间</a>　   
                                                        <a href="{{url('admin/room/room_list')}}?type_id=<?=$v->room_type_id?>&&hotel_id=<?=$hotel_id?>">查看房间</a>
                                                        <a href="{{url('admin/room/room_type_album_add')}}?room_type_id=<?=$v->room_type_id?>&&hotel_id=<?=$hotel_id?>">添加图片</a>
                                                        </font>
                                                </td>
                                            </tr>
                                            

                                         @endforeach
                                    
                                        </tbody>
                                        @else
                                        <tr>
                                            该酒店还没有房间类型，快到列表上方添加吧
                                        </tr>
                                    
                                    @endif
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