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
        <?php foreach ($blog as $post){ ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Blog</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open_multipart('admin/home/blog_update/'.$post->blog_id) ?>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="blog_title" class="form-control" placeholder="Enter Title" value="<?php echo $post->blog_title; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" name="blog_seo_title" class="form-control" placeholder="Enter Seo Title" value="<?php echo $post->blog_seo_title; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="blog_slug" class="form-control" placeholder="Enter Slug url" value="<?php echo $post->blog_slug; ?>">
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="blog_meta_description" class="form-control" placeholder="Enter Meta Description" value="<?php echo $post->blog_meta_description; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="blog_meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="<?php echo $post->blog_meta_keywords; ?>">
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postedby</label>
                            <input type="text" name="blog_postedby" class="form-control" placeholder="Enter Postedby" value="<?php echo $post->blog_postedby; ?>">
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Image</label>            
                            <input name="blog_image" type="file" id="file">
                            <input type="hidden" name="image" class="form-control" value="<?php echo $post->blog_image;?>">
                        </div>
                        <img style="width:100px; height: 100px;" src="<?php echo base_url()."uploads/blog/".$post->blog_image;?>">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea type="text" name="blog_description" placeholder="Enter Content" id="editor1" class="form-control"><?php echo $post->blog_description;?></textarea>
                        </div>
                    </div>                  
                </div>
            
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    CKEDITOR.replace('editor1');
  });
</script>

</body>
</html>
