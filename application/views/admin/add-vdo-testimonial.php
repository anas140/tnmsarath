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
                                            <h5 class="m-b-10">Video Testimonial</h5>
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
                                                     <?php
                                                      if($this->session->flashdata('message')){ ?>
        <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                                                     <h4><?php
                                                       echo $this->session->flashdata('message');?></h4>
                                                      
                                                       </div>
                                                       <?php
                                                   }
            if(!empty($testimonial[0]))
                             {
                             
                echo '<h4 class="box-title" style="color:#448aff";>Edit Video testimonial</h4>';
                
                }
                else
                {
                     echo '<h4 class="box-title" style="color:#448aff";>Add Video testimonial</h4>';
                }
            ?>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="j-wrapper ">
                                                          									  <?php
                             if(!empty($testimonial[0]))
                             {
                              ?>
                                                            <form action="<?php echo base_url('admin/home/vdo_testimonial_edit/'.$testimonial[0]->testimonial_id); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" novalidate>
															   <?php  
                           }
                     else{
                           ?>
						      <form action="<?php echo base_url('admin/home/add_vdo_testimonial'); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" novalidate>
															
						        <?php
                            }
                               ?>
                                                                <!-- end /.header-->
                                                                <div class="j-content">
                                                                    <!-- start name -->
                                                                    <div class="j-row">
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                              
                                                                                <input type="text" id="testimonial_title" name="testimonial_title" placeholder="Testimonial Title" value="<?php echo (!empty($testimonial[0])) ? $testimonial[0]->testimonial_title : ''; ?>">
																				   <span class="j-tooltip j-tooltip-right-top">Testimonial Title</span>
                                                                            </div>
                                                                        </div>
                                                                         <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                              
                                                                                <input type="text" id="testimonial_link" name="testimonial_link" placeholder="Url Link" value="<?php echo (!empty($testimonial[0])) ? $testimonial[0]->testimonial_youtube_link : ''; ?>">
																				   <span class="j-tooltip j-tooltip-right-top">Youtube Url Link</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end name -->
                                                            
                                                              
                                                                    <div class="divider gap-bottom-25"></div>
                                                                    <!-- start country -->
																	
															
																
														
                                                         
                                                                    <div class="divider gap-bottom-25"></div>
                                                           
                                                                    <!-- start files -->
                                                                    <div class="j-row">
                                                                       
                                                                      
                                                                    </div>
                                                                    <!-- end files -->
                                                                    <!-- start response from server -->
                                                                    <div class="j-response"></div>
                                                                    <!-- end response from server -->
                                                                </div>
                                                                <!-- end /.content -->
                                                                <div class="j-footer">
                                                                <?php
                                                                if(!empty($testimonial[0]))
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
                                                       <h4 class="box-title" style="color:#448aff";>View Video Testimonial</h4>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                       <th>#</th>
																	 <th>Title</th>     
																		<th>Youtube Url</th>
																		<th>Date</th>
																		<th>Status</th>
																		<th>Action</th>							  
																													 
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
				<?php
                    if (isset($all_testimonial)) {
                    $i=0;
                    foreach($all_testimonial as $post){
                    $i++;
                    if($post->testimonial_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->testimonial_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
																<tr>
																<td><?php echo $i;?></td>
                                                                   <td><?php echo $post->testimonial_title;?></td> 
                                                                   <td><?php echo $post->testimonial_youtube_link;?></td>
																   <td><?php echo $post->testimonial_added_date;?></td>
																 
																   <td>  <input name="status-change" id="status_change" data-status="<?php echo $post->testimonial_status;?>" data-id=<?php echo $post->testimonial_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> /> </td>
																   <td>
                                                                    <a  href="<?php echo base_url();?>admin/home/vdo_testimonial_edit/<?php echo $post->testimonial_id;?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png"></a>
																    <a data-toggle="modal" href="#Delete_Log" class="delete_option " data-id="<?php echo $post->testimonial_id;?>"><img src="<?php echo base_url(); ?>assets/images/delete.png"></a>
																   </td>
																   </td>
																   </tr>
																   
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
<!-- testimonial delete confirmation modal -->
      <div class="modal fade" id="Delete_Log" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="myModalLabel">Delete Video Testimonial</span> ?</h4>
      </div>
      <div class="modal-body">
        Do you want to delete selected Testimonial ?<br/>
        This Process cannot be Rolled Back
      </div>
        <form name="frm_delete_sale" id="frm_delete_sale" action="<?php echo base_url(); ?>admin/home/vdo_testimonial_delete/" method="POST">
          <input type="hidden" name="vdo_testimonial_id" id="vdo_testimonial_id" value=""/>
          <div class="modal-footer">
            <button type="submit" name="btn_delete_testimonial" id="btn_delete_testimonial" value="Delete" class="btn btn-danger btn-flat">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php require_once('includes/common-js.php');?>
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
    url: '<?php echo base_url('index.php/admin/home/vdo_testimonial_status/'); ?>',
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
$('#vdo_testimonial_id').val($(this).data('id'));
});
</script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    CKEDITOR.replace('editor1');
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
