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
                                    <i class="fa fa-align-justify"></i> 类型列表
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
                                                <th>类型名称</th>
                                                <th>样本图片</th>
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
                                                <td><img  style="width: 140px;height: 120px;" src="{{$v->type_img}}"/></td>
                                                <td><font color="Gray">{{$v->bed_type}}</font></td>
                                                <td><font color="Gray">{{$v->max_people}}</font></td>
                                                <td><font color="Gray">{{$v->room_area}}</font></td>
                                                <td><font color="Gray">{{$v->rack_price}}</font></td>
                                                <td><font color="Gray">{{$v->vip_price}}</font></td>
                                                <td><font color="Gray">{{$v->room_desc}}</font></td>
                                                <td><font color="Gray">{{$v->sort}}</font></td>
                                                <td><font color="Gray">
                                                <select data-id="{{$v->room_type_id}}"  class="field">
                                                    <option @if($v->status==1) selected @endif value="1">开启</option>
                                                    <option @if($v->status==0) selected @endif value="0">关闭</option>
                                                </select>
                                                </td>
                                                <td>
                                                        <font color="SkyBlue">
                                                         <a href="{{url('admin/type/type_save')}}?id=<?=$v->room_type_id?>">编辑</a>　  
                                                         <a href="{{url('admin/type/type_room')}}?id=<?=$v->room_type_id?>">查看房间</a> 
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
<script type="text/javascript">
    $(".field").change(function(){
        var status = $(this).val();
        var type_id = $(this).data('id');
        $.ajax({
            'type':'get',
            'url':'type_save_status',
            'data':{status:status,type_id:type_id},
            success:function(msg){
                if(msg==1){
                    alert('状态修改成功！');
                }
            }
        });
    })
</script>
@endsection
