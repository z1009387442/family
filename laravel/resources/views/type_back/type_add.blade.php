@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'ABC')
<!-- 左边菜单 -->
@section('sidebar')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<div class="col-md-6">
<div class="card">
  <div class="card-header">
                                    <strong>类型添加</strong>
                                </div>                              
<div class="card-block">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="form-group row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">类型名称</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="room_type_name" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">床的类型</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="bed_type" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="password-input">入住人数</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="max_people" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">房间面积</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="room_area" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">门市价格</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="rack_price" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">会员价格</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="vip_price" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="file-input">样本图片</label>
            <div class="col-md-9">
                <input type="file" id="file-input" name="type_img">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">房型描述</label>
            <div class="col-md-9">
                <textarea id="textarea-input" name="room_desc" rows="9" class="form-control" ></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">排　　序</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="sort" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">使用状态</label>
            <div class="col-md-9">
                <div class="radio">
                    <label for="radio1">
                        <input type="radio" id="radio1" checked name="status"  value="1">开启
                    </label>
                    <label for="radio2">
                        <input type="radio" id="radio2" name="status" value="0">关闭
                    </label>
            </div>
        </div>
    
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
</div>
</form>
</div></div>
@endsection