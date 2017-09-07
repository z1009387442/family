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
                                    <strong>商品积分添加</strong>
                                </div>                              
<div class="card-block">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="form-group row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">商品名称</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="goods_name" class="form-control" >
            </div>
        </div>
      
       
    
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">商品需要积分</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="goods_price" class="form-control" >
            </div>
        </div>
       
      
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">图片</label>
            <div class="col-md-9">
               <input type="file" id="file-input" name="goods_img">
            </div>
        </div>
       
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">抵用券</label>
            <div class="col-md-9">
               <input type="text" id="file-input" name="use_of"> <span><font color="red">*(必填)使用范围如：0—200</font> </span>
            </div>
        </div>
        <div class="form-group row">
           <label class="col-md-3 form-control-label" for="text-input">描述</label>
           <div class="col-md-9">
               <textarea name="goods_desc" id="" cols="30" rows="10"></textarea>
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