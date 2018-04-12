<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/font-awesome.css">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/edoxi.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/aos.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/owl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/top.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/plugin1.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>design/css/plugin.min.css">

<script src="<?php echo base_url() ?>design/js/modernizr.js"></script>
</head>


<body>
<div class="wrapper">
	
	<div class="header_block">
		<div class="header_top_block">
			<div class="canvas_area">
				<div class="header_top_left"><img src="<?php echo base_url() ?>design/images/ph.svg"> +971 2 6713828</div>
				<div class="header_top_right" data-toggle="modal" data-target="#myModal">Request a call back</div>
			</div>
		</div>

		<header class="main_head_block">
			<div class="canvas_area">
				<a href="<?php echo base_url() ?>" class="logo"><img src="<?php echo base_url() ?>design/images/logo.png" /></a>
				<div class="header_right">
					<div class="head_ph"><img src="<?php echo base_url() ?>design/images/ph.svg"> +971 2 6713828</div>
					<div class="head_call"><a href="#0" data-toggle="modal" data-target="#myModal">Request a call back</a></div>
				</div>
				<div class="header_search">
					<form method="post" action="<?php echo base_url('search'); ?>" class="top_search">
						<input type="text" name="search_item" placeholder="Search for Course ....">
						<input type="submit" name="" value="">
					</form>
				</div>
		</header>
				
		<div class="main_menu_area">
			<div id='cssmenu'>
				<ul>
					<li><a href='<?php echo base_url(); ?>'><span>Home</span></a></li>
					<li><a href=''><span>About Us</span></a></li>
					<li class="has-sub"><a href="#0" rel='course_drop'><span>Courses</span></a>
						<ul id="course_drop">
							<?php 
							foreach($category as $cat) { 

							$course_name = $this->course_model->get_course_by_category($cat->category_id); ?>
							<li class="sub-has-child"><a href='#0' rel="eng_drop"><span><?php echo $cat->category_name; ?></span></a>
								<ul id="eng_drop">
									<?php 
									foreach($course_name as $course) { ?>
										<li><a href='<?php echo base_url($course->course_slug) ?>'><span><?php echo $course->course_name; ?></span></a></li>
									<?php } ?>
									
								</ul>
							</li>
							<?php } ?>
						</ul>	
							
					<li><a href=''><span>Blog</span></a></li>
					<li><a href=''><span>Corporate Training</span></a></li>
					<li><a href=''><span>Testimonials</span></a></li>
					<li><a href=''><span>Contact</span></a></li>
				
			</div>
		</div>
	</div>