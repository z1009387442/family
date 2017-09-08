@extends('magic.frname')
<!-- 页面标题 -->
@section('title', 'Gallery-list')
<!-- 左边菜单 -->
@section('sidebar')
    @parent
 
@endsection
<!-- 内容输入区 -->
@section('content')
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> 城市列表
            </div>
            <div class="card-block">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>城市名称</th>
                            <th>排序</th>
                            <th>浮动值</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $val)
                        <tr>
                            <td><font color="Gray">{{ $val->region_name }}</font></td>
                            <td><font color="Gray">{{ $val->sort }}</font></td>
                            <td><font color="Gray">{{ $val->floating_value }}</font>
                            </td>
                            <td>
                                    <font color="SkyBlue">
                                    <i class="fa fa-pencil-square fa-lg mt-2"></i> <a href="{{url('admin/region/region_save')}}?id=<?=$val->region_id?>">编辑</a>　   
                                    <!-- <i class="fa fa-trash fa-lg mt-2"></i> <a href="{{url('admin/region/region/id')}}/<?=$val->region_id?>">删除</a> -->
                                    </font>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
                <nav>
                   {!! $data->links() !!}
                </nav>
            </div>
        </div>
    </div>
    <!--/.col-->
</div>
@endsection