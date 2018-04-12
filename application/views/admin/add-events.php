<!DOCTYPE html>
<html lang="en">

<head>
    <title>Success Valley</title>
    <?php require_once('includes/common-css.php');?>
    <style type="text/css">
          #map{     width: 451px !important;height: 332px !important; }
        </style>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8svOfLUwCNBV-kNMhZKF66srk0XJbdYI&callback=initMap"
  type="text/javascript"></script>
    </head>
    <style>
        .btn-rounded {
            border-radius: 50%;
        }
    </style>

<body onload="codeAddress()">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
          #map{     width: 570px;height: 400px; }
        </style>
        <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->
        <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8svOfLUwCNBV-kNMhZKF66srk0XJbdYI&callback=initMap"
        type="text/javascript"></script>-->
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
           
         <!----header start------->
           <?php require_once('includes/header.php');?>
            <!--header ending-->
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                      <!--start left sidebar-->
                 <?php require_once('includes/left-sidebar.php');?>
                    <!---left side bar---->
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Events</h5>
                                            <p class="m-b-0" style="opacity:0">Lorem Ipsum is simply dummy text of the printing</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!--<ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Ready To Use</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Job Application Form</a>
                                            </li>
                                        </ul>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Job application card start -->
                                                <div class="card">
    <div class="card-header">
        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                <h4><?= $this->session->flashdata('message'); ?></h4>
            </div>
        <?php endif; ?>

        <?php if(!empty($single_event[0])): ?>
            <h4 class="box-title" style="color:#448aff";>Edit Event</h4>
        <?php else: ?>
            <h4 class="box-title" style="color:#448aff";>Add Event</h4>
        <?php endif; ?>
        <span></span>
    </div>
    <div class="card-block">
        <div class="j-wrapper ">
            <?php if(!empty($single_event[0])): ?>
                <form action="<?php echo base_url('admin/home/event_edit/'.$single_event[0]->event_id); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" >
            <?php else: ?>
                <form action="<?php echo base_url('admin/home/add_events'); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" novalidate>
            <?php endif; ?>
            <div class="j-content">
                <div class="j-row">
                    <div class="j-span6 j-unit">
                        <div class="j-input">
                            <select name="event_category" class="form-control">
                                <option value="" disabled="disabled">Event Category</option>
                                <?php foreach($category as $categories): ?>
                                    <option value="<?= $categories->category_id; ?>" 
                                    <?php if(@$single_event[0]->event_category == @$categories->category_id){?> selected="selected" <?php }?>> 
                                        <?= $categories->category_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="j-tooltip j-tooltip-right-top">Event Category</span>
                        </div>
                    </div>
                <div class="j-span6 j-unit">
                    <div class="j-input">
                        <input type="text" id="first_name" name="event_name" placeholder="Event Name" value="<?php echo @$single_event[0]->event_name ?>">
                        <span class="j-tooltip j-tooltip-right-top">Event Name</span>
                    </div>
                </div>
            </div>
            <div class="j-row">
                <div class="j-span6 j-unit">
                    <div class="j-input">
                        <input id="dropper-default" class="form-control" type="text" placeholder="Event Start Date" name="event_start_date" value="<?php echo @$single_event[0]->event_start_date ?>" />
                        <span class="j-tooltip j-tooltip-right-top">Event Start Date</span>
                    </div>
                </div>
                <div class="j-span6 j-unit bootstrap-timepicker">
                    <div class="j-input">
                        <input type="text"  name="event_start_time" class="timepicker" placeholder="Event Start Time"  id="pick1" value="<?php echo @$single_event[0]->event_start_time ?>">
                        <span class="j-tooltip j-tooltip-right-top">Event Start Time</span>
                    </div>
                </div>
            </div>
            <div class="divider gap-bottom-25"></div>
            <div class="j-row">
                <div class="j-span6 j-unit">
                    <div class="j-input">
                        <input id="dropper-format" class="form-control" type="text" name="event_end_date" placeholder="Event End Date" value="<?php echo @$single_event[0]->event_end_date ?>"/>
                        <span class="j-tooltip j-tooltip-right-top">Event End Date</span>
                    </div>
                    </div>
                        <div class="j-span6 j-unit bootstrap-timepicker">
                            <div class="j-input ">
                                <input type="text"  id="pick2" name="event_end_time" class="timepicker" placeholder="Event End Time" value="<?php echo @$single_event[0]->event_end_time ?>">
                                <span class="j-tooltip j-tooltip-right-top">Event End Time</span>
                            </div>
                        </div>
                    </div>
                    <div class="divider gap-bottom-25"></div>
                        <div class="j-row">
                            <div class="j-span6 j-unit">
                                <div class="j-input">
                                    <input type="text" id="first_name" name="event_contact_person" placeholder="Organizer Name" value="<?php echo @$single_event[0]->event_contact_person ?>">
                                    <span class="j-tooltip j-tooltip-right-top">Organizer Name</span>
                                </div>
                            </div>
                            <div class="j-span6 j-unit">
                                <div class="j-input">
                                    <input type="text" id="first_name" name="event_phone" placeholder="Contact Phone" value="<?php echo @$single_event[0]->event_contact_phone ?>">
                                    <span class="j-tooltip j-tooltip-right-top">Contact Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="j-row">
                            <div class="j-span6 j-unit">
                                <div class="j-input">
                                    <input type="text" id="first_name" name="event_email" placeholder="Contact Email" value="<?php echo @$single_event[0]->event_contact_email ?>">
                                    <span class="j-tooltip j-tooltip-right-top">Contact Email</span>
                                </div>
                            </div>
                            <div class="j-span6 j-unit">
                                <div class="j-input j-append-small-btn">
                                    <div class="j-file-button">
                                        Browse
                                        <input type="file" name="event_image" onchange="document.getElementById('file1_input').value = this.value;">
                                    </div>
                                    <input type="text" id="file1_input" readonly="" placeholder="Add Event Image">
                                    <?php if(!empty($single_event[0])){?>
                                        <img  src="<?php echo base_url();?>uploads/events/<?php echo  $single_event[0]->event_image; ?>" width="100" height="100">
                                    <?php } ?>
                                    <input type="hidden" name="temp_img" value="<?php echo @$single_event[0]->event_image; ?>">
                                    <?php echo form_error('event_image','<p class="help-block error_msg">','</p>'); ?>
                                    <span class="j-tooltip j-tooltip-right-top">Event Image</span>
                                </div>
                            </div>
                        </div>
                        <div class="j-row">
                        <?php if(!empty($single_event[0]->event_location)) { ?>
                            <div class="j-span6 j-unit">
                                <div class="j-input">
                                    <label>Event Location</label>
                                    <input id="address" type="text" name="event_location" placeholder="Event Location" value="<?php echo @$single_event[0]->event_location;?>">
                                    <input type="button" value="Geocode" onclick="codeAddress()">
                                    <span class="j-tooltip j-tooltip-right-top">Event Location</span>
                                    <div id="map"></div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="j-span6 j-unit">
                                <div class="j-input">
                                    <label>Event Location</label>
                                    <input id="address" type="text" value="kannur" name="event_location" placeholder="Event Location">
                                    <input type="button" value="Geocode" onclick="codeAddress()">
                                    <span class="j-tooltip j-tooltip-right-top">Event Location</span>
                                    <div id="map"></div>
                                </div>
                            </div> <?php } ?>
                            <div class="j-span6 j-unit">
                                <div class="j-input">
                                    <h4 class="sub-title">Event Description</h4>
                                    <textarea type="text" id="editor1" name="event_description" placeholder="Event Description">
                                        <?php echo @$single_event[0]->event_description ?>
                                    </textarea>
                                    <span class="j-tooltip j-tooltip-right-top">Event Description</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php if(empty($single_event[0])) { ?>
                                <div class="j-row wrappers">
                                    <h5 class="sub-title">Seat Management</h5>
                                    <div class="j-span3 j-unit">
                                        <div class="j-input">
                                            <input type="text" id="first_name" name="seat_type[]" placeholder="Seat Type" value="">
                                            <span class="j-tooltip j-tooltip-right-top">Seat Type</span>
                                        </div>
                                    </div>
                                    <div class="j-span3 j-unit">
                                        <div class="j-input">
                                            <input type="text" id="first_name" name="seat_rate[]" placeholder="Rate" value="">
                                            <span class="j-tooltip j-tooltip-right-top">Rate</span>
                                        </div>
                                    </div>
                                    <div class="j-span3 j-unit">
                                        <div class="j-input">
                                            <input type="text" id="first_name" name="no_seat[]" placeholder="No Seat " value="">
                                            <span class="j-tooltip j-tooltip-right-top">No Of Seat</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <a href="javascript:void(0);" class="add_button sarath" title="Add field" style="margin-top: 26px;float: left;">Add More Seatss</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if(!empty($single_event[0])): ?>
                                    <div class="j-row wrappers">
                                        <div class="row">
                                            <div class="col-md-9 j-unit"><h5 class="sub-title">Seat Management</h5></div>
                                            <a href="javascript:void(0);" class="add_button" title="Add field" style="margin-top: 26px;float: left;">Add More Seats</a>
                                        </div>
                                        
                                        <?php foreach($seats as $seat): ?>
                                        <div class="temp" style="width: 100%; float: left;" data-id="">
                                            <!-- .col-md -->
                                            <input type="hidden" name="seat_id[]" value="<?= $seat['seat_id'] ?>">
                                            <!-- <div class="j-span3 j-unit">
                                                <?= $seat['seat_id'] ?>
                                            </div> -->
                                            <div class="j-span3 j-unit">
                                                <div class="j-input">
                                                    <!-- <label for="">Seat Type</label> -->
                                                    <input type="text" name="seat_type[]" id="" placeholder="Seat Type" value="<?= $seat['seat_type'] ?>" >
                                                    <span class="j-tooltip j-tooltip-right-top">
                                                        Seat Type
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="j-span3 j-unit">
                                                <div class="j-input">
                                                    <!-- <label for="">Seat Rate</label> -->
                                                    <input type="text" name="seat_rate[]" id="" placeholder="Seat Type" value="<?= $seat['seat_rate'] ?>" >
                                                    <span class="j-tooltip j-tooltip-right-top">
                                                        Seat Rate
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="j-span3 j-unit">
                                                <div class="j-input">
                                                    <!-- <label for="">No Of Seats</label> -->
                                                    <input type="text" name="no_seat[]" id="" placeholder="No Of Seats" value="<?= $seat['seat_total'] ?>" >
                                                    <span class="j-tooltip j-tooltip-right-top">
                                                        No of Seats
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="j-span3 j-input">
                                                <div class="btn btn-rounded btn-danger" data-id="<?= $seat['seat_id'] ?>">-</div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                                        
                                     </div>
                                <?php endif; ?>
                                <!--<?php if(!empty($seat_type)) { 
                                    for($i=0; $i<count($seat_type); $i++) { ?>
                                        <div class="j-span3 j-unit">
                                            <div class="j-input">
                                                <input type="text" id="first_name" name="seat_type[]" placeholder="Seat Type" value="<?php if(!empty($seat_type)) { echo @$seat_type[$i]->seat_type;} ?>">
                                                <span class="j-tooltip j-tooltip-right-top">Seat Type</span>
                                            </div>
                                        </div>
                                        <div class="j-span3 j-unit">
                                            <div class="j-input">
                                                <input type="text" id="first_name" name="seat_rate[]" placeholder="Rate" value="<?php if(!empty($seat_type)) { echo @$seat_type[$i]->seat_rate;} ?>">
                                                <span class="j-tooltip j-tooltip-right-top">Rate</span>
                                            </div>
                                        </div>
                                        <div class="j-span3 j-unit">
                                            <div class="j-input">
                                                <input type="text" id="first_name" name="no_seat[]" placeholder="No Of Seat " value="<?php if(!empty($seat_type)) { echo @$seat_type[$i]->seat_total;} ?>">
                                                <span class="j-tooltip j-tooltip-right-top">No Of Seat</span>
                                            </div>
                                        </div>
                                    <?php } } ?> -->
                                        <!-- <div class="col-md-2">
                                            <div class="form-group">
                                                <a href="javascript:void(0);" class="add_button" title="Add field" style="margin-top: 26px;float: left;">Add More Seats</a>
                                            </div>
                                        </div> --> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="j-span6 j-unit">
                     <!--<div class="j-input j-append-small-btn">
                                                                                <div class="j-file-button">
                                                                                    Browse
                                                                                    <input type="file" name="featured_image" onchange="document.getElementById('file1_input').value = this.value;">
                                                                                </div>
                                                                                <input type="text" id="file1_input" readonly="" placeholder="Add featured Images">
                                                                                <?php if(!empty($single_event[0])){?>
                                                <img  src="<?php echo base_url();?>uploads/events/<?php echo  $single_event[0]->featured_image; ?>" width="100" height="100">
                                                <?php } ?>
                                                 <input type="hidden" name="temp_img" value="<?php echo @$single_event[0]->featured_image; ?>">
                            <?php echo form_error('featured_image','<p class="help-block error_msg">','</p>'); ?>
                                                                               <span class="j-tooltip j-tooltip-right-top">featured Images</span>
                                                                            </div> -->
                                                                        </div>


                                                                                  <div class="col-md-4">
                                            <h5>Featured Event Images  </h5> (Size : 900x500)
                                              <div id="formdiv" style="width: 50px;">          
                                                <div id="filediv"><input name="slider_images[]" type="file" id="file"><br/></div><br>
                                                <input type="button" id="add_more" class="upload" value="Add More Files"/> 

                                              </div>                                           
                                            </div>

                                            <?php
                                            if(!empty($single_event[0]->featured_image))
                                             {
                                                $images = unserialize($single_event[0]->featured_image);
                                               foreach ($images as $key => $value) {?>
                                            
                                            <div class="img_div">
                                            <li style="list-style: none; display:inline; margin-left:7px; float:left;" class="img_div">
                                              <img src="<?php echo base_url();?>uploads/events/<?php echo $value;?>" style="width:50px">
                                              <p><a href="#" style="cursor: pointer;margin-left: 10px;" class="dlt_img" data-type="<?php echo $value;?>" data-id="<?php echo $single_event[0]->event_id;?>">Remove</a></p>

                                               
                                             </li></div>
                                              <?php
                                              
                                               }
                                             }
                                              ?>  
                                                                    </div>
                                         <!--map div-->
                                    <div class="j-row">
                                      
                                      
                                        <div class="col-md-6">
                                      
                                        <div class="col-md-6">
                                                <!-- <form method="post"> -->
                                                    <div class="form-group">
                                                    <label>lat : </label>
                                                    <input type="text" id="lat" value="<?php echo @$single_event[0]->event_location_lat; ?>" name="location_latitude" readonly="yes">
                                                    </div>
                                                    <div class="form-group">
                                                    <label>Lng : </label>
                                                    <input type="text" id="lng" value="<?php echo @$single_event[0]->event_location_lng; ?>" name="location_longitude" readonly="yes">
                                                    </div>
                                                <!-- </form> -->
                                        </div>
                                        </div>
                                    </div>
                                        
                                                                    <!-- end files -->
                                                                    <!-- start response from server -->
                                                                    <div class="j-response"></div>
                                                                    <!-- end response from server -->
                                                               
                                                                <!-- end /.content -->
                                                                <div class="j-footer">
                                                                <?php
                                                                if(!empty($single_event[0]))
                                                                 {
                                                                    echo '<button type="submit" class="btn btn-primary">Update</button>';
                                                                 }
                                                                 else
                                                                 {
                                                                    echo '<button type="submit" class="btn btn-primary">Save</button>';
                                                                 }
                                                                 ?>
                                                                    <button type="reset" class="btn btn-default m-r-20">Cancel</button>
                                                                </div>
                                                                <!-- end /.footer -->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Job application card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                
                    </div>
                                                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row" style="margin-top: -74px;">
                                            <div class="col-sm-12">
                                      
                                                <!-- Multi-column table start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                       <h4 class="box-title" style="color:#448aff";>View Events</h4>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                <th>#</th>
                                                                <th>Event Name</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Location</th>
                                                                <th>Image</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                                <th>More</th>
                                                                                                             
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <?php 
                    if (!empty($events)) {
                    $i=0;
                    foreach($events as $post){
                    $i++;
                    if($post->event_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->event_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
                                                                <tr>
                                                                <td><?php echo $i;?></td>
                                                                   <td><?php echo $post->event_name;?></td> 
                                                                    <td><?php echo $post->event_start_date;?></td>
                                                                    <td><?php echo $post->event_end_date;?></td>
                                                                    <td><?php echo $post->event_location;?></td>
                                                                    <td><img style="width:100px;height:100px;" src="<?php echo base_url();?>uploads/events/<?php echo $post->event_image;?>"></td>
                                                                   <td> <input name="status-change" id="status_change" data-status="<?php echo $post->event_status;?>" data-id=<?php echo $post->event_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> /> </td>
                                                                   <td>
                                                                 
                                                                    <a href="<?php echo base_url();?>admin/home/event_edit/<?php echo $post->event_id;?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png"></a>
                                                                   <a data-toggle="modal" href="#Delete_Log" class="delete_option " data-id="<?php echo $post->event_id;?>"><img src="<?php echo base_url(); ?>assets/images/delete.png"></a>
                                                                   </td>
                                                                    <td><a data-toggle="modal" title=" View More" data-target="#myModal<?php echo $post->event_id;?>" href="javascript:void(0);"  >More</a></td>
                                                                </tr>
            <!-- view popupModal -->
   <div class="modal fade" id="myModal<?php echo $post->event_id;?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="height: 250px;">
        <div class="modal-header">
          
          <h4 class="modal-title">View Details</h4>
        </div>
        <div class="modal-body">
        <div class="col-md-12">
            <div class="col-md-3">
                <center> <p>Event Start Time</p>
                <h4></h4><?php echo $post->event_start_time;?> </center>.
            </div>
              <div class="col-md-3">
                <center> <p>Event End Time</p>
                <h4></h4><?php echo $post->event_end_time;?> </center>.
            </div>
              <div class="col-md-3">
                <center> <p>Contact Person</p>
                <h4></h4><?php echo $post->event_contact_person;?> </center>.
            </div>
              <div class="col-md-3">
                <center> <p>Contact Phone</p>
                <h4></h4><?php echo $post->event_contact_phone;?> </center>.
            </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-3">
                <center> <p>Contact Email</p>
                <h4></h4><?php echo $post->event_contact_email;?> </center>.
            </div>
            <!--<div class="col-md-3">
                <center> <p>Event Description</p>
                <h4></h4><?php echo $post->event_description;?> </center>.
            </div>-->
            
       
        

        </div>
       
      </div>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>                                                      
  </div>                                                                                                           <?php
                    }
                    }
                    ?>
                                                                   
                                                                </tbody>
                                                            
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Multi-column table end -->
                                             
                                     
                                 
                                      
                                       
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                           
                       
                        </div>
                    </div>
                    <!-- Main-body end -->
                    
                    
                    <!--<div id="styleSelector">
                        
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Event delete confirmation modal -->
      <div class="modal fade" id="Delete_Log" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
     
        <h4 class="modal-title" id="myModalLabel">Delete Event</span> ?</h4>
      </div>
      <div class="modal-body">
        Do you want to delete selected Event ?<br/>
        This Process cannot be Rolled Back
      </div>
        <form name="frm_delete_sale" id="frm_delete_sale" action="<?php echo base_url(); ?>admin/home/event_delete/" method="POST">
          <input type="hidden" name="event_id" id="event_id" value=""/>
          <div class="modal-footer">
            <button type="submit" name="btn_delete_event" id="btn_delete_event" value="Delete" class="btn btn-danger btn-flat">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php require_once('includes/common-js.php');?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>-->
<!-- status change-->
<script type="text/javascript">
$(document).ready(function()
{
  $("[name='status-change']").bootstrapSwitch();
  $('input[name="status-change"]').on('switchChange.bootstrapSwitch', function(event, state) {
  var this_=$(this);
  var id=$(this).data('id');
  var status=$(this).data('status');

  $.ajax({
    type: 'POST',
    url: '<?php echo base_url('index.php/admin/home/event_status/'); ?>',
    beforeSend: function(){$('input[name="status-change"]').bootstrapSwitch('toggleDisabled', true, true);},
    //complete: function(){},
    data: {id: id,status: status},
    success: function(html)
    {
        $('input[name="status-change"]').bootstrapSwitch('toggleDisabled', false, false);
    }
    });
  });

});

</script>
<script>
$('.delete_option').click(function()
{
$('#event_id').val($(this).data('id'));
});
</script>
<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
$('#pick1').timepicker({
    defaultTime: 'current',
    minuteStep: 1,
    disableFocus: true,
    template: 'dropdown'
});
</script>
<script>
$('#pick2').timepicker({
    defaultTime: 'current',
    minuteStep: 1,
    disableFocus: true,
    template: 'dropdown'
});
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    CKEDITOR.replace('editor1');
  });
