@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'ABC')
<!-- 左边菜单 -->
@section('sidebar')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')
<!-- <div class="col-md-6"> -->
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
            <label class="col-md-3 form-control-label" for="select">所属品牌</label>
            <div class="col-md-9">
                <select id="select" name="brand_id" style="width: 280px;height:48px; border: 1px solid #ccc;" >
                <option value="0">请选择品牌</option>
                @foreach($brand as $k=>$v)
                    <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                 @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">所属地区</label>
            <div class="col-md-9">
<!--下拉地区开始-->
        <div class="city-select" id="single-select-1">
            <div class="city-info">
                <div class="city-name">
                </div>
                <div class="city-input">
                    <input type="text" class="input-search" value="" placeholder="请选择城市" />
                </div>
            </div>
        </div>
<!--下拉地区（结束）-->
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="select">所在商圈</label>
            <div class="col-md-9">    
                <select id="select" class="xiala_" name="business_district_id" style="width: 280px;height:48px; border: 1px solid #ccc;" class="form-control">
                    <option value="0">请选择商圈</option>
                </select><input type="text" id="text-input" style="width: 280px;height:48px; border: 1px solid #ccc; margin-left: 20px; font-size: 12px;" placeholder=" 没有找到？手动输入商圈" name="business_district_name">
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
                @foreach($complexFacilities as $k=>$v)
                <label class="checkbox-inline" for="inline-checkbox1">
                    <input type="checkbox" id="inline-checkbox1" name="complex_facilities_id[]" value="{{$v->complex_facilities_id}}"> {{$v->complex_facilities_name}}
                </label>　
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="text-input">客房设施</label>
            <div class="col-md-9">                 
                @foreach($roomsFacilities as $k=>$v)
                <label class="checkbox-inline" for="inline-checkbox1">
                    <input type="checkbox" id="inline-checkbox1" name="rooms_facilities_id[]" value="{{$v->rooms_facilities_id}}"> {{$v->rooms_facilities_name}}
                </label>　
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">使用状态</label>
            <div class="col-md-9">
                <div class="radio">
                    <label for="radio1">
                        <input type="radio" id="radio1" checked name="status" value="1">开启
                    </label>
                    <label for="radio2">
                        <input type="radio" id="radio2" name="status" value="0">关闭
                    </label>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
<input type="hidden" value="" name="region_name" id="region_name">
    <button type="submit" class="btn btn-sm btn-primary" id="submit_"><i class="fa fa-dot-circle-o"></i> Submit</button>
    <button type="reset" onchange="" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
</div>
</form>
</div><!-- </div> -->

    <link rel="stylesheet" type="text/css" href="/frname/houtai/css/city-select.css">
    <script src="https://cdn.bootcss.com/jquery/1.8.1/jquery.js"></script>
    <script type="text/javascript" src="/frname/houtai/js/citydata.min.js"></script>
    <script type="text/javascript" src="/frname/houtai/js/citySelect-1.0.0.min.js?v=1"></script>
    <script type="text/javascript">
    $(function() {
        $("#submit_").click(function(){
        var region_name = $(".city-info").text();
        $("#region_name").val(region_name);

        });

        // 单选
        var singleSelect1 = $('#single-select-1').citySelect({
            dataJson: cityData,
            multiSelect: false,
            shorthand: true,
            search: true,
            onInit: function () {
                console.log(this)
            },
            onTabsAfter: function (target) {
                console.log(target)
            },
            onCallerAfter: function (target, values) {
                console.log(JSON.stringify(values))
            }
        });

        // 单选设置城市
        singleSelect1.setCityVal('北京市');

        // 单选
        var singleSelect2 = $('#single-select-2').citySelect({
            dataJson: cityData
        });

        // 单选设置城市
        singleSelect2.setCityVal('北京市');

        // 禁止点击显示的接口
        singleSelect2.status('readonly');

        //单选
        var singleSelect3 = $('#single-select-3').citySelect({
            dataJson: cityData
        });

        // 单选设置城市
        singleSelect3.setCityVal('广州市');

        // 禁止点击显示的接口
        singleSelect3.status('disabled');

        $(document).on('click','.caller', function() {
            var region_name = $(this).html();
            $.ajax({
                type:'get',
                url: 'business_district',
                data:{region_name:region_name},
                dataType:'json',
                success:function(msg){
                   $(".xiala_").html('<option value="0">请选择商圈</option>');
                   $.each(msg,function( key, val ) {
                   $(".xiala_").append('<option value="'+val.business_district_id+'"">'+val.business_district_name+'</option>');
                   
                });
              }
            });
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