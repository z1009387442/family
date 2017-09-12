@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'ABC')
<!-- 左边菜单 -->
@section('sidebar')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<div class="card">
  <div class="card-header">
                                    <strong>酒店修改</strong>
                                </div>                              
<div class="card-block">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal ">
    <input type="hidden" name="hotel_id" value="{{$hotel->hotel_id}}">
        <div class="form-group row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">酒店名称</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_name" class="form-control" value="{{$hotel->hotel_name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="select">所属品牌</label>
            <div class="col-md-9">
                <select id="select" name="brand_id" style="width: 280px;height:48px; border: 1px solid #ccc;" >
                <option value="0">请选择品牌</option>
                @foreach($brand as $k=>$v)
                    <option @if($hotel->brand_id==$v->brand_id) selected @endif value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                 @endforeach
                </select>
            </div>
        </div>
      <div class="form-group row">
            <label class="col-md-3 form-control-label" for="select">所属地区</label>
            <div class="col-md-9">
                <select id="select" name="region_id" class="region_id" style="width: 280px;height:48px; border: 1px solid #ccc;" >
                <option value="0">请选择品牌</option>
                @foreach($region as $k=>$v)
                    <option @if($hotel->region_id==$v->region_id) selected @endif value="{{$v->region_id}}">{{$v->region_name}}</option>
                 @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="select">所在商圈</label>
            <div class="col-md-9">    
                <select id="select" class="xiala_" name="business_district_id" style="width: 280px;height:48px; border: 1px solid #ccc;" class="form-control">
                    <option value="0">手动输入</option>
                    <option selected value="{{$hotel->business_district_id}}">{{$hotel->business_district_name}}</option>
                </select><input type="text" id="text-input" style="width: 280px;height:48px; border: 1px solid #ccc; margin-left: 20px; font-size: 12px;" placeholder=" 没有找到？手动输入商圈" value="" name="business_district_name"><input type="hidden" name="business_id" value="{{$hotel->business_district_id}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="file-input">首页图片</label>
            <div class="col-md-9">
            	<img   style="width: 140px;height: 120px;" src="{{$hotel->hotel_img}}"/><br/>
                <input type="file" id="file-input" name="new_img"><input type="hidden" id="text-input" name="old_img" value="{{$hotel->hotel_img}}" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">酒店电话</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_tel" class="form-control" value="{{$hotel->hotel_tel}}" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">酒店传真</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_fax" class="form-control" value="{{$hotel->hotel_fax}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">详细地址</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="hotel_address" class="form-control" value="{{$hotel->hotel_address}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">酒店介绍</label>
            <div class="col-md-9">
                <textarea id="textarea-input" name="hotel_desc" rows="9" class="form-control" >{{$hotel->hotel_desc}}</textarea>
            </div>
        </div>
         <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">入住提示</label>
            <div class="col-md-9">
                <textarea id="textarea-input" name="hotel_hint" rows="9" class="form-control" >{{$hotel->hotel_hint}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">排　　序</label>
            <div class="col-md-9">
                <input type="text" id="text-input" name="sort" class="form-control" value="{{$hotel->hotel_tel}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">服务项目</label>
             <div class="col-md-9">                 
                @foreach($complexFacilities as $k=>$v)
                <label class="checkbox-inline" for="inline-checkbox1">
                    <input type="checkbox" <?php if(in_array($v->complex_facilities_id,$complex_facilities_id))echo 'checked'?> id="inline-checkbox1" name="complex_facilities_id[]" value="{{$v->complex_facilities_id}}"> {{$v->complex_facilities_name}}
                </label>　
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">客房设施</label>
            <div class="col-md-9">                 
                @foreach($roomsFacilities as $k=>$v)
                <label class="checkbox-inline" for="inline-checkbox1">
                    <input type="checkbox" <?php if(in_array($v->rooms_facilities_id,$rooms_facilities_id))echo 'checked'?> id="inline-checkbox1" name="rooms_facilities_id[]" value="{{$v->rooms_facilities_id}}"> {{$v->rooms_facilities_name}}
                </label>　
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">使用状态</label>
            <div class="col-md-9">
                <div class="radio">
                    <label for="radio1">
                        <input type="radio" id="radio1" @if($hotel->status == 1) checked @endif name="status" value="1">开启
                    </label>
                    <label for="radio2">
                        <input type="radio" id="radio2" @if($hotel->status == 0) checked @endif name="status" value="0">关闭
                    </label>
            </div>
        </div>
    
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
</div>
</form>

<link rel="stylesheet" type="text/css" href="/frname/houtai/css/city-select.css">
    <script src="https://cdn.bootcss.com/jquery/1.8.1/jquery.js"></script>
    <script type="text/javascript" src="/frname/houtai/js/citydata.min.js"></script>
    <script type="text/javascript" src="/frname/houtai/js/citySelect-1.0.0.min.js?v=1"></script>
    <script type="text/javascript">
        $('.region_id').change(function() {
            var region_id = $(this).val();
            $.ajax({
                type:'get',
                url: 'business_district',
                data:{region_id:region_id},
                dataType:'json',
                success:function(msg){
                   $(".xiala_").html('<option value="0">请选择商圈</option>');
                   $.each(msg,function( key, val ) {
                   $(".xiala_").append('<option value="'+val.business_district_id+'"">'+val.business_district_name+'</option>');
                   
                });
              }
            });
        });
        
    //     $(".xiala_").click(function(){
    //     var region_name = $(".city-info").text();
    //     alert(region_name);

    // });
            
    </script>
@endsection
@section('js')

@endsection