</script>
<script>
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'slider_images[]', type: 'file', id: 'file'}),        
                $("<br/>")
                ));
    });

//following function will executes on change event of file input to select different file   
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
                
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src='' style='width:100px'/></div>");
               
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
                $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: '<?php echo base_url()?>assets/images/x.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

});
</script>
<script type="text/javascript">

//delete image
$('.dlt_img').click(function() {
  var type  = $(this).data("type");
  var this_ = $(this).parents('.img_div'); 
  var id=$(this).data("id"); 
        $.ajax({
        type: 'POST',
        url: '<?php echo site_url(); ?>/admin/home/remove_image',
      data: {
          type: type,
          id: id
        },
      beforeSend: function(){$('.image-loading-div').addClass('image-loading_icon');},
      complete: function(){$('.image-loading-div').removeClass('image-loading_icon');},
      success: function(response) {
        
            if(response==1000)
      {this_.remove();}       
        }
   });
});
</script> 

<!---add more seat------>
<script type="text/javascript">

    $(document).ready(function(){
        $('.add_button').click(function() {
            var maxField = 10;
            var x = 1;

            $.ajax({
               type: "POST",
               url: "/success/admin/home/add_branch",
               success: function(html) 
               {
                   var response=JSON.parse(html);  
                   $('.wrappers').append(response['fieldHTML']);
               }
            });
            
        }); 

    });
