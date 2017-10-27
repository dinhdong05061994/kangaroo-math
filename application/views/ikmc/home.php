<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>
        <body>
    
        <section class="container">
        	 <?php $this->load->view("ikmc/notice");?>      
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                <?php $this->load->view("ikmc/commons/banner");?>
                <?php $this->load->view('ikmc/partials/countdown_year_exam'); ?>
                <?php $this->load->view("ikmc/introduce_competition");?>
                <?php $this->load->view("ikmc/summer_camp");?>
                
               <!--  //$this->load->view("ikmc/competition_address") -->
                <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
           
            <?php $this->load->view("ikmc/register");?>
            
           
       
    </body>
   
</html>
