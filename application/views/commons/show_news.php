<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   <?php $this->load->view("commons/title_all")?>
      <base href="<?php echo base_url(); ?>">
      <?php $this->load->view("ikmc/commons/header_tag");?>
            <!-- <script src="template/frontend/scripts/jquery.js"></script>
            <script src="template/frontend/scripts/javascript.js"></script>
            <script src="js/enmath_frontend/bootstrap.min.js"></script> -->
          
                        <link type="text/css" rel="stylesheet" href="css/violympic/test_config.css">
                           
                            <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
 
   <!--  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" /> -->
    </head>
   


    <body> 


       
        
        <div class="wrapper">
            <?php  $this->load->view("ikmc/commons/header_all");?>
       
    
            <div class=" center_block">
                <div>
                    <img src= '<?php echo base_url()."/img/news/".$value['avartar'];?>' class="img-circle" alt = 'Avartar image' width = '50px' heigth = '50px' />
                </div>
                <div>
                    <?php echo "<b>".$value['title']."</b>";?>
                </div>
                <hr>
                <div>
                    <?php echo "<b><i>".$value['content_short']."</i></b>";?>
                </div>
                <div>
                    <?php echo $value['content'];?>
                </div>
            </div>

         
            
		

        </div>



        <div class="immense_line">

            <hr>

        </div>

       <?php $this->load->view("ikmc/commons/footer_all");?>

    </body>

    </html>



