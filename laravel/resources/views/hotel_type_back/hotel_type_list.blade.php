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
                                    <i class="fa fa-edit"></i>添加酒店房间分类<!--  <button class="but">ssss</button> -->
                                     
                                       　 <font size="2"><a href="{{url('admin/type/type_list')}}">查看分类详情</a></font>
                                </div>
                                <div class="card-block">
                                    <form class="form-horizontal" action="{{url('admin/hotel_type/hotel_type_add')}}" method="post">
                                    <input type="hidden" name="hotel_id" class="hotel_id" value="{{$hotel_id}}">
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
                                                    @if($v->status==1)
                                                    开启
                                                    @else
                                                    关闭
                                                    @endif</font>
                                                </td>
                                                <td>
                                                        <font color="SkyBlue">
                                                         <a href="{{url('admin/room/room_add')}}?type_id=<?=$v->room_type_id?>&&hotel_id=<?=$hotel_id?>">添加房间</a>　  
                                                        <a href="{{url('admin/room/room_list')}}?type_id=<?=$v->room_type_id?>&&hotel_id=<?=$hotel_id?>">房间列表</a>　
                                                        <a data-id="{{$v->room_type_id}}" class="cd-popup-trigger0" href="javascript:void(0)">删除分类</a>
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
             <div class="cd-popup">
                <div class="cd-popup-container">
                <br/><br/>
                <h3><span style="color: red">温馨提示</span></h3>
                <div class="cd-buttons">
                <center>
                <div style="width: 260px;"><br/>
                酒店类型删除后,该类型下的所有房间也会被删除,您确定要删除吗？</div>
                </center><br/><br/><br/><br/>
                 <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-primary real">确定</button>
                    <input type="hidden" class="room_type_id" value="">
                    <button type="reset" class="btn btn-sm btn-danger reset">取消</button>
                </div>
                </div>
                <a href="javascript:;"> <i class="fa fa-close fa-lg mt-2 cd-popup-close"> 　</i></a>
                </div>
            </div>
                                                    
            <script type="text/javascript">
                /*弹框JS内容*/
                jQuery(document).ready(function($){
                //打开弹窗口
                $('.cd-popup-trigger0').on('click', function(event){
                event.preventDefault();
                var real = $(this).data('id');
                $(".room_type_id").val(real);
                $('.cd-popup').addClass('is-visible');
                //$(".dialog-addquxiao").hide()
                });
                //关闭弹窗口
                $('.cd-popup').on('click', function(event){
                if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
                event.preventDefault();
                $(this).removeClass('is-visible');
                }
                });
                });
                //点击确认后，触发ajax
                $(".real").click(function(){ 
                    $('.cd-popup').removeClass('is-visible');
                    var room_type_id = $(".room_type_id").val();
                    var hotel_id = $(".hotel_id").val();
                    $.ajax({
                        'type':'get',
                        'url':'hotel_type_del',
                        'data':{room_type_id:room_type_id,hotel_id:hotel_id},
                        success:function(msg){ 
                            window.location.reload();
                        }
                    });
                });
                //点击取消后，关闭窗口
                $(".reset").click(function(){
                    $('.cd-popup').removeClass('is-visible');
                });
            </script>
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