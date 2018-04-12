  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SV</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Success Valley</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <?php if($this->session->userdata('admin_id'))
            {?>
            <a href="<?php echo site_url('admin/home/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a>
            <?php
            } 
            else{
              echo "error";
            }
            ?>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
    <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/images/avatar.png" class="img-circle">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <ul class="sidebar-menu">
      <li><?php echo anchor('admin/home/slider','<i class="fa fa-folder"></i> Slider');?></li>
        <li><?php echo anchor('admin/home/about','<i class="fa fa-folder"></i> About');?></li>
        <li><?php echo anchor('admin/home/category','<i class="fa fa-folder"></i> Category');?></li>
        <li><?php echo anchor('admin/home/events','<i class="fa fa-folder"></i> Events');?></li>
        <li><?php echo anchor('admin/home/blog','<i class="fa fa-registered"></i> Blog');?></li>
        
         <li><?php echo anchor('admin/home/testimonial','<i class="fa fa-registered"></i> Testimonial');?></li>
         <li><?php echo anchor('admin/home/vdo_testimonial','<i class="fa fa-registered"></i> Vdo Testimonial');?></li>
       
        <li><?php echo anchor('admin/home/course','<i class="fa fa-folder"></i> Courses');?></li>
        <!--<li><?php //echo anchor('admin/home/menu','Menu Structure');?></li>-->
        <!-- <li><?php echo anchor('admin/home/batch','<i class="fa fa-registered"></i> Upcoming Batches');?></li> -->
        <!--<li><?php echo anchor('admin/home/batch_register','<i class="fa fa-registered"></i> Upcoming Batch Register');?></li>-->
        <!--<li><?php echo anchor('admin/home/blog','<i class="fa fa-registered"></i> Blog');?></li>-->
        <li><?php echo anchor('admin/home/enquiry','<i class="fa fa-envelope"></i> Enquiries');?></li>
        <li><?php echo anchor('admin/home/faq','<i class="fa fa-envelope"></i> Faq');?></li>
        <li><?php echo anchor('admin/home/instructor_profile','<i class="fa fa-envelope"></i> Instructor Profile');?></li>
          <li><?php echo anchor('admin/home/instructor_profile','<i class="fa fa-envelope"></i> Package');?></li>
        <!--<li><?php echo anchor('admin/home/testimonial','<i class="fa fa-envelope"></i> Students Review');?></li>-->
        <!--<li><?php echo anchor('admin/home/header_menu','<i class="fa fa-folder"></i> Header Menu');?></li>-->
        <!--<li><?php echo anchor('admin/home/footer_menu','<i class="fa fa-folder"></i> Footer Menu');?></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>