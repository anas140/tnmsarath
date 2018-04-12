<!DOCTYPE html>
<html lang="en">

<head>
    <title>Success Valley</title>
      <?php require_once('includes/common-css.php');?>
</head>

<body>
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
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
        <!----header start------->
           <?php require_once('includes/header.php');?>
			<!--header ending-->

         
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
                                            <h5 class="m-b-10">Booked Events</h5>
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
                                                    <?php
                                                      if($this->session->flashdata('message')){ ?>
        <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                                                     <h4><?php
                                                       echo $this->session->flashdata('message');?></h4>
                                                      
                                                       </div>

                                                       <?php
                                                   }
                                                   ?>
                                                       <h4 class="box-title" style="color:#448aff";>View Bookings</h4>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                       <th>#</th>
                                                                       <th>Booking Event Name</th> 
																		<th>Booking User</th>
                                                                        <th>Booking Date</th>
																		<th>Status</th>
                                                                        <th>Action</th>
                                                                        <th>More</th>				  
																													 
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
				 <?php
                    if (isset($all_bookings)) {
                    $i=0;
                    foreach($all_bookings as $post){
                    $i++;
                        if($post->booking_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->booking_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }                   
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $post->booking_event_name;?></td>
                        <td><?php echo $post->register_firstname;?></td>
                        <td><?php echo $post->booking_date;?></td>
                        <td><input name="status-change" id="status_change" data-status="<?php echo $post->booking_status;?>" data-id=<?php echo $post->booking_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> /> </td>
                        <td> <a data-toggle="modal" href="#Delete_Log" class="delete_option" data-id="<?php echo $post->booking_id;?>" >
                            <img src="<?php echo base_url(); ?>assets/images/delete.png"></span>
                              </a></td> 
                                 <td><a data-toggle="modal" title=" View More" data-target="#myModal<?php echo $post->booking_id;?>" href="javascript:void(0);"  >More</a></td>
                    </tr>
                                                <!-- view popupModal -->
   <div class="modal fade" id="myModal<?php echo $post->booking_id;?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="height: 293px;">
        <div class="modal-header">
          
          <h4 class="modal-title">Booking Details</h4>
        </div>
        <div class="modal-body">
        <div class="col-md-12">
            <div class="col-md-3">
                <center> <p>Booking User First Name</p>
                <h4></h4><?php echo $post->booking_user_firstname;?> </center>.
            </div>
              <div class="col-md-3">
                <center> <p>Booking User Last Name</p>
                <h4></h4><?php echo $post->booking_user_lastname;?> </center>.
            </div>
               <div class="col-md-3">
                <center> <p>Booking User Address</p>
                <h4></h4><?php echo $post->booking_user_address;?> </center>.
            </div>
               <div class="col-md-3">
                <center> <p>Booking User Phone</p>
                <h4></h4><?php echo $post->booking_user_mobile;?> </center>.
            </div>
            </div>
            <div class="col-md-12">
              <div class="col-md-3">
                <center> <p>Booking User Email</p>
                <h4></h4><?php echo $post->booking_user_email;?> </center>.
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
  </div>
                    <?php
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
<!-- booking delete confirmation modal -->
      <div class="modal fade" id="Delete_Log" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="myModalLabel">Delete Bookings</span> ?</h4>
      </div>
      <div class="modal-body">
        Do you want to delete selected Bookings ?<br/>
        This Process cannot be Rolled Back
      </div>
        <form name="frm_delete_sale" id="frm_delete_sale" action="<?php echo base_url(); ?>admin/home/booking_delete/" method="POST">
          <input type="hidden" name="booking_id" id="booking_id" value=""/>
          <div class="modal-footer">
            <button type="submit" name="btn_delete_booking" id="btn_delete_booking" value="Delete" class="btn btn-danger btn-flat">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php require_once('includes/common-js.php');?>
<script>
$('.delete_option').click(function()
{
$('#booking_id').val($(this).data('id'));
});
</script>
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
    url: '<?php echo base_url('index.php/admin/home/booking_status/'); ?>',
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
$(function() {
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 1000)
}, 1000);
});
</script>
</body>

</html>
