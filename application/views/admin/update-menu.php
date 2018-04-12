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
      <?php foreach ($menu as $post){ ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Update Menu Structure</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open('admin/home/menu_update/'.$post->id) ?>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class=" form-control">
                                <option value=""> Select</option>   
                                <?php
                                foreach($menu_category as $categories)
                                {
                                ?>
                                <option value="<?php echo $categories->category_id; ?>" <?php if(@$post->category== @$categories->category_id){?> selected="selected" <?php }?>> <?php echo $categories->category_name; ?></option>
                                <?php
                                }
                                ?>
                            </select> 
                            <span class="error_msg"><?php echo form_error('category');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Level 1</label>
                            <select name="level_one" class=" form-control">
                              <option value=""> Select</option>
                                <?php
                                foreach($menu_course as $level_one)
                                {
                                ?>
                                <option value="<?php echo $level_one->course_id; ?>" <?php if(@$post->level_one == @$level_one->course_id){?> selected="selected" <?php }?>> <?php echo $level_one->course_name; ?></option>
                                <?php
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Level 2</label>
                            <select name="level_two" class=" form-control">
                              <option value=""> Select</option>
                                <?php
                                foreach($menu_course as $level_two)
                                {
                                ?>
                                <option value="<?php echo $level_two->course_id; ?>" <?php if(@$post->level_two == @$level_two->course_id){?> selected="selected" <?php }?>> <?php echo $level_two->course_name; ?></option>
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

</body>
</html>
