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

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Footer Menu</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open('admin/home/add_footer_menu') ?>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" id="category">
                                <option value="" selected="selected">Select</option>
                                <?php
                                foreach($footer_menu_category as $post)
                                {
                                ?>
                                <option value="<?php echo $post->category_id;?>"><?php echo $post->category_name;?></option>        
                                <?php
                                }
                                ?>                               
                            </select>
                            <span class="error_msg"><?php echo form_error('category'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Course</label>
                            <select name="level_one[]" class="form-control course select2" id="course" multiple>
                                <option value="">Select category first</option>
                                                              
                            </select>
                            <span class="error_msg"><?php echo form_error('level_one'); ?></span>
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
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Menu Structure</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php                    
                    if (isset($footer_menu)) {
                    $i=0;
                    foreach($footer_menu as $post){
                    $i++;
                    if($post->footer_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->footer_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td>
                        <?php 
                        foreach($footer_menu_category as $categories)
                        {
                            if(@$post->footer_category== @$categories->category_id)
                            {
                                echo $categories->category_name;
                            }
                        }
                        ?>                            
                        </td>
                        <td>
                        <?php                                                     
                        foreach($footer_menu_course as $levelone)
                        {
                            $array_courses =  explode(',', $post->footer_course);
                            foreach($array_courses as $array_course)
                            {
                                if($array_course== @$levelone->course_id)
                                {
                                    echo'<li> '.$levelone->course_name.'</li>';
                                }
                            }                                                       
                        }
                        ?>                           
                        </td>
                        <td>
                            <input name="status-change" id="status_change" data-status="<?php echo $post->footer_status;?>" data-id=<?php echo $post->footer_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> />
                        </td>
                        <td>
                        <?php echo anchor('admin/home/footer_menu_edit/' .$post->footer_id, '<span class="glyphicon glyphicon-edit" title="Edit post"></span>'); ?>
                        <?php echo anchor('admin/home/footer_menu_delete/'.$post->footer_id, '<span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post"></span>', array('onclick' => "return confirm('Are you sure want to delete this post?')")); ?>
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
    url: '<?php echo base_url('index.php/admin/home/footer_menu_status/');?>',
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

<script type="text/javascript">
  $('#category').change(function () 
  {
    var category = $('#category').val();
     $.ajax({
        type: "POST",
          url: "<?php echo site_url(); ?>/admin/home/get_courses",
          data:'category='+category,
          success: function (data) {

            var half = "";
            var JSONObject = JSON.parse(data);
            var selectHTML ="";
            $.each(JSONObject, function( index, value ) {
              
              half += "<option value="+ value['course_id']+">"+value['course_name'] +"</option>";
            });

            selectHTML +="<option value=''>Select Course</option>"+half+"</select>";
           $("#course").html(selectHTML);
      
          }
      });
    
  });
 $('#category').trigger('change');
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

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
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
