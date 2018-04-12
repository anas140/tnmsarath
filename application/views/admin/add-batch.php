<!DOCTYPE html>
<html>
<head>
<?php require_once('includes/common-css.php');?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker3.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php require_once('includes/menu.php');?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Main content -->
    <section class="content">

         <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php }else if($this->session->flashdata('error')){  ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php }else if($this->session->flashdata('warning')){  ?>
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->flashdata('warning'); ?>
            </div>
        <?php }else if($this->session->flashdata('info')){  ?>
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->flashdata('info'); ?>
            </div>
        <?php } ?>

        <?php 
        if(!empty($error)){?>
        <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $error; ?>
            </div>
        <?php
        }
        ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Upcoming Batches</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open_multipart('admin/home/add_batch')?>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label>Course</label>
                            <select name="batch_course" class="form-control select2">
                                <option value="">Select</option>
                                <?php
                                foreach($all_course as $course)
                                {
                                ?>
                                <option value="<?php echo $course->course_id;?>"><?php echo $course->course_name;?></option>        
                                <?php
                                }
                                ?>                               
                            </select>
                            <span class="error_msg"><?php echo form_error('batch_course'); ?></span>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Start date</label>
                            <input type="text" name="batch_start_date" class="form-control" id="datepicker" placeholder="Enter Start date" value="<?php echo set_value('batch_start_date'); ?>">
                            <span class="error_msg"><?php echo form_error('batch_start_date');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="text" name="batch_start_time" class="form-control timepicker" placeholder="Enter Start time" value="<?php echo set_value('batch_start_time'); ?>">
                                <span class="error_msg"><?php echo form_error('batch_start_time');?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>End time</label>
                                <input type="text" name="batch_end_time" class="form-control timepicker" placeholder="Enter End time" value="<?php echo set_value('batch_end_time'); ?>">
                                <span class="error_msg"><?php echo form_error('batch_end_time');?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" name="batch_duration" class="form-control" placeholder="Enter Duration" value="<?php echo set_value('batch_duration'); ?>">
                            <span class="error_msg"><?php echo form_error('batch_duration');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Days</label>
                            <input type="text" name="batch_days" class="form-control" placeholder="Enter Duration" value="<?php echo set_value('days'); ?>">
                            <span class="error_msg"><?php echo form_error('batch_days');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="batch_location" class="form-control" placeholder="Enter Location" value="<?php echo set_value('batch_location'); ?>">
                            <span class="error_msg"><?php echo form_error('batch_location');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 20px;">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                    </div>  
                </div><!-- end row -->

                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Upcoming Batches</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Course</th>
                        <th>Start date</th>                       
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Days</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if (isset($all_batch)) {
                    $i=0;
                    foreach($all_batch as $post){
                    $i++;
                    if($post->batch_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->batch_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>                       
                        <td><?php echo $post->course_name;?></td>
                        <td><?php echo date("d-M-Y",strtotime($post->batch_start_date));?></td> 
                        <td><?php echo $post->batch_start_time;?></td>
                        <td><?php echo $post->batch_end_time;?></td>
                        <td><?php echo $post->batch_duration;?></td> 
                        <td><?php echo $post->batch_days;?></td>
                        <td><?php echo $post->batch_location;?></td>
                        <td><?php echo $post->batch_postedon;?></td>                                      
                        <td>
                            <input name="status-change" id="status_change" data-status="<?php echo $post->batch_status;?>" data-id=<?php echo $post->batch_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> />
                        </td>
                        <td>
                        <?php echo anchor('admin/home/batch_edit/' .$post->batch_id, '<span class="glyphicon glyphicon-edit" title="Edit post"></span>'); ?>
                        <?php echo anchor('admin/home/batch_delete/'.$post->batch_id, '<span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post"></span>', array('onclick' => "return confirm('Are you sure want to delete this post?')")); ?>
                        </td>
                    </tr>
                    <?php
                    }
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <?php require_once('includes/footer.php');?>

 </div>
<!-- ./wrapper -->

<?php require_once('includes/common-js.php');?>
<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-timepicker.min.js"></script>

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
    url: '<?php echo base_url('index.php/admin/home/batch_status/'); ?>',
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
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script type="text/javascript">
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

  //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    CKEDITOR.replace('editor1');
  });
</script>

</body>
</html>
