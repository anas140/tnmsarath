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
                    if (isset($allmenu)) {
                    $i=0;
                    foreach($allmenu as $post){
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
                        <td><?php echo $post->category_name;?></td>
                        <td>
                        <?php echo anchor('admin/course/menu_detail/' .$post->course_slug1, $post->course_name1); ?>
                        </td>
                        <td>
                        <?php echo anchor('admin/course/menu_detail/' .$post->course_slug2, $post->course_name2); ?>
                        </td>
                        <td>
                            <input name="status-change" id="status_change" data-status="<?php echo $post->status;?>" data-id=<?php echo $post->id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> />
                        </td>
                        <td>                        
                        <?php echo anchor('admin/course/menu_edit/' .$post->id, '<span class="glyphicon glyphicon-edit" title="Edit post"></span>'); ?>
                        <?php echo anchor('admin/course/menu_delete/'.$post->id, '<span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post"></span>', array('onclick' => "return confirm('Are you sure want to delete this post?')")); ?>
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

      <?php
       if (isset($menud)) {
       	foreach($menud as $post){
       	?>
		<h3><?php echo $post->course_name; ?></h3>
        <p><?php echo $post->course_slug; ?>&nbsp</p>
        <p><?php echo $post->course_content; ?>&nbsp</p>
        <?php
    }
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
    url: '<?php echo base_url('index.php/admin/course/menu_status/'); ?>',
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

</body>
</html>
