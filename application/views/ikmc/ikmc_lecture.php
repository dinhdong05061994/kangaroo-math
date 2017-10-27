<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>
	<script type="text/javascript" async
      src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
    </script> 
      </head>
        <body>
	<script type="text/javascript">
    	 	//To type latex
    		onload = function() {
       		$(".latex").latex();
       		$(".latex_newline").latex();
       		//$("#latex").latex();
       
    		}
	</script>
        <section class="container">
        	 <?php $this->load->view("ikmc/notice");?>      
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
               
                <?php 
                 $add_data['user'] = $this->session->all_userdata();
                 $add_data['user']['c_user']=$this->practice_model->getuser($add_data['user']['id']);
                 $birth = explode("/", $add_data['user']['c_user']['birthday']);
                if(count($birth)>=3){
                     $add_data['user']['c_user']['birthday']=  $birth[2]."-". $birth[1]."-". $birth[0];
                }
                // var_dump( $add_data['user']['c_user']);
                 
                $this->load->view("ikmc/commons/lecture",$add_data['user']);
                  //$this->load->view("ikmc/commons/col_news");
                ?>

                <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
           
            <?php $this->load->view("ikmc/register");?>
            
           
       
    </body>
   
</html>
