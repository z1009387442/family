@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'Gallery-add')
<!-- 左边菜单 -->
@section('sidebar')		
    @parent
 
@endsection
<!-- 内容输入区 -->
@section('content')
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>添加地区</strong>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="text-input">地区名称</label>
                                            <div class="col-md-9">
                                                <input type="text" id="text-input" name="img_name" class="form-control">
                                            </div>
                                        </div>
                                       
                                    
                                        <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> 添加</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 重置</button>
                                </div>
                                    </form>
                                </div>
                                <!-- <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                                </div> -->
                                </div>
                                </div>
@endsection