<script type="text/javascript">
    window.onload = function(){
        var check =<?php echo count($list_notice)?>;
        if(check!= 0){
            if(window.location.href == 'http://kangaroo-math.vn/'){ 
           // alert(window.location.href);
            document.getElementById('popup1').style.display = "block";
            document.getElementById('popup1-full').style.display = "block";
            
            
            }else{
                $('.alert-thongbao').show();
            }
        }
        
    }
</script>
 <link type="text/css" rel="stylesheet" href="css/ikmc-popup.css" />
       
        <script src="js/ikmc-popup.js"></script>
        
<!--------------------Thong bao THEM VAO BODY------------------->


<img hidden=""  class="alert-thongbao" style="position:fixed; z-index:1000; bottom:0px; left:0px;" style="position:absolute;display: none;" src="img/<?php echo $lang;?>_thongbao.png">
<div id="popup1-full"   <?php echo count($list_notice) == 0 ? "hidden" : "";?>  style="position:absolute;display: none;"></div>

<div id="popup1"  <?php echo count($list_notice) == 0 ? "hidden" : "";?> style = "display: none;">
    
    <div id="main">
    	<div style="float:right">
        	<img class="alert-close" style="margin-top:-30px; margin-right:-35px" width="30px" height="30px" src="img/close.png">
        </div>
		<div style="height:76%; clear:both;" class="alert alert-1 alert-success" role="alert">
        	<h4 class="alert-title-1">1. <?php echo $list_notice[0][$lang.'_title']?></h4>
            <div class="alert-content-1" style="padding:20px;overflow:auto;" font-size:14px;">
            	<?php echo $list_notice[0][$lang.'_content_full']?>
                             
                                
            </div>
        </div>
        <?php 
            for($i = 1; $i < count($list_notice); $i++)
            {
        ?>
        <div class="alert alert-<?php echo $i+1;?> alert-info" role="alert">
        	<h4 class="alert-title-2">2. <?php echo $list_notice[$i][$lang.'_title']?></h4>
            <div hidden="" class="alert-content-2" style="padding:20px; overflow:auto;" font-size:14px;">
            					<?php echo $list_notice[$i][$lang.'_content_full']?>
                               
                                
            </div>
        </div>
        <?php
            }

        ?>
        
    </div>
</div>


    <!--------------------End Thong bao------------------->
    
    
    
    
    
    
    