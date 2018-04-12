<!DOCTYPE html>
<html>
<head>
<?php require_once('includes/common-css.php');?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php require_once('includes/menu.php');?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Main content -->
    <section class="content">
        <?php foreach ($testimonial as $post){ ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit testimonial</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open_multipart('admin/home/testimonial_update/'.$post->testimonial_id) ?>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label>Course</label>
                            <select name="testimonial_course" class="form-control select2">
                                <option value="">Select</option>
                                <?php
                                foreach($all_course as $course)
                                {
                                ?>
                                <option value="<?php echo $course->course_id; ?>" <?php if(@$post->testimonial_course == @$course->course_id){?> selected="selected" <?php }?>> <?php echo $course->course_name; ?></option>
                                <?php
                                }
                                ?>                             
                            </select>                           
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="testimonial_name" class="form-control" value="<?php echo $post->testimonial_name; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">  
                            <label>Sourse</label>
                            <select name="testimonial_sourse" class="form-control">
                                <option value="<?php echo $post->testimonial_sourse; ?>"><?php echo $post->testimonial_sourse; ?></option>
                                <option value="">None</option>
                                <option value="Facebook">Facebook</option> 
                                <option value="Google">Google</option>
                                <option value="LinkedIn">Linked In</option>
                            </select>                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Review</label>
                            <textarea type="text" name="testimonial_review" class="form-control"><?php echo $post->testimonial_review; ?></textarea>
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">                  
                    <div class="col-md-3">
                        <div class="form-group">
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

</body>
</html>
