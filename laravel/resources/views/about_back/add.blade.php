@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'ABC')
<!-- 左边菜单 -->
@section('sidebar')
    @parent
 
@endsection
<!-- 内容输入区 -->
@section('content')

<div class="col-md">
        <div class="card">
    <div class="card-header">
        <strong>添加</strong>队员
    </div>
    <div class="card-block">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">队员名称</label>
                <div class="col-md-9">
                    <input type="text" id="text-input" name="team_name" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">队员个签</label>
                <div class="col-md-9">
                    <input type="text" id="text-input" name="team_desc" class="form-control" placeholder="desc">
                </div>
            </div>
            	
            
            <div class="form-group row">
                <label class="col-md-3 form-control-label" for="file-input">队员图像</label>
                <div class="col-md-9">
                    <input type="file" id="file-input" name="team_images">
                </div>
            </div>

             <div class="form-group row">
                <label class="col-md-3 form-control-label" for="file-input">队员状态</label>
                <div class="col-md-9">
                    <input type="radio" id="file-input" name="status" value="1" checked="checked">开启
                    <input type="radio" id="file-input" name="status" value="0">关闭
                </div>
            </div>
        
    </div>
    <center>
    <div class="card-footer">
        <input type="submit" class="btn btn-sm btn-primary" value="添加" />
        <input type="reset" class="btn btn-sm btn-danger" />
    </div>
    </center>
        </div>
        </form>
</div>
@endsection