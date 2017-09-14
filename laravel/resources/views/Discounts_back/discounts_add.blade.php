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
        <strong>打折添加</strong>
	<!-- <div align="right"><strong align="right"><a href="{{url('')}}">查看列表</a></strong></div> -->
    </div>
    <div class="card-block">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
                <label class="col-md-3 form-control-label" for="text-input">选择酒店</label>
                <div class="col-md-3">
                  
                    <select name="hotel_id" id="hotel_id" class="form-control power_desc">
                                <option value="0">请选择一家打折酒店</option>
                         @foreach($hotel as $k=>$v)
                               <option value="{{$v->hotel_id}}">{{$v->hotel_name}}</option>
                          @endforeach                  
                    </select>
                </div>
            </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">打折数</label>
            <div class="col-md-3">
                <input type="text" id="text-input" name="discounts_num" class="form-control" >
            </div>
        </div>
      
       
    
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">排　　序</label>
            <div class="col-md-3">
                <input type="text" id="text-input" name="sort" value="50" class="form-control" >
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