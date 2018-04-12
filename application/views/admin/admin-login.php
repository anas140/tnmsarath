<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>- Success Valley -</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
  </head>  
  <body>
  	<section class="full-wrapper">
  		<div class="wrapper">
			<span class="logo"><img src="<?php echo base_url();?>assets/files/assets/images/moinu.jpg"></span>
			<div class="wrapper2">
				<span class="sign">Sign in</span>
				<form action="<?php echo site_url('admin/home/home_page'); ?>" method="POST">	
					<input type="text" placeholder="Username" name="username" class="inpt1">
					<input type="password" placeholder="Password" name="password" class="inpt1">
					 <div class="form-group" style="color:#DD4B39;">  
				  	<?php 
					//echo $msg; 
					?> 
					</div> 
					<input type="submit" class="login" name="login"  value="Login" />
				</form>
				 
			</div><!-- wrapper2 -->
  		</div><!-- wrapper -->
  	</section><!-- full-wrapper -->
  </body>
 </html>  

