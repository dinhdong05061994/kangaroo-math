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
            <?php if($this->session->flashdata('success')){?> 
                <div class="row" id="notification">
            <div style="margin-top:20px; height: 30px; " class="col-sm-6">
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
</div></div></div>
              <?php } ?>

          <?php if($this->session->userdata('no_level')){?> 
              <div style="z-index:1001;position: fixed; top:0;width: 100%; height: 100%;background: #eee; opacity: 0.7;"></div>
                <div class="col-sm-6 col-sm-offset-3 alert alert-info" style="z-index:1002;font-size: 14pt;position: absolute; margin-top:10%; top:1%;">
                  <p><h2>No level?</h2></p><p> <?php echo $this->session->userdata('no_level'); ?></p>
                  <p id="erorr-choose-val"></p>
                  <div class="form-group">
                    <select class = "form-control " id = "choose-level" name = "choose-level">
                      <option value="" hidden="" disabled="" selected="">Chọn level (cấp độ lớp) của bạn</option>
                      <option value="1">Lớp 1-2</option>
                      <option value="2">Lớp 3-4</option>
                      <option value="3">Lớp 5-6</option>
                      <option value="4">Lớp 7-8</option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-default" id= "sb-choose">Chọn</button>
                  <button type="button" class="btn btn-default" id = "no-choose-level">Hủy</button>
                </div>
              
              <?php } ?>
     
                <?php 
                 $add_data['user'] = $this->session->all_userdata();
                 $add_data['user']['c_user']=$this->practice_model->getuser($add_data['user']['id']);
                 $birth = explode("/", $add_data['user']['c_user']['birthday']);
                if(count($birth)>=3){
                     $add_data['user']['c_user']['birthday']=  $birth[2]."-". $birth[1]."-". $birth[0];
                }
                // var_dump( $add_data['user']['c_user']);
                 


                $this->load->view("ikmc/commons/detail_user",$user_information);
                  //$this->load->view("ikmc/commons/col_news",$add_data['user']);
                ?>

                <?php $this->load->view("ikmc/commons/organizers");?>
                <?php $this->load->view("ikmc/commons/footer_all");?>
            </section>
        </section>
           
            <?php $this->load->view("ikmc/register");?>
            
           
       
    </body>
   <script type="text/javascript">
     $(document).ready(function(){
      $(".close").click(function(){
        $("#notification").slideUp("slow");
      });
      $("#no-choose-level").click(function(){
        window.location.href = "<?=base_url();?>user_controller/logout";
      });
      $("#sb-choose").click(function(){
        var level = $("#choose-level").val();
       
        //level = level =='' ? level : level.replace(/\s/g, "");
       // var reg = '/^([1-4])$/g';//'/^([1|2|3|4)$/g'
        if(level == '' || (level != 1 && level != 2 && level != 3 && level != 4)){
          $("#erorr-choose-val").text("Bạn chưa chọn level hoặc thao tác chọn lỗi. Vui lòng thực hiện lại. Cảm ơn!");
        }else{
          $.ajax({
            type: "POST",
            url: "summer/update_level",
            data: {level: level},
            cache: false,
           success: function(html){
                window.location.reload();
            }

            });
        }
      });
     });
   </script>
</html>
