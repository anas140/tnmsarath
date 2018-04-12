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
        <?php foreach ($course as $post){ ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Course</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open_multipart('admin/home/course_update/'.$post->course_id) ?>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label>Category</label>
                            <select name="course_category" class=" form-control">
                                <?php
                                foreach($category as $categories)
                                {
                                ?>
                                <option value="<?php echo $categories->category_id; ?>" <?php if(@$post->course_category == @$categories->category_id){?> selected="selected" <?php }?>> <?php echo $categories->category_name; ?></option>
                                <?php
                                }
                                ?>
                            </select>                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Course Name</label>
                            <input type="text" name="course_name" class="form-control" placeholder="Enter Course Name" value="<?php echo $post->course_name; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" name="course_seo_title" class="form-control" placeholder="Enter Seo Title" value="<?php echo $post->course_seo_title; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="course_slug" class="form-control" placeholder="Enter Slug url" value="<?php echo $post->course_slug; ?>">
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="course_meta_description" class="form-control" placeholder="Enter Meta Description" value="<?php echo $post->course_meta_description; ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="course_meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="<?php echo $post->course_meta_keywords; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Course Title</label>
                            <input type="text" name="course_title" class="form-control" placeholder="Enter Course Title" value="<?php echo $post->course_title; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Caption</label>
                            <input type="text" name="course_caption" class="form-control" placeholder="Enter Caption" value="<?php echo $post->course_caption; ?>">
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="course_image" class="form-control">
                            <input type="hidden" name="image" class="form-control" value="<?php echo $post->course_image;?>">
                        </div>
                        <img style="width:100px; height: 100px;" src="<?php echo base_url()."uploads/course/".$post->course_image;?>">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Course Duration</label>
                            <input type="text" name="course_duration" class="form-control" placeholder="Enter Duration" value="<?php echo $post->course_duration; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label>Parent</label>
                            <select name="course_parent" class="form-control select2">
                                <option value="">None</option>
                                <?php
                                foreach($get_course as $course)
                                {
                                ?>
                                <option value="<?php echo $course->course_id; ?>" <?php if(@$post->course_parent == @$course->course_id){?> selected="selected" <?php }?>> <?php echo $course->course_name; ?></option>
                                <?php
                                }
                                ?>                              
                            </select>                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label>Priority</label>
                            <select name="course_priority" class="form-control">
                                <option value="<?php echo $post->course_priority; ?>"><?php echo $post->course_priority; ?></option>
                                <option value="">None</option>
                                <option value="1">1</option> 
                                <option value="2">2</option>
                                <option value="3">3</option> 
                                <option value="4">4</option>
                            </select>                            
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea type="text" name="course_content" placeholder="Enter Content" id="editor1" class="form-control"><?php echo $post->course_content;?></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputEmail3" class="row col-md-12 control-label" style="margin-top:25px;">
                            <input type="radio" name="course_enquiry_form" value="1" <?php if($post->course_enquiry_form=="1"){ echo "checked";}?>> Show Enquiry Form
                            </label>
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputEmail3" class="row col-md-12 control-label" style="margin-top:25px;">
                            <input type="radio" name="course_home_visible" value="1" <?php if($post->course_home_visible=="1"){ echo "checked";}?>> Show In Home Page
                            </label>
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

<!-- uncheck radio btn -->
<script type="text/javascript"> 
$("input:radio").on("click",function (e) {
        var inp=$(this);
    if (inp.is(".theone")) {
        inp.prop("checked",false).removeClass("theone");
    } else {
        $("input:radio[name='"+inp.prop("name")+"'].theone").removeClass("theone");
        inp.addClass("theone");
    }
});
</script>

</body>
</html>
