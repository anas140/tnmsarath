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
                            <div id="formdiv">             
                                <div id="filediv"><input name="blog_image[]" type="file" id="file"><br/></div>
                                <input type="button" id="add_more" class="upload" value="Add More Files"/>   
                            </div>
                            <input type="hidden" name="image" class="form-control" value="<?php echo $post->blog_image;?>">
                        </div>
                        <?php
                        if(!empty($post->blog_image)){
                        $small_image =  explode(',', $post->blog_image);
                        //echo $small_image['0'];
                        //echo count($small_image);
                        foreach ($small_image as $key => $small_images) {
                        echo '<div class="col-md-4 img_div">
                            <img src="'.base_url().'uploads/blog/'.$small_images.'" width="100px"; height="100px";>
                           <div class="image-loading-div" ></div>
                            <p><a style="cursor: pointer;margin-left: 10px;" class="testing" data-type="'.$small_images.'" data-id="'.$post->blog_id.'">Remove</a></p>
                        </div>';
                        }
                        }
                        ?>

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

<script>
//delete image
$('.testing').click(function() {
  var type=$(this).data("type");
  var this_= $(this).parents('.img_div'); 
  var id=$(this).data("id"); 
    $.ajax({
    type: "POST",
    url: '<?php echo base_url('index.php/admin/home/delete_blog_image/'); ?>',
    dataType: 'json',
    data: {
        type: type,
        id: id
    },
    beforeSend: function(){$('.image-loading-div').addClass('image-loading_icon');},
    complete: function(){$('.image-loading-div').removeClass('image-loading_icon');},
    success: function(response) {   
        if (response == 'success'){
          this_.remove();
        }
        else{ 
        console.log('error');  
        }       
    }
   });
});
</script>

<script>
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed

$('#add_more').click(function() {
if($('#formdiv').children('.filediv').length<2){
$(this).before($("<div/>", {class: 'filediv'}).fadeIn('slow').append(
        $("<input/>", {name: 'blog_image[]', type: 'file', id: 'file'}),
        $("<br/>")
        ));
}
});

//following function will executes on change event of file input to select different file   
$('body').on('change', '#file', function(){
    if (this.files && this.files[0]) {
         abc += 1; //increementing global variable by 1
        
        var z = abc - 1;
        var x = $(this).parent().find('#previewimg' + z).remove();
        $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
       
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
       
        $(this).hide();
        $("#abcd"+ abc).append($("<img/>", {id: 'img', src: '<?php echo base_url()?>design/images/x.png', alt: 'delete'}).click(function() {
        $(this).parent().parent().remove();
        }));
    }
});

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":blog_image").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});
</script>

<style type="text/css">
#img{ 
    width: 17px;
    border: none; 
    height:17px;
    margin-left: -20px;
    margin-bottom: 91px;
    cursor:pointer;
}

.abcd img,#file-select {
    height: 120px;
    width: 150px;
    padding: 2px;
    border: 1px solid #E8DEBD;
}
</style>

</body>
</html>
