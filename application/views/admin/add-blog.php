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
                                            <h5 class="m-b-10">Blog</h5>
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
            if(!empty($blog[0]))
                             {
                             
                echo '<h4 class="box-title" style="color:#448aff";>Edit Blog</h4>';
                
                }
                else
                {
                     echo '<h4 class="box-title" style="color:#448aff";>Add Blog</h4>';
                }
            ?>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="j-wrapper ">
                                                          <?php
                             if(!empty($blog[0]))
                             {
                              ?>
                                                            <form action="<?php echo base_url('admin/home/blog_edit/'.$blog[0]->blog_id); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" >
															   <?php  
                           }
                     else{
                           ?>
						      <form action="<?php echo base_url('admin/home/add_blog'); ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" novalidate>
															
						        <?php
                            }
                               ?>
                                                                <!-- end /.header-->
                                                                <div class="j-content">
                                                                    <!-- start name -->
                                                                    <div class="j-row">
                                                                     <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                         
                                                            <select name="blog_language" class="form-control" >
                                                            <option value="">Select Language</option>
                         
                             <option value="english">English</option> 
                             <option value="malayalam">Malayalam</option>
                         
                            </select>
							<!--<select name="course_name" class="form-control">
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
                            </select>-->
                                                                     
                                                                                   <span class="j-tooltip j-tooltip-right-top">Select Language</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                              
                                                                                <input type="text" id="blog_title" name="blog_title" placeholder="Blog Title" value="<?php echo @$blog[0]->blog_title ?>">
																				   <span class="j-tooltip j-tooltip-right-top">Blog Title</span>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="j-row">

                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                               
                                                                                <input type="text" id="blog_postedby" name="blog_postedby" placeholder="Blog Posted By" value="<?php echo @$blog[0]->blog_postedby ?>">
																				 <span class="j-tooltip j-tooltip-right-top">Blog Posted By</span>
                                                                            </div>
                                                                        </div>
                                                                  
                                                                    <!-- end name -->
                                                            
                                                              
                                                                    
                                                                    <!-- start country -->
																	
															
																
														
                                                         
                                                                  
                                                           
                                                                    <!-- start files -->
                                                                   
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input j-append-small-btn">
                                                                                <div class="j-file-button">
                                                                                    Browse
                                                                                    <input type="file" name="blog_image" onchange="document.getElementById('file1_input').value = this.value;">
																					
                                                                                </div>
                                                                                <input type="text" id="file1_input" readonly="" placeholder="Add Blog Image">
																				 <?php if(!empty($blog[0])){?>
                                                <img  src="<?php echo base_url();?>uploads/blog/<?php echo  $blog[0]->blog_image; ?>" width="100" height="100">
                                                <?php } ?>
                                                <input type="hidden" name="temp_img" value="<?php echo @$blog[0]->blog_image; ?>">
                            <?php echo form_error('blog_image','<p class="help-block error_msg">','</p>'); ?>
                                                                               <span class="j-tooltip j-tooltip-right-top">Blog Image</span>
                                                                            </div>
                                                                        </div>
                                                                          </div>
                                                                          <div class="j-row">
                                                                           <div class="j-span10 j-unit">
                                                                            <div class="j-input">
																				 <h4 class="sub-title">Blog Description</h4>
                                                                                <textarea type="text" id="editor1" name="blog_description" placeholder="Blog Description"><?php echo @$blog[0]->blog_description ?></textarea>
																				   <span class="j-tooltip j-tooltip-right-top">Blog Description</span>
																				   
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
                                                                <?php
                                                                 if(!empty($blog[0]))
                             {
                                                                   echo' <button type="submit" class="btn btn-primary">Update</button>';
                                                               }
                                                               else
                                                               {
                                                                 echo' <button type="submit" class="btn btn-primary" id="continue">Save</button>';
                                                               }
                                                               ?>
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
                                                       <h4 class="box-title" style="color:#448aff";>View Blog</h4>
                                                        <span></span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                       <th>#</th>
                                                                          <th>Language</th> 
                        <th>Title</th>            
                        <th>Posted By</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>	
                        <th>More</th>						  
                                                                     
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																 <?php 
                    if (!empty($all_blog)) {
                    $i=0;
                    foreach($all_blog as $post){
                    $i++;
                    if($post->blog_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->blog_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
																<tr>
																<td><?php echo $i;?></td>
                                                                 <td><?php echo $post->blog_language;?></td> 
                                                                   <td><?php echo $post->blog_title;?></td> 
                                                                   <td><?php echo $post->blog_postedby;?></td>
																   <td><img style="width:100px;height:100px;" src="<?php echo base_url();?>uploads/blog/<?php echo $post->blog_image;?>"></td>
																    <td><?php echo $post->blog_postedon;?></td>
																   <td>  <input name="status-change" id="status_change" data-status="<?php echo $post->blog_status;?>" data-id=<?php echo $post->blog_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> /> </td>
																   <td>
                                                                 
                                                                   <a  href="<?php echo base_url();?>admin/home/blog_edit/<?php echo $post->blog_id;?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png"></a>
																    <a data-toggle="modal" href="#Delete_Log" class="delete_option " data-id="<?php echo $post->blog_id;?>"><img src="<?php echo base_url(); ?>assets/images/delete.png"></a>
																   </td>
                                                                   <td><a data-toggle="modal" title=" View More" data-target="#myModal<?php echo $post->blog_id;?>" href="javascript:void(0);"  >More</a></td>
																</tr>
 <div class="modal fade" id="myModal<?php echo $post->blog_id;?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="min-height: 100px;">
        <div class="modal-header">
          
          <h4 class="modal-title">View Details</h4>
        </div>
        <div class="modal-body">
        <div class="col-md-12">
            <div class="col-md-3">
                <center> <p>Blog description</p>
                <h4></h4><?php echo $post->blog_description;?> </center>.
            </div>
              
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
<!-- blog delete confirmation modal -->
      <div class="modal fade" id="Delete_Log" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
     
        <h4 class="modal-title" id="myModalLabel">Delete blog</span> ?</h4>
      </div>
      <div class="modal-body">
        Do you want to delete selected blog ?<br/>
        This Process cannot be Rolled Back
      </div>
        <form name="frm_delete_sale" id="frm_delete_sale" action="<?php echo base_url(); ?>admin/home/blog_delete/" method="POST">
          <input type="text" name="blog_id" id="blog_id" value=""/>
          <div class="modal-footer">
            <button type="submit" name="btn_delete_blog" id="btn_delete_blog" value="Delete" class="btn btn-danger btn-flat">Delete</button>
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
    url: '<?php echo base_url('index.php/admin/home/blog_status/'); ?>',
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
$('#blog_id').val($(this).data('id'));
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
<script>
 $('#continue').click(function()
  {
       $("#blog_title").each(function() 
   {
    if($(this).val()=="")
    {
        alert("empty");
      $(this).addClass("focus");
     //  $(".error_msg::before").css({'content':'bar'});
      //$(this).parent().addClass("error_msg");
      $(this).parent().prepend('<div class="error_msg">Please select title</div>');
     // $(".error_msg::before").css('content','bar');
    }
    else
    {
   
     $(this).removeClass("focus");
    }
});
  });

</script>
</body>

</html>
