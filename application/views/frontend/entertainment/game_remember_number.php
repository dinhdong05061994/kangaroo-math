                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <?php $this->load->view("ikmc/commons/header_tag");?>
       <!--  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="css/ikmc.css" /> -->
     
    <style type="text/css">
    .wrapper .center_block {
        width: 80%;
        padding:0 0.5em;
        border: 1px solid #CCC;
        margin: 0 auto;
        background: white;
    }
    </style>  
                     
    </head>
    
    <body> 

        
        <div class="wrapper">
            <?php  //$this->load->view("ikmc/commons/header_all");
                $this->load->view("frontend/entertainment/header_all");
            ?>
            <div class=" center_block">
              
               <?php $this->load->view("frontend/entertainment/game1");?>
            </div>

        </div>
        
       <?php $this->load->view("ikmc/commons/footer_all");?>

    </body>
<script type="text/javascript">
    $(document).ready(function(){
        scrollTo(0,$(".header").height());
    });
</script>
    </html>



