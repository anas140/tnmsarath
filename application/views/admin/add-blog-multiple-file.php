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

        <?php 
        if(!empty($error)){?>
        <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $error; ?>
            </div>
        <?php
        }
        ?>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Blog</h3>
            </div>

            <div class="box-body">
            <!-- form start -->
             <?php echo form_open_multipart('admin/home/add_blog')?>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="blog_title" class="form-control" placeholder="Enter Blog Title" value="<?php echo set_value('blog_title'); ?>">
                            <span class="error_msg"><?php echo form_error('blog_title');?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" name="blog_seo_title" class="form-control" placeholder="Enter Seo Title" value="<?php echo set_value('blog_seo_title'); ?>">
                            <span class="error_msg"><?php echo form_error('blog_seo_title');?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="blog_slug" class="form-control" placeholder="Enter Slug url" value="<?php echo set_value('blog_slug'); ?>">
                            <span class="error_msg"><?php echo form_error('blog_slug');?></span>
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" name="blog_meta_description" class="form-control" placeholder="Enter Meta Description">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="blog_meta_keywords" class="form-control" placeholder="Enter Meta Keywords">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postedby</label>
                            <input type="text" name="blog_postedby" class="form-control" placeholder="Enter Postedby" value="<?php echo set_value('blog_postedby'); ?>">
                            <span class="error_msg"><?php echo form_error('blog_postedby');?></span>
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
                            <?php echo form_error('blog_image','<p class="help-block error_msg">','</p>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea type="text" name="blog_description" placeholder="Enter Content" id="editor1" class="form-control"></textarea>
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
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Blog</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>                       
                        <th>Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if (isset($all_blog)) {
                    $i=0;
                    foreach($all_blog as $post){
                    $i++;
                    if($post->blog_status=='0')
                    {
                        $status_type="success";
                        $status_state="checked";
                    }
                    elseif($post->blog_status=='1')
                    {
                        $status_type="info";
                        $status_state="";
                    }
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>                       
                        <td><?php echo $post->blog_title;?></td>
                        <td><?php echo $post->blog_slug;?></td> 
                        <td><?php echo $post->blog_postedby;?></td>
                        <td><?php echo $post->blog_postedon;?></td>                                      
                        <td>
                            <input name="status-change" id="status_change" data-status="<?php echo $post->blog_status;?>" data-id=<?php echo $post->blog_id;?> type="checkbox" data-size="small" data-on-color="success" data-off-color="warning" data-on-text="ON" data-off-text="OFF" <?php echo $status_state?> />
                        </td>
                        <td>
                        <?php echo anchor('admin/home/blog_edit/' .$post->blog_id, '<span class="glyphicon glyphicon-edit" title="Edit post"></span>'); ?>
                        <?php echo anchor('admin/home/blog_delete/'.$post->blog_id, '<span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post"></span>', array('onclick' => "return confirm('Are you sure want to delete this post?')")); ?>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

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
    url: '<?php echo base_url('index.php/admin/home/blog_status/'); ?>',
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
