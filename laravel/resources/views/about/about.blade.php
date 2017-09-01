@extends('magic.qiantai')
<!-- 页面标题 -->
@section('title', 'ABC')
<!-- 左边菜单 -->
@section('header')
    @parent
@endsection
<!-- 内容输入区 -->
@section('content')

<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">About</li>
     </ul>
   </div>
   <div class="about">
   	  <div class="col-md-6 about_left">
   	  	<!-- <img src="/uploads/b50789804fc1c1f75ec500251bd83290.jpg" class="img-responsive" alt=""/> -->
   	  	<img src="/uploads/b50789804fc1c1f75ec500251bd83290.jpg" width="1200" height="600" />
   	  </div>
   	  <!-- <div class="col-md-6 about_right">
   	  	<h1>About us</h1>
   	  	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
   	  	<div class="accordation">
		   <div class="jb-accordion-wrapper">
				<div class="jb-accordion-title">Accordion 1 <button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion-1-"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				<!-- </p><div id="accordion-1-" class="jb-accordion-content collapse in" style="height: auto;">
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae...</p>
				</div>
				<p> --><!-- /.collapse --></p>
			<!-- </div>
			<div class="jb-accordion-wrapper">
				<div class="jb-accordion-title">Accordion2 <button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion2-"><i class="fa fa-angle-down"> </i></button></div>
				<p> --><!-- /.accordion-title -->
				<!-- </p><div id="accordion2-" class="jb-accordion-content collapse ">
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt </p>
				</div> -->
				<p><!-- /.collapse --></p>
			<!-- </div>
			<div class="jb-accordion-wrapper">
				<div class="jb-accordion-title">Accordion3<button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion3"><i class="fa fa-angle-down"> </i></button></div>
				<p><!-- /.accordion-title -->
				<!-- </p><div id="accordion3" class="jb-accordion-content collapse ">
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt </p>
				</div> --> -->
<!-- 				<p>/.collapse</p>
			</div> -->
		<!-- </div> -->
   	  <!-- </div> -->
   	  <div class="clearfix"> </div>
   </div>
  </div>
</div>
<!-- <div class="about_middle">
	<div class="container">
	  <h2>Happy Clients</h2>
	  <div class="about_middle-grid1">
		
		
		<div class="clearfix"> </div>
	  </div>
	  <div class="about_middle-grid2">
		<div class="col-sm-6 testi_grid list-item-0">
			<blockquote class="testi_grid_blockquote">
				<figure class="featured-thumbnail">
					<img src="images/a1.jpg" class="img-responsive" alt=""/>
				</figure>
				<div><a href="#">Aenean nonummy hendrerit mau phasellu porta. Fusce suscipit varius mi sed. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.…</a>
				<div class="clearfix"></div>
				</div>
			</blockquote>
		    <small class="testi-meta"><span class="user">Eiusmod tempor incididunt</span></small>
		</div>
		<div class="col-sm-6 testi_grid list-item-1">
			<blockquote class="testi_grid_blockquote">
				<figure class="featured-thumbnail">
					<img src="images/a2.jpg" class="img-responsive" alt=""/>
				</figure>
				<div><a href="#">Aenean nonummy hendrerit mau phasellu porta. Fusce suscipit varius mi sed. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.…</a>
				<div class="clearfix"></div>
				</div>
			</blockquote>
			<small class="testi-meta1"><span class="user">Sint occaecat </span></small>
		</div>
		<div class="clearfix"> </div>
	  </div>
	</div>
</div> -->
<div class="about_bottom">
	<div class="container">
		<h3>Team</h3>
		<?php foreach($list as $k=>$v){ ?>
	   <div class="col-md-3 about_grid1">
		  <ul class="posts-grid our-team">
			<li class="list-item-1">
				<figure class="thumbnail_1 thumbnail">
					<a href="#"><img src="{{$v->team_images}}"  class="img-responsive" alt=""/></a>
					<div class="post_networks">
						<ul>
							<li class="network_0"><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
			    </figure>
			    <div class="desc">
			    	<h4><a href="#">{{$v->team_name}}</a></h4>
			    	<p>{{$v->team_desc}}</p>
			    </div>
			 </li>
	       </ul>
	   </div>
	   <?php } ?>
	  
	   <div class="clearfix"> </div>
	</div>
</div>
<!-- <div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div> -->



@endsection

@section('footer')
	@parent
@endsection