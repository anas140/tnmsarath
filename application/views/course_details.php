<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="TNM Online Solutions">
<title><?php echo @$course_details->course_seo_title ?> </title>
<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>design/images/ico/favicon-32.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">


<?php include 'header.php'; ?>

	<div class="banner_block" style="background-image: url(<?php echo base_url() ?>design/images/course.jpg);">
		<div class="canvas_area">
			<h1><?php echo @$course_details->course_name ?> </h1>
			<ul class="breadcrumb">
		        <li><a href="<?php echo base_url(); ?>">Home</a></li>
		        <li><a href=""><?php echo @$course_details->course_name ?> </a></li>
	        </ul>
		</div>
	</div>


	<div class="content_block">
		<div class="canvas_area">
			<div class="col-xs-12 col-md-8">
				<div class="content_area">
					<div class="course_detail_area">
						<!--<img src="<?php echo base_url() ?>design/images/course.jpg">-->
						<h1><?php echo @$course_details->course_name ?></h1>
						<p><?php echo @$course_details->course_content ?></p>
						
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="row" style="padding: 0px 15px 15px 15px;">
					<div class="hm_enquiry_area" id="enq_success" style="padding: 18px 25px; font-size: 15px; color: #f2f3f2; background: $fff; background: #ff6c2b; display: none;">Success! Your enquiry has been submitted successfully. We will get in touch with you as soon as possible!
					</div>
				</div>

				<div class="crs_enquiry_area">
					<h2>Enquire About the Course</h2>
					<form id="course_enq_form">
							<div class="field_area">
								<input type="text" name="name" placeholder="First name and last name">
							</div>
							<div class="field_area">
								<input type="text" name="email" placeholder="Email">
							</div>

							<div class="field_area">
								<input type="text" name="code" value="+971" class="c_code">
								<input type="text" name="phone" placeholder="Phone Number" class="ph_no">
							</div>

							<div class="field_area">
								<select name="course">
			                        <option value="">Select Course</option>
			                        <?php
			                        foreach($courses as $post)
				                    {
				                    	if($post->course_id == $course_details->course_id)
				                    		$checked = 'selected';
				                    	else
				                    		$checked = '';
				                        echo'<option value="'.$post->course_name.'"'.$checked.'>'.$post->course_name.'</option>';
				                    } ?>
				                </select>
							</div>

							<div class="field_area">
								<label class="custom-checkbox">
									<input name="tick_check" type="checkbox">
									<span class="custom-control-indicator"></span>
										Tick this box to receive emails relating to our new courses and promotions
								</label>
							</div>
							<input type="submit" name="" value="Submit" id="course_enq_submit">
						</form>
				</div>

			    <?php $related_course = @$this->course_model->get_course_by_category($course_details->course_category); ?>

			    <div class="crs_related_area">
			    	<h2>Related Courses</h2>
			    	<?php 
			    	foreach($related_course as $r_course) { 
			    		if ($r_course->course_id == $course_details->course_id) { continue; } ?>
				    	<div class="crs_related_box">
							<a href="<?php echo base_url($r_course->course_slug) ?>"><?php echo $r_course->course_name; ?></a>
						</div>
					<?php 
					} ?>
			    </div>
			    

				<a href="#" class="apply-online clearfix">
				    <div class="left clearfix"> 
				    <span class="icon">
				      <img src="<?php echo base_url() ?>design/images/project.svg" alt="">
				    </span> 
				    <span class="txt">View Students Projects</span> 
				    </div>
				    <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>s
			    </a>
				

				<a href="#" class="contact-online clearfix">
				    <div class="left clearfix"> 
				    <span class="icon">
				      <img src="<?php echo base_url() ?>design/images/info.svg" alt="">
				    </span> 
				    <span class="txt">Get More Info</span> 
				    </div>
			    	<div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>s
			    </a>


			</div>
		</div>
	</div>

	

	<div class="related_crs_block">
		<div class="canvas_area">
			<h2>Students Review</h2>
				<div id="owl-crs-testi" class="owl-carousel">
					<div class="item">
						<div class="crs_testi_area">
							<div class="crs_testi_box">
								<p>It was my great experience in Time Training Center for learning Revit MEP + BIM course and I received good support from my Trainer Mr. Mithun. I would also strongly recommend the training center to my friends and colleagues. Thank you so much Mr. Mithun.</p>
								<h3>Prabhakar m</h3>
								<h5>Autodesk Revit MEP</h5>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="crs_testi_area">
							<div class="crs_testi_box">
								<p>It was my great experience in Time Training Center for learning Revit MEP + BIM course and I received good support from my Trainer Mr. Mithun. I would also strongly recommend the training center to my friends and colleagues. Thank you so much Mr. Mithun.</p>
								<h3>Prabhakar m</h3>
								<h5>Autodesk Revit MEP</h5>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="crs_testi_area">
							<div class="crs_testi_box">
								<p>It was my great experience in Time Training Center for learning Revit MEP + BIM course and I received good support from my Trainer Mr. Mithun. I would also strongly recommend the training center to my friends and colleagues. Thank you so much Mr. Mithun.</p>
								<h3>Prabhakar m</h3>
								<h5>Autodesk Revit MEP</h5>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="crs_testi_area">
							<div class="crs_testi_box">
								<p>It was my great experience in Time Training Center for learning Revit MEP + BIM course and I received good support from my Trainer Mr. Mithun. I would also strongly recommend the training center to my friends and colleagues. Thank you so much Mr. Mithun.</p>
								<h3>Prabhakar m</h3>
								<h5>Autodesk Revit MEP</h5>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="crs_testi_area">
							<div class="crs_testi_box">
								<p>It was my great experience in Time Training Center for learning Revit MEP + BIM course and I received good support from my Trainer Mr. Mithun. I would also strongly recommend the training center to my friends and colleagues. Thank you so much Mr. Mithun.</p>
								<h3>Prabhakar m</h3>
								<h5>Autodesk Revit MEP</h5>
							</div>
						</div>
					</div>
				</div>
				<a href="">Read Reviews</a>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>


</body>
</html>