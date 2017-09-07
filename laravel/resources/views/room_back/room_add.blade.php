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
                                    <strong>房间添加</strong>
                                </div>                              
<div class="card-block">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="form-group row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">房间号码</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="room_number" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">所属酒店</label>
            <div class="col-md-9">
                <select class="form-control" disabled name="hotel_id" style="width: 180px;" id="ccyear">
                @foreach($hotel as $k=>$v)
                    <option @if($v->hotel_id == $hotel_id) selected @endif value="{{$v->hotel_id}}">{{$v->hotel_name}}</option>
                 @endforeach   
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">所属分类</label>
            <div class="col-md-9">
                <select class="form-control" disabled  name="room_type_id" style="width: 180px;" id="ccyear">
                @foreach($type as $k=>$v)
                    <option  @if($v->room_type_id == $type_id) selected @endif value="{{$v->room_type_id}}">{{$v->room_type_name}}</option>
                 @endforeach   
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">房间楼层</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="room_floor" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">房间方位</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="room_dicection" class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">使用状态</label>
            <div class="col-md-9">
                <div class="radio">
                    <label for="radio1">
                        <input type="radio" id="radio1" checked name="status" value="1">可以使用
                    </label>
                    <label for="radio2">
                        <input type="radio" id="radio2" name="status" value="0">暂停使用
                    </label>
            </div>
        </div>
    
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
</div>
</form>
</div></div></div>
@endsection