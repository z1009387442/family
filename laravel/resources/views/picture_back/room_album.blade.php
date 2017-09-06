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
                                                <th>酒店图片</th>
                                                <th>酒店状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($hotel as $k=>$v)
                                            <tr>
                                         
                                                <td><font color="Gray">{{$v->hotel_name}}</font></td>
                               					<td><img width="100" height="100" src="{{$v->img_path}}" alt="{{$v->img_name}}" /></td>
                                                <td><font color="Gray">{{$v->hotel_img}}</font></td>
                                                <td>
                                                        <font color="SkyBlue">
                                                        <i class="fa fa-pencil-square fa-lg mt-2"></i> <a href="{{url('admin/picture/room_album_add')}}?hotel_id=<?=$v->hotel_id?>">编辑</a>　   
                                                        <i class="fa fa-trash fa-lg mt-2"></i> <a href="{{url('admin/gallery/img_del/id')}}/<?=$v->id?>">删除</a>
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