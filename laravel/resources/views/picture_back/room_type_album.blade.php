@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'Gallery-add')
<!-- 左边菜单 -->
@section('sidebar')     
    @parent
 
@endsection
<!-- 内容输入区 -->
@section('content')
<div class="col-md">
        <div class="card">
    <div class="card-header" align="left">
        <strong>酒店房间图片添加</strong>
	<div align="right"><strong align="right"><a href="{{url('admin/picture/room_album_type_list')}}?hotel_id={{$data['hotel_id']}}">查看列表</a></strong></div>
    </div>
    <div class="card-block">
        <form action="{{url('admin/picture/room_add_album')}}" method="post" enctype="multipart/form-data" class="form-horizontal ">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          
            <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">房间类型</label>
                <div class="col-md-9">
                    <div><input type="hidden" name="hotel_id" value="{{$data['hotel_id']}}"></div>
                    <select name="room_type_id" id="room_type_id" class="form-control power_desc">
                                <option value="0">请选择房间类型</option>
                         @foreach($data['room_type_id'] as $k=>$v)
                               <option value="{{$v->room_type_id}}">{{$v->room_type_name}}</option>
                          @endforeach                  
                    </select>

                </div>
            </div>
            <div class="form-group row">
          <label class="col-md-3 form-control-label" for="file-input">上传图片</label>
                    <div class="col-md-9">
                        <input type="file" id="file-input" name="img_path" >
                    </div>
            </div>
            	     
    </div>
    <center>
    <div class="card-footer">
        <input type="submit" class="btn btn-sm btn-primary checkover" value="添加" />
        <input type="reset" class="btn btn-sm btn-danger" />
    </div>
    </center>
        </div>
        </form>
</div>
<script src="/frname/assets/js/libs/jquery.min.js"></script>
<script>

@endsection