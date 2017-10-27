<!DOCTYPE html>
<html lang="en"> 
<!-- BEGIN HEAD -->
<head>
    <base href="<?php echo base_url();?>">
    <meta charset="UTF-8" />
    <title>Kangaroo | ADMIN</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/theme.css" />
    <link rel="stylesheet" href="css/MoneAdmin.css" />
   <script src="plugins/jquery-2.0.3.min.js"></script>
     <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
     <script src="plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link href="css/layout2.css" rel="stylesheet" />
    
     <?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
    
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
   
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
</style>
    
			
</head>

  
<body class="padTop53 " >

    
    <div id="wrap" >
     
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
               
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
                        <h3 style="color: blue; margin-top: 10px; font-weight: bold;">Administrator</h3>
                    
                        
                        </a>
                </header>
              
                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="glyphicon glyphicon-chevron-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                          
                          
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url()?>kang_admin/logoutadmin"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                   
                </ul>

            </nav>

        </div>
        
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img width="200px" height="200px;" class="media-object img-thumbnail user-img" alt="User Picture" src="img/logo.png" />
                </a>
                <br />
                <div class="media-body">
                    <?php $session_id = $this->session->userdata('admin');
                        
                    ?>
                    <h5 class="media-heading"> <?php echo $session_id['email'];?></h5>
                    <ul class="list-unstyled user-info">  
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                        </li> 
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel active">
                    <a>
                        <i class="icon-table"></i> Trang Chủ
	   
                    </a>                   
                </li>

                <li class="panel " style="display: none;">
                    <a href="<?php echo base_url()?>kang_admin/choose_year_question" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> Quản lý câu hỏi
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-danger"><?php echo $session_id['question_test'];?></span>&nbsp;
                    </a>
                    
                </li>
             
             
                <li class="panel">
                    <a href = "<?php echo base_url()?>kang_admin/list_news" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> Quản lý chuyên đề
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    
                </li>
                <li class="panel">
                        <a href = "<?php echo base_url() ?>kang_admin/list_course" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                            <i class=" icon-sitemap"></i> Quản lý Lớp ( lever )
                            <span class="pull-right">
                                <i class="icon-angle-left"></i>
                            </span>
                        </a>

                    </li>
                <li class="panel">
                    <a href = "<?php echo base_url()?>lecture/list_lecture" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> Quản lý bài giảng
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    
                </li>
                <li class="panel">
                    <!-- <a href = "<?php echo base_url()?>kang_admin_week/add_test_question" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav"> -->
                    <a href = "<?php echo base_url()?>kang_admin_week/view_test_question_table" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> Câu hỏi theo tuần
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    
                </li>
               <li class="panel">
                    <a href = "<?php echo base_url()?>kang_admin/notification" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i>Quản lý Thông báo
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    
                </li>
                <li class="panel">
                    <a href = "<?php echo base_url()?>kang_admin/news" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i>Quản lý Tin tức
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    
                </li>
                  <li class="panel">
                    <a href = "<?php echo base_url()?>kang_admin/student_management" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i>Quản lý Học sinh
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    
                </li>
            </ul>

        </div>
      
        <div style="padding-top:30px;" id="content">
             
           <?php echo $output; ?>
            

        </div>
       
        
    </div>

    <div id="footer">
        <p>Admin kangaroo &nbsp;2016 &nbsp;</p>
    </div>
   
  
</body>

   
</html>