</script>
<!---close add more seat-->  
<!--remove seat cancel---->
<script type="text/javascript">

//delete image
//$('.remove_button').click(function() {
    $('body').on('click', '.remove_button', function(){
    alert("hai");
    var type  = $(this).data("type");
    var this_ = $(this).parents('.img_div'); 
   var id=$(this).data("id"); 
        $.ajax({
        type: 'POST',
        //url: '<?php echo site_url(); ?>/admin/home/remove_image',
      data: {
          type: type,
          id: id
        },
      beforeSend: function(){$('.image-loading-div').addClass('image-loading_icon');},
      complete: function(){$('.image-loading-div').removeClass('image-loading_icon');},
      success: function(response) {
        
            if(response==1000)
      {this_.remove();}       
        }
   });
});
    // $(".btn-rounded").on('click', fumction(e) {
    //     alert('delete');
    //     if(confirm('Are you sure want to delete these seat')) {
    //         alert('deleted');
    //     }
    // })
    $('body').on('click', '.btn-rounded', function(e) {
        _this = $(this);
        if(confirm('Are You sure want to delete this seat')) {
            //$(this).closest('.temp').remove();
            $.ajax({
                url: '/success/admin/home/deleteSeat',
                method: 'POST',
                data: {id: $(this).data('id')},
                success: function(response) {
                    console.log(response);
                    if(response==1) {
                       _this.closest('.temp').remove();
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            })
        }
    })
</script> 
<script>
$(function() {
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 1000)
}, 1000);
});
</script>
<!--close remove seat cancel--->
</body>

</html>