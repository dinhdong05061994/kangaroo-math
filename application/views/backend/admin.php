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
</head>
<body>
<!-- Beginning header -->
    
    <div>

    </div>
<!-- End of header-->
  <?php $this->load->view("backend/admin_menu")?>

    <div style='height:30px;'></div>
    <div>
        <?php echo $output; ?>
 
    </div>
<!-- Beginning footer -->
<div>
    <a style="margin: auto">Administrator Panel - WBOT</a> 
</div>
<!-- End of Footer -->
</body>
</html>