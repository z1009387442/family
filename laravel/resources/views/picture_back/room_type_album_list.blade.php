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
                                    <i class="fa fa-align-justify"></i> 房间类型列表
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
                                                <th>房间类型</th>
                                                <th>房间图片</th>
                                     
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($room_arr as $k=>$v)
                                            <tr>
                                         
                                                <td><font color="Gray">{{$v->room_type_name}}</font></td>
                               					<td><img width="100" height="100" src="{{$v->img_path}}" alt="{{$v->img_path}}" /></td>
                                                
                                                <td>
                                                        <font color="SkyBlue">
                                                        <i class="fa fa-pencil-square fa-lg mt-2"></i> <a href="{{url('admin/picture/album_upd')}}?album_id=<?=$v->album_id?>">修改</a>　   
                                                        <i class="fa fa-trash fa-lg mt-2"></i> <a href="{{url('admin/gallery/album_del/id')}}/<?= $v->album_id?>">删除</a>
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