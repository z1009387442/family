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
                                    <strong>品牌修改</strong>
                                </div>                              
<div class="card-block">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="form-group row">
         <input type="hidden" name="id" value="{{$one->brand_id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">品牌名称</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="brand_name" value="{{$one->brand_name}}"   class="form-control" >
            </div>
        </div>
      
       
    
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">排　　序</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="sort" value="{{$one->sort}}" class="form-control" >
            </div>
        </div>
       
       
        <div class="form-group row">
            <label class="col-md-3 form-control-label">使用状态</label>
            <div class="col-md-9">
                <div class="radio">
                    <label for="radio1">
                        <input type="radio" id="radio1" name="status" @if($one->status==1) checked @endif  value="1" >开启
                    </label>
                    <label for="radio2">
                        <input type="radio" id="radio2" name="status" @if($one->status==0) checked @endif  value="0" >关闭
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