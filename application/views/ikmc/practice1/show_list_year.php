                          
                              
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php $this->load->view("ikmc/commons/header_tag");?>
      </head>
        <body>
    
        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content" id="content">
                <!------Grade------>
                <section style="background:#fff;" class="row">
                    <section class="container-3">
                        <div class="tag">
                            
                              
                            
                           
                        </div>
                        <h1><i><?php echo $lang == "vi" ? "Chọn Level" : "Choose practice tests"?></i></h1>
                        <?php $id_week = $this->uri->segment(3); ?>
                        <section class="grade" id="show_grade">
                             <?php
                                foreach($list_course as $year)
                                {
                                    
                            ?>
                                <div class="grade col-sm-4" onclick="choose_grade(<?php //echo $code['id'];?>);">
                                    <a href="<?php echo base_url().'summer/choose_week_number/'.$year['id'];?>"><img src="img/class.jpg" class="img-responsive" /></a>
                                    <h4 style="text-align: center;"><?php echo $lang == "en" ? ($year['id'] == 1 ? "Grade 1-2" : ($year['id'] == 4 ? "Grade 3-4" : ($year['id'] == 5 ? "Grade 5-6" : ($year['id'] == 6 ? "Grade 7-8" : $year['name'])))):$year['name'];?></h4>
                                </div><!--End bkt-item-->
                            <?php
                                }
                            ?>
                            
                        </section>
                        <section class="test" id="show_year" style="display: none">
                        </section>
                        
                        <section class="col-sm-12 clearfix" onclick="back_choose();" id="btn_back" >
                            <a href="<?php echo base_url().'summer/choose/';?>"><img src="img/back.jpg"></a>
                        </section>
                    </section>
                </section><!---End .Grade-->
                    
                <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
                   
            
           
       
    </body>
   
</html>
