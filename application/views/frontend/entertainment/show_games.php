<style type="text/css">
    .line-color{
         width: 19%;
         height: 2px;
         float: left;
    }
    .box-game{
        float: left;
        border-radius: 5px;
        background: #b86df6;
        height: 230px;

    }
    .img-left{
        float: left;
        margin: 3% 0;
        height: 47%;
        padding: 0;
    }
    .img-left img{
        width: 100%;
        height: 100%;
        border: 2px solid yellow;
        background: #fff;
        
    }
    .introduce-right{
        float: left;
        margin: 3% 0;
        font-family: sans-serif,cursive;
        font-weight: bold;
    }
    .introduce-under{
        padding: 2%;
        font-family: sans-serif,cursive;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .btn-play{
        position: absolute;
        bottom: 5%;
        right: 5%;
        font-size: 13pt;
        font-family: sans-serif;
        font-weight: bold;
        border-radius: 15px;
        background: #9f44ce;
        border: #7f34a5;
        color: #fff;
    }
</style>
<div class="col-sm-10 col-sm-offset-1">
        <button class="col-sm-3 btn" id="btn-go-back-choose">← <?php echo $lang == "en" ?"Go back and choose level" :"Quay lại chọn level"?></button>
    </div>
 <div class="col-sm-10 col-sm-offset-1">
    <h2><img src="images/entertainment/flag.png" width="70px"><?php echo $lang == "en" ? "Games" : "Các trò chơi"?> <?=(isset($choose_level) ? ($choose_level == 1 ? "( 1-2 )" :($choose_level == 2 ? "( 3-4 )":($choose_level == 3 ?"( 5-6 )":""))): "")?></h2>
    <div class="line-color" style="background: yellow;">
    </div>
    <div class="line-color" style="background: #019cf3;">
    </div>
    <div class="line-color" style="background: red;">
    </div>
    <div class="line-color" style="background: #22e309;">
    </div>
    <div class="box-game col-sm-5" style="margin: 5% 15% 0 0;">
        <div class="img-left col-sm-5">
            <img src="images/entertainment/anhgame.png">
        </div>
        <div class="introduce-right col-sm-7">
            <h4 style="color: #fff;font-weight: bold; font-size: 16pt;"><?php echo $lang == "en" ? "Remember number" : "Nhớ số"?>!</h4>
            <h4 style="color:#5c2161;font-weight: bold;"><?php echo $lang == "en" ? "Enter correctly number you see" : "Nhập đúng những con số bạn nhìn thấy nhé"?></h4>
        </div>
        <div class="introduce-under col-sm-9">
            <div style="font-size: 12pt;">
                <span style="color: #5c2161;"><?php echo $lang == "en" ? "Subject" : "Lĩnh vực"?>:</span>
                <span style="color: #fff;"> <?php echo $lang == "en" ? "Math" : "Toán"?></span>
            </div>
            <div style="font-size: 12pt;">
                <span style="color: #5c2161;"><?php echo $lang == "en" ? "How to play" : "Cách chơi"?>:</span>
                <span style="color: #fff;"><?php echo $lang == "en" ? "Remember and reentry number" : "Nhớ và điền lại số"?> </span>
            </div>
        </div>
        <button class="col-sm-2 btn-play btn btn-default" id="play-game-1"><?php echo $lang == "en" ? "Play" : "Chơi"?> </button>
    </div>
     <!-- <div class="box-game col-sm-5" style="margin: 5% 0 0 0;">
     </div> -->
  </div>
  <script type="text/javascript">
      $(document).ready(function(){
        $("#play-game-1").click(function(){
            window.location.href="tro-choi-nho-so";
        });
        $("#btn-go-back-choose").click(function(){
            $.ajax({
                type: "GET",
                url: "entertainmentcorner/unset_choose_level_game",
                data: {},
                cache: false,
                success: function(html){
                    window.location.href="goc-giai-tri";
                }
            });
        });
      });

  </script>