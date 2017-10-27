<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   <?php $this->load->view("commons/title_all")?>
      <base href="<?php echo base_url(); ?>">
      <?php $this->load->view("ikmc/commons/header_tag");?>
        <link type="text/css" rel="stylesheet" href="css/violympic/test_config.css">
    </head>
    <script>
        
    function go_to_level(level){
        var lang = $("#lang").val();
        window.location.assign("challenge/level/" + level + "/" + lang);
    }
        
        
        function set_lang(str_lang){
            lang = str_lang;
            label_course = (lang == 'vi' ? 'Click vào level bạn muốn làm':"Click on your level");
            level_text = (lang == 'vi' ? 'Cấp độ':"Level");
            modal_header = (lang == 'vi' ? 'Thông báo':"Notice");
            $("label[for='course']").text(label_course);
            $(".level_text").html(level_text);
            $(".modal-title").html(modal_header);
            $("#lang").val(lang);
            
        }
        
        $(document).ready(function(){
            var lang = "vi";
            $("#lang").val(lang);
            $("#lang_vi").click(function(){
                set_lang("vi");
            });
            $("#lang_en").click(function(){
                set_lang("en");
            });
        });
    </script>



    <body> 


       
        
        <div class="wrapper">
            <?php  $this->load->view("ikmc/commons/header_all");?>
       
    
            <div class=" center_block">

                <form name="form" id="form" method="POST" action="<?php echo base_url(); ?>violympic/test/">

                    <fieldset style="min-width: 400px; width: auto;">
                        <div class="tag">
                            
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active" id = "lang_vi"><a aria-controls="home" role="tab" data-toggle="tab" ><?php echo $lang == "vi" ? "Tiếng Việt" : "Vietnamese"?></a></li>
                                <li role="presentation" id = "lang_en"><a aria-controls="profile" role="tab" data-toggle="tab" onclick = "set_lang('en');"><?php echo $lang == "vi" ? "Tiếng Anh" : "English"?></a></li>
                            </ul>
                            <input type="hidden" id="lang" name="lang" value=""></input>
                        </div>
                        <div >
                            <label style="font-weight: normal; font-size: 20pt; color: #1919ce; margin: 20px;" for="course"><?php echo $lang == 'vi' ? 'Click vào level bạn muốn làm' : 'Click on your level' ?></label>
                            
                        </div>
                        <div class="level_select">
                            <?php foreach($list_level as $obj):?>               
                                <div class="col-md-3 text-center box-button">
                                    <div class="btn col-md-12 <?php echo $obj->level_challenge > $user_level ? "btn-danger" : "btn-success"?>" <?php echo $obj->level_challenge > $user_level ? "data-toggle='modal' data-target='#modalAlert'" : "onclick='go_to_level({$obj->level_challenge})'"?>>
                                        <span class="level_text">Cấp độ </span> <?php echo $obj->level_challenge;?>
                                    </div>
                                </div>
                            
                            <?php endforeach;?>
                            


                        </div>

                        

                    </fieldset>

                </form>
                <div id="modalAlert" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông báo</h4>
                      </div>
                      <div class="modal-body">
                        <p>Bạn chỉ được làm các cấp độ màu xanh</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>

            </div>

         
            
		

        </div>



        <div class="immense_line">

            <hr>

        </div>

       <?php $this->load->view("ikmc/commons/footer_all");?>

    </body>

</html>

    

    

