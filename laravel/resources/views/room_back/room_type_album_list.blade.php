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
        <strong>房间类型图片添加</strong>
    </div>
    <div class="card-block">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="room_type_id" value="{{$data['room_type_id']}}">
            <input type="hidden" name="hotel_id" value="{{$data['hotel_id']}}">
            <div class="form-group row">
          <label class="col-md-3 form-control-label" for="file-input">上传图片</label>
                    <div class="col-md-9">
                        <input type="file" id="file-input" name="img_path" multiple="">
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