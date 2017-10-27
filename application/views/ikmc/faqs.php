<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>
        <body>
    
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
               
               
              
                <!-------Gioi thieu-------->
                <section style="background:#fff;" class="container">
            	<section class="clearfix container-3 gioithieu">
                    	<h3 class="gioithieu-h3">Frequenlty Asked Questions</h3>
                        <?php echo $arg[$lang.'_faqs']; ?>
                </section>
              
               </section>
                
                
                <!----End gioi thieu------>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
                   
            <?php $this->load->view("ikmc/register");?>
           
       
    </body>
   
</html>
