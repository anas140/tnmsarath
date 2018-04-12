<!DOCTYPE html>
<html>
<head>
<?php require_once('includes/common-css.php');?>
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
                <h3 class="box-title">Add Menu Structure</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open('admin/home/add_menu') ?>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" id="ajax_cate">
                                <option value="" selected="selected">Select</option>
                                <?php
                                foreach($menu_category as $post)
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
                            <label>Level 1</label>
                            <select id="course" name="level_one" class="form-control course" id="course_label">
                                <option value="">Select category first</option>
                                                              
                            </select>
                            <span class="error_msg"><?php echo form_error('level_one'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Level 2</label>
                            <select name="level_two" class="form-control">
                                <option value="">Select</option>
                                <?php
                                foreach($menu_course as $post)
                                {
                                ?>
                                <option value="<?php echo $post->course_id;?>"><?php echo $post->course_name;?></option>        
                                <?php
                                }
                                ?>                               
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
                        <th>Level 1</th>
                        <th>Level 2</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php                    
                    if (isset($menu)) {
                    $i=0;
                    foreach($menu as $post){
                    $i++;
                    if($post->status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td>
                        <?php 
                        foreach($menu_category as $categories)
                        {
                            if(@$post->category== @$categories->category_id)
                            {
                                echo $categories->category_name;
                            }
                        }
                        ?>                            
                        </td>
                        <td>
                        <?php 
                        foreach($menu_course as $levelone)
                        {
                            if(@$post->level_one== @$levelone->course_id)
                            {
                                echo $levelone->course_name;
                            }
                        }
                        ?>                           
                        </td>
                        <td>
                        <?php 
                        foreach($menu_course as $leveltwo)
                        {
                            if(@$post->level_two== @$leveltwo->course_id)
                            {
                                echo $leveltwo->course_name;
                            }
                        }
                        ?>
                        </td>
                        <td>
                            <input name="status-change" id="status_change" data-status="<?php echo $post->status;?>" data-id=<?php echo $post->id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> />
                        </td>
                        <td>
                        <?php echo anchor('admin/home/menu_edit/' .$post->id, '<span class="glyphicon glyphicon-edit" title="Edit post"></span>'); ?>
                        <?php echo anchor('admin/home/menu_delete/'.$post->id, '<span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post"></span>', array('onclick' => "return confirm('Are you sure want to delete this post?')")); ?>
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
    url: '<?php echo base_url('index.php/admin/home/menu_status/');?>',
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

<!-- get course-->
<script type="text/javascript">
$(document).ready(function(){   
    $('#ajax_cate').change(function(){
    var cate_id = $('#ajax_cate').val();
        $.ajax({
            type: "POST",
            url:"<?php echo base_url('index.php/admin/home/get_courses/');?>" + cate_id,
            success: function(courses) //we're calling the response json array 'courses'
            {
                $('#course').empty();
                $('#course, #course_label').show();
                $.each(courses,function(id,course)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(course);
                    $('#course').append(opt);
                });
            } //end success
         }); //end AJAX
    }); //end change
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

</body>
</html>
