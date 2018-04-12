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
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of registered students for each batch</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if (isset($batch_register)) {
                    $i=0;
                    foreach($batch_register as $post){
                    $i++;                    
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $post->register_name;?></td>
                        <td><?php echo $post->register_email;?></td>
                        <td><?php echo $post->register_code;?> <?php echo $post->register_phone;?></td>
                        <td><?php echo $post->register_course;?></td>
                        <td><?php echo $post->register_date;?></td>
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
