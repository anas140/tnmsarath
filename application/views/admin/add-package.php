<?php 
?>
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
                                            <h5 class="m-b-10">Package</h5>
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
            if(!empty($package[0]))
                             {
                             
                echo '<h4 class="box-title" style="color:#448aff";>Edit Package</h4>';
                
                }
                else
                {
                     echo '<h4 class="box-title" style="color:#448aff";>Add Package</h4>';
                }
            ?>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="j-wrapper ">
                                                          <?php
                             if(!empty($package[0]))
                             {
                              ?>
                                                            <form action="<?php echo base_url('admin/home/package_edit/'.$package[0]->package_id); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" >
															   <?php  
                           }
                     else{
                           ?>
						      <form action="<?php echo base_url('admin/home/add_package'); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" novalidate>
															
						        <?php
                            }
                               ?>
                                                                <!-- end /.header-->
                                                                <div class="j-content">
                                                                    <!-- start name -->
                                                                    <div class="j-row">
                                                                                                                    <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                            <?php
                                                                            //print_r($category);
                                                                            ?>
                                                            <select name="course_name" class="form-control">
                                                            <option value="">Select Course</option>
                                                            <?php
                                                             
                                foreach($course as $courses)
                                {
                                ?>
                            
                             <option value="<?php echo $courses->course_id; ?>" 
                             <?php if(@$package[0]->course_id == @$courses->course_id){?> selected="selected" <?php }?>> 
                             <?php echo $courses->course_name; ?>
                             </option>
                            <?php
                            /*foreach ($category as $key=>$value) {
                            
                            echo '<option value="'.$value->category_id.'">'.$value->category_name.'</option>';
                            }*/
                            ?>
                            <?php
                                }
                                ?>
                            </select>
                                                                     
                                                                                   <span class="j-tooltip j-tooltip-right-top">Event Category</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                              
                                                                                <input type="text" id="package_name" name="package_name" placeholder="Package Name" value="<?php echo @$package[0]->package_name?>">
																				   <span class="j-tooltip j-tooltip-right-top">Package Name</span>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <!-- end name -->
                                                            
                                                              
                                                                    <div class="divider gap-bottom-25"></div>
                                                                    <!-- start country -->
																	
															
																
														
                                                         
                                                                   
                                                           
                                                                    <!-- start files -->
                                                                    <div class="j-row">
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input j-append-small-btn">
                                                                                <div class="j-file-button">
                                                                                    Browse
                                                                                    <input type="file" name="package_image" onchange="document.getElementById('file1_input').value = this.value;">
																					
                                                                                </div>
                                                                                <input type="text" id="file1_input" readonly="" placeholder="Add Package Image">
																				 <?php if(!empty($package[0])){?>
                                                <img  src="<?php echo base_url();?>uploads/package/<?php echo  $package[0]->package_image; ?>" width="100" height="100">
                                                <?php } ?>
                                                <input type="hidden" name="temp_img" value="<?php echo @$package[0]->package_image; ?>">
                            <?php echo form_error('package_image','<p class="help-block error_msg">','</p>'); ?>
                                                                               <span class="j-tooltip j-tooltip-right-top">Package Image</span>
                                                                            </div>
                                                                        </div>
                                                                          <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                              
                                                                                <input type="text" id="package_price" name="package_price" placeholder="Package Price" value="<?php echo @$package[0]->package_price ?>">
                                                                                   <span class="j-tooltip j-tooltip-right-top">Package Price</span>
                                                                            </div>
                                                                        </div>

                                                                      
                                                                    </div>
                                                                           <div class="row">
                                                                             <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 <h4 class="sub-title">Package Description</h4>
                                                                                <textarea type="text" id="editor1" name="package_description" placeholder="Package Description"><?php echo @$package[0]->package_description ?></textarea>
                                                                                   <span class="j-tooltip j-tooltip-right-top">Package Description</span>
                                                                                   
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    <!-- end files -->
                                                                    <!-- start response from server -->
                                                                    <div class="j-response"></div>
                                                                    <!-- end response from server -->
                                                                </div>
                                                                <!-- end /.content -->
                                                                <div class="j-footer">
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                    <button type="reset" class="btn btn-default m-r-20">cancel</button>
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
                                                       <h4 class="box-title" style="color:#448aff";>View Packages</h4>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                       <th>#</th>
                                                                        <th>Course Name</th> 
                                                                        <th>Package Name</th> 
                                                                        <th>Description</th> 
                                                                        <th>Image</th>
                                                                        <th>Price</th>
                                                                        <th>Date</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>							  
                                                                     
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																 <?php 
                    if (!empty($all_package)) {
                    $i=0;
                    foreach($all_package as $post){
                    $i++;
                    if($post->package_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->package_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
																<tr>
																<td><?php echo $i;?></td>
                                                                  <td><?php echo $post->course_name;?></td> 
                                                                   <td><?php echo $post->package_name;?></td> 
                                                                   <td><?php echo $post->package_description;?></td>
																   <td><img style="width:100px;height:100px;" src="<?php echo base_url();?>uploads/package/<?php echo $post->package_image;?>"></td>
                                                                   <td><?php echo $post->package_price;?></td>
																    <td><?php echo $post->package_postedon;?></td>
																   <td>  <input name="status-change" id="status_change" data-status="<?php echo $post->package_status;?>" data-id=<?php echo $post->package_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> /> </td>
																   <td>
                                                                   <a href="<?php echo base_url();?>admin/home/package_edit/<?php echo $post->package_id;?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png"></a>

																    <a data-toggle="modal" href="#Delete_Log" class="delete_option " data-id="<?php echo $post->package_id;?>"><img src="<?php echo base_url(); ?>assets/images/delete.png"></a>
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
<!-- Package delete confirmation modal -->
      <div class="modal fade" id="Delete_Log" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
     
        <h4 class="modal-title" id="myModalLabel">Delete Package</span> ?</h4>
      </div>
      <div class="modal-body">
        Do you want to delete selected Package ?<br/>
        This Process cannot be Rolled Back
      </div>
        <form name="frm_delete_sale" id="frm_delete_sale" action="<?php echo base_url(); ?>admin/home/package_delete/" method="POST">
          <input type="hidden" name="package_id" id="package_id" value=""/>
          <div class="modal-footer">
            <button type="submit" name="btn_delete_package" id="btn_delete_package" value="Delete" class="btn btn-danger btn-flat">Delete</button>
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
    url: '<?php echo base_url('index.php/admin/home/package_status/'); ?>',
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
<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
<script>
$('.delete_option').click(function()
{
$('#package_id').val($(this).data('id'));
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
