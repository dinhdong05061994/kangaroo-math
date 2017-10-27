<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <?php $this->load->view("ikmc/commons/header_tag");?>
     
    <style type="text/css">
    .wrapper .center_block {
        width: 80%;
        padding:0 0.5em;
        border: 1px solid #CCC;
        margin: 0 auto;
        background: white;
    }
    .btn{
        font-size: 13pt;
    }
    </style>  
                     
    </head>
    
    <body> 

        
        <div class="wrapper">
            <?php  $this->load->view("frontend/entertainment/header_all");?>
            
           <div id = "content">
            <?php 
                if(isset($user['choose_level'])){
                    $data['choose_level'] = $user['choose_level'];
                    $this->load->view("frontend/entertainment/show_games",$data);
                }else{
            ?>
                <div class="col-sm-10 col-sm-offset-1">
                    <h3><?php echo $lang == "en" ? "Please choose level" :"Vui lòng chọn cấp độ bạn muốn chơi"?></h3><br>
                    <button class="col-sm-3 btn btn-primary" id = "btn-1-2"><?php echo $lang == "en" ? "Level" :"Cấp độ"?> 1-2</button>
                    <button class="col-sm-3 col-sm-offset-1 btn btn-primary" id = "btn-3-4"><?php echo $lang == "en" ? "Level" :"Cấp độ" ?> 3-4</button>
                    <button class="col-sm-3 col-sm-offset-1 btn btn-primary" id = "btn-5-6"><?php echo $lang == "en" ? "Level" :"Cấp độ" ?> 5-6</button>
                </div>
            <?php
                }
            ?>
            </div> 

        </div>
        <div style="clear: both; margin-bottom: 100px;"></div>
       <?php $this->load->view("ikmc/commons/footer_all");?>
 <!--    <strong>{elapsed_time}</strong> -->
    </body>
<script type="text/javascript">
    function show_games(level){
        $.ajax({
            type: "POST",
            url: "show-game-by-level",
            data: {
                level: level
            },
            cache: false,
           success: function(html){
                $("#content").html(html);
            }
        });
    }
    $(document).ready(function(){
        $("#btn-1-2").click(function(){
            show_games("1-2");
        });
        $("#btn-3-4").click(function(){
            show_games("3-4");
        });
        $("#btn-5-6").click(function(){
            show_games("5-6");
        });
    });
</script>
    </html>



