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
      <?php foreach ($footer_menu as $post){ ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Footer Menu</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open('admin/home/footer_menu_update/'.$post->footer_id) ?>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class=" form-control" id="category">
                                <option value=""> Select</option>   
                                <?php
                                foreach($footer_menu_category as $categories)
                                {
                                ?>
                                <option value="<?php echo $categories->category_id; ?>" <?php if(@$post->footer_category== @$categories->category_id){?> selected="selected" <?php }?>> <?php echo $categories->category_name; ?></option>
                                <?php
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <?php 
                    $hidden_course=explode(',',$post->footer_course);
                    ?>
                    <input type="hidden" name="hidden_course" id="hidden_course" value="<?php echo $post->footer_course ?>"> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Course</label>
                            <select name="level_one[]" class="form-control select2" id="course" multiple style="width: 100%;">
                                <option value="">Select category first</option>
                                                              
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-md-2">
                        <div class="form-group" style="margin-top: 22px;">
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
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>

<!-- get course-->
<script type="text/javascript">
    $('#category').change(function () 
  {
    var hidden_course = <?php echo json_encode($hidden_course); ?>;
    var category = $('#category').val();
    $.ajax({
          type: "POST",
          url: "<?php echo site_url(); ?>/admin/home/get_courses",
          dataType : 'JSON',
          data : {
              'category' : category,
          },
          success: function (data) {
            var half = "";
            var selectHTML ="";

            $.each(data, function(index, value) {                 
              selected_course="";
              for(var i=0;i<hidden_course.length;i++)
              {                  
                if(hidden_course[i]==value['course_id']) 
                {  
                  selected_course ='selected="selected"';
                } 
              }

              half += "<option value="+ value['course_id']+ " "+selected_course+">"+value['course_name'] +"</option>";
            });

            selectHTML +=half+"</select>";
            $("#course").html(selectHTML);        
          }
      });
    });
  $('#category').trigger('change');
</script>

<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
     color: black;
}
.select2-container--default .select2-selection--single,.select2-container--default .select2-selection--multiple {
    border-radius: 0px !important;
    border: 1px solid #ccc !important;
}
</style>

</body>
</html>
