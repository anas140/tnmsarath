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
        <?php foreach ($category as $post){ ?>       
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Category</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open('admin/home/category_update/'.$post->category_id) ?>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" value="<?php echo $post->category_name; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" name="seo_title" class="form-control" placeholder="Enter Seo Title" value="<?php echo $post->category_seo_title; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter Slug url" value="<?php echo $post->category_slug; ?>">
                        </div>
                    </div>
                  </div><!-- end row -->

                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="meta_description" class="form-control" placeholder="Enter Meta Description" value="<?php echo $post->category_meta_description; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="<?php echo $post->category_meta_keywords; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="category_description" placeholder="Enter Description" class="form-control" id="editor1"><?php echo $post->category_description; ?></textarea>
                        </div>
                    </div>
                  </div><!-- end row -->

                  <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                  </div><!-- end row -->
                </form>
            </div>
        </div>
        <?php } ?>
    </section>
    <!-- /.content -->
    

  </div>
  <!-- /.content-wrapper -->

  <?php require_once('includes/footer.php');?>

 </div>
<!-- ./wrapper -->

<?php require_once('includes/common-js.php');?>

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

<script>
  $(function () {
    CKEDITOR.replace('editor1');
  });
</script>

</body>
</html>
