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
                                    <strong>酒店添加</strong>
                                </div>                              
<div class="card-block">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="form-group row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">酒店名称</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_name" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">所属地区</label>
            <div class="col-md-9">
                <select class="form-control" name="region_id" style="width: 180px;" id="ccyear">
                @foreach($region as $k=>$v)
                    <option value="{{$v->region_id}}">{{$v->region_name}}</option>
                 @endforeach   
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="file-input">首页图片</label>
            <div class="col-md-9">
                <input type="file" id="file-input" name="hotel_img">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">酒店电话</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_tel" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">酒店传真</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_fax" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">详细地址</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_address" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">酒店介绍</label>
            <div class="col-md-9">
                <textarea id="textarea-input" name="hotel_desc" rows="9" class="form-control" ></textarea>
            </div>
        </div>
         <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">入住提示</label>
            <div class="col-md-9">
                <textarea id="textarea-input" name="hotel_hint" rows="9" class="form-control" ></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">排　　序</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="sort" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">服务项目</label>
            <div class="col-md-9">
                <select class="form-control" name="service_items_id" style="width: 180px;" id="ccyear">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">客房设施</label>
            <div class="col-md-9">
                <select class="form-control" name="room_facilities_id" style="width: 180px;" id="ccyear">
               <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">使用状态</label>
            <div class="col-md-9">
                <div class="radio">
                    <label for="radio1">
                        <input type="radio" id="radio1" name="status" value="1">开启
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