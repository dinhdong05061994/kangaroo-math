<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 <title>Vietnam Math Kangaroo Contest</title>
 <base href="<?php echo base_url();?>"/>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
    
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 <script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
    });
    MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
   
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}

.menu{
    clear: both;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<!-- Beginning header -->
    
    <div>

    </div>
<!-- End of header-->
  <?php $this->load->view("backend/admin_menu")?>
    <div style='height:30px;'></div>
    <div class="col-md-6 col-md-offset-1" style="float: none;">
    <h4><b>Xem lại đề bài</b></h4>
    <div class="row" id="notification">
        <?php if($this->session->flashdata('danger')  && $this->session->flashdata('danger')!=""){
        ?>
        <div class="alert alert-danger" style="text-align: center;">
          <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?=$this->session->flashdata('danger')?>
        </div>  
         <?php $this->session->set_flashdata('danger','')?>
      <?php
        } ?> 
    </div>
        <form>
            <div class="form-group">
                <label for="number_form">Từ câu hỏi có id :</label>
                <input type="number" min = "1" class="form-control" id="number_form" name="number_form">
            </div>
            <div class="form-group">
                <label for="number_to">Đến câu hỏi có id :</label>
                <input type="number" min = "1" class="form-control" id="number_to" name="number_to">
            </div>
            <a target="_blank" class="btn btn-info" id="view_question"><i class="glyphicon glyphicon-search"></i> Xem</a>
        </form>
    </div>
    <div style='height:20px;'></div>
    <div>
        <?php echo $output; ?>
 
    </div>
<!-- Beginning footer -->
<div>
    <a style="margin: auto">Administrator Panel - WBOT</a> 
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#view_question").click(function(){
            $(this).attr("href","admin_view_question_optinonal/view/"+$("input[name='number_form']").val()+"/"+$("input[name='number_to']").val());
        });
        $(".close").click(function(){
            $("#notification").hide("slow");
        });
    });

</script>
<!-- End of Footer -->
</body>
</html>