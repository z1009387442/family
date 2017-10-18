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
                    <strong>修改地区浮动值</strong>
                </div>
                <div class="card-block">
                    <form action="" method="post" class="form-horizontal ">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="region_id" value="{{ $data->region_id }}">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">地区名称</label>
                            <div class="col-md-9">
                                <input type="text" id="text-input" name="region_name" disabled class="form-control" value="{{ $data->region_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">地区名称缩写</label>
                            <div class="col-md-9">
                                <input type="text" id="text-input" name="short" disabled class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">浮动值</label>
                            <div class="col-md-9">
                                <input type="text" id="text-input" name="floating_value" value="{{ $data->floating_value }}" class="form-control">
                                <p>如0-0 0-中的0代表减1代表增 -0中的0代表百分比</p>
                            </div>
                        </div>
                        
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">排序</label>
                            <div class="col-md-9">
                                <input type="text" id="text-input" value="50" disabled name="sort" class="form-control">
                            </div>
                        </div>
                       
                    
                <div class="card-footer" align="center">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> 添加</button>
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 重置</button>
                </div>
                    </form>
                </div>
              
                </div>
                </div>
@endsection