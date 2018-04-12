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
        <?php foreach ($batch as $post){ ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Upcoming Batches</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open_multipart('admin/home/batch_update/'.$post->batch_id) ?>
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
                                <option value="<?php echo $course->course_id; ?>" <?php if(@$post->batch_course == @$course->course_id){?> selected="selected" <?php }?>> <?php echo $course->course_name; ?></option>
                                <?php
                                }
                                ?>                             
                            </select>                           
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Start date</label>
                            <input type="text" name="batch_start_date" class="form-control" id="datepicker" placeholder="Enter Start date" value="<?php echo $post->batch_start_date; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="text" name="batch_start_time" class="form-control timepicker" placeholder="Enter Start time" value="<?php echo $post->batch_start_time; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>End time</label>
                                <input type="text" name="batch_end_time" class="form-control timepicker" placeholder="Enter End time" value="<?php echo $post->batch_end_time; ?>">
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Duration</label>
                            <input type="text" name="batch_duration" class="form-control" value="<?php echo $post->batch_duration; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Days</label>
                            <input type="text" name="batch_days" class="form-control" value="<?php echo $post->batch_days; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="batch_location" class="form-control" value="<?php echo $post->batch_location; ?>">
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
        <?php
        }
        ?>  
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

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
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

</body>
</html>
