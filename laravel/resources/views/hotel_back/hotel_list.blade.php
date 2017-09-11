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
                    <!-- <th>服务项目</th>
                    <th>客房设施</th> -->
                    <th>添加时间</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($list as $k=>$v)
                <tr>
                    <td><a href="{{url('admin/hotel_type/hotel_type_list')}}?id={{$v->hotel_id}}">{{$v->hotel_name}}</a></td>
                    <td><font color="Gray">{{$v->region_name}}</font></td>
                    <td><font color="Gray"><img  style="width: 140px;height: 120px;" src="{{$v->hotel_img}}" /></font></td>
                    <td><font color="Gray">{{$v->hotel_tel}}</font></td>
                    <td><font color="Gray">{{$v->hotel_fax}}</font></td>
                    <td><font color="Gray">{{$v->hotel_address}}</font></td>
                    <td><font color="Gray"><?php echo mb_substr($v->hotel_desc,0,20).'...'?></font></td>
                    <td><font color="Gray"><?php echo mb_substr($v->hotel_hint,0,20).'...'?></font></td>
                    <!-- <td><font color="Gray">{{$v->complex_facilities_id}}</font></td>
                    <td><font color="Gray">{{$v->rooms_facilities_id}}</font></td> -->
                    <td><font color="Gray">{{$v->created_at}}</font></td>
                    <td><font color="Gray">{{$v->sort}}</font></td>
                    <td><font color="Gray">
                       <select  data-id="{{$v->hotel_id}}" class="change">
                        <option @if($v->status==1) selected @endif value="1">开启</option>
                        <option @if($v->status==0) selected @endif value="0">关闭</option>
                      </select>
                    </td>
                    <td>
                            <font color="SkyBlue">
                             <a href="{{url('admin/hotel/hotel_save')}}?id=<?=$v->hotel_id?>">编辑</a>　 
                               <a data-id="{{$v->hotel_id}}" class="cd-popup-trigger0" href="javascript:void(0)">删除</a>
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
<div class="cd-popup">
                <div class="cd-popup-container">
                <br/><br/>
                <h3><span style="color: red">温馨提示</span></h3>
                <div class="cd-buttons">
                <center>
                <div style="width: 260px;"><br/>
                酒店删除后,该酒店下的所有相关信息都会被删除,您确定要删除吗？</div>
                </center><br/><br/><br/><br/>
                 <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-primary real">确定</button>
                    <input type="hidden" class="hotel_id" value="">
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
                $(".hotel_id").val(real);
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
                    var hotel_id = $(".hotel_id").val();
                    $.ajax({
                        'type':'get',
                        'url':'hotel_del',
                        'data':{hotel_id:hotel_id},
                        success:function(msg){ 
                            window.location.reload();
                        }
                    });
                     
                });
                //点击取消后，关闭窗口
                $(".reset").click(function(){
                    $('.cd-popup').removeClass('is-visible');
                });
    $(".change").change(function(){
        var status = $(this).val();
        var hotel_id = $(this).data('id');
        $.ajax({
            'type':'get',
            'url':'hotel_save_status',
            'data':{status:status,hotel_id:hotel_id},
            success:function(msg){
                if(msg==1){
                    alert('状态修改成功！');
                }
            }
        });
    })
</script>
@endsection
