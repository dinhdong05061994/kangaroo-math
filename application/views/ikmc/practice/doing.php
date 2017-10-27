<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view("commons/title_all");?>
    <base href="<?php echo base_url();?>"></base>
    
    <script type="text/javascript" src="<?php echo base_url();?>js/lms-main_vendor.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
    
     <link href="<?php echo base_url();?>css/practice_doing.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/ikmc.css" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>    
    
</head>
<script>
    //To type latex
    onload = function() {
       $(".latex").latex();
       $(".latex_newline").latex();
       //$("#latex").latex();
       
    }
    
    
    
    function save_result_user(year, id_code, points, result_test_record) 
    {
        
        var url = "" //$("#url").val();
        var str_string = 'year=' + year + '&id_code=' + id_code + '&points=' + points + '&result_test_record=' + result_test_record ;
                            $.ajax({
                            type: "POST",
                            url: "<?php echo base_url();?>practice/save_result_test_user",
                            data: str_string,
                            cache: false,
                           success: function(html){
                                $("#html").html(html);
                               
                            }
                            });
        return false;
    }
    function submit_form()
    {
        var num_question = document.getElementById('num_question').value;
        var id_code = parseInt(document.getElementById('id_code').value);
        var year = parseInt(document.getElementById('year').value);;
        var mark = 0;
        var mark_sub = 0;
        var num_right_ans = 0;
        var num_wrong_ans = 0;
        var result_test_record = "";
        for(i = 1; i <= num_question; i++)
        {
            var id_ques = document.getElementById('id_question_' + i).value;
            var id_topic = parseInt(document.getElementById('id_topic_question_' + i).value);
            var type = document.getElementById('type_question_' + i).value;
            var level = document.getElementById('level_question_' + i).value;
            var m = document.getElementById('mark_question_' + i).value;
            result_test_record += id_ques + ",";
            
            if(type == 1){
                var index_checked = $('input[name=ans_question_'+i+']:checked', '#form').val(); 
                var right_ans = document.getElementById('right_ans_question_' + i).value;
                if(right_ans != 0){
                    
                    //if(document.getElementById('ans_question_' + i + '_' + right_ans).checked == true)
                    if(index_checked == right_ans)
                    {
                        result_test_record += "1,";
                        mark += parseInt(m);
                        num_right_ans++;
                        document.getElementById('order_view_' + i).style.background = "rgb(0, 200, 0)";
                    }
                    else
                    {
                        if(index_checked > 0) {
                            mark_sub += parseInt(m);
                            num_wrong_ans++;   
                        }
                        result_test_record += "0,";
                        document.getElementById('order_view_' + i).style.background = "rgb(250, 0, 0)";
                    }
                    document.getElementById('ans_line_' + i + '_' + right_ans).style.background = "rgb(0, 200, 0)";
                }
            }
            else{
                var right_ans = document.getElementById('right_ans_question_' + i).innerHTML;
                right_ans = right_ans.replace(/ /g, "");
                right_ans = right_ans.toLowerCase();
                var user_ans = document.getElementById('user_ans_' + i).value;
                user_ans = user_ans.replace(/ /g, "");
                user_ans = user_ans.toLowerCase();
                if( user_ans == right_ans)
                {
                    result_test_record += "1,";
                    array_topic_result[id_topic][2 + 2*level]++;
                    mark += parseInt(m);
                    num_right_ans++;
                    document.getElementById('order_view_' + i).style.background = "rgb(0, 200, 0)";
                }
                else{
                    if(user_ans != "") {
                        mark_sub += parseInt(m);
                        num_wrong_ans++;   
                    }
                    result_test_record += "0,";
                    document.getElementById('order_view_' + i).style.background = "rgb(250, 0, 0)";
                }
                document.getElementById('right_ans_' + i).hidden = false;
            }
            document.getElementById('question_hint_' + i).hidden = false;
            document.getElementById('question_key_' + i).hidden = false;
            
        }
        
        
        stopDemNguoc = true;
        $('input').attr('disabled',true);
        var time_test_real = document.getElementById("time_test").value - time;
        var min = parseInt(time_test_real / 60);
        var sec = time_test_real % 60;
        document.getElementById('mark_test').innerHTML = mark - (mark_sub / 4);
        document.getElementById('num_right_ans').innerHTML = num_right_ans + "/" + num_question + "  (" + (num_right_ans/num_question *100) + "%)";
        document.getElementById('num_wrong_ans').innerHTML = num_wrong_ans + "/" + num_question;
        document.getElementById('time_test_real').innerHTML = min + " <?php echo $arg['minutes'];?> " + sec + " <?php echo $arg['second'];?>";
        document.getElementById('contents').hidden = true;
        document.getElementById('submit_form').hidden = true;
        document.getElementById('result_test').hidden = false;
        document.getElementById('action_after').hidden = false;
        save_result_user(year, id_code, mark - (mark_sub / 4), result_test_record);
    }

    function show_hidden_hint(i)
    {
        var hint_title = document.getElementById('hint_title_' + i).innerHTML;
        if(hint_title == "<?php echo $arg['show_hint'];?>")
        {
            document.getElementById('hint_content_' + i).hidden = false;
            document.getElementById('hint_title_' + i).innerHTML = "<?php echo $arg['hide_hint'];?>";
            document.getElementById('key_content_' + i).hidden = true;
        }
        if(hint_title == "<?php echo $arg['hide_hint'];?>")
        {
            document.getElementById('hint_content_' + i).hidden = true;
            document.getElementById('hint_title_' + i).innerHTML = "<?php echo $arg['show_hint'];?>";
        }
    }
    function show_hidden_full_key(i)
    {
        var key_title = document.getElementById('hint_title_' + i).innerHTML;
        if(key_title == "<?php echo $arg['full_key'];?>")
        {
            document.getElementById('key_content_' + i).hidden = false;
            document.getElementById('key_title_' + i).innerHTML = "<?php echo $arg['hide_full_key'];?>";
            document.getElementById('hint_content_' + i).hidden = true;
        }
        if(key_title == "<?php echo $arg['hide_full_key'];?>")
        {
            document.getElementById('key_content_' + i).hidden = true;
            document.getElementById('key_title_' + i).innerHTML = "<?php echo $arg['full_key'];?>";
        }
    }
    function review()
    {
        document.getElementById('action_after').hidden = true;
        document.getElementById('contents').hidden = false;
    }
    
    var stopDemNguoc = false;
    function demNguoc()
    {   
        
        if(stopDemNguoc == true) return;
        if(time > 0)
        {   
            time -=1;
            var min = parseInt(time / 60);
            var sec = time % 60;
            var s = min + ":";
            if(min < 10) s = "0" + s;
            if(sec < 10) s = s + "0";
            s += sec;
            document.getElementById("txtTime").innerHTML = s;
            setTimeout("demNguoc()", 1000);    
        }
        else
        {
            alert("Bạn đã hết thời gian làm bài.");
            submit_form();
        }       
    }
    
    
</script>

<body>
    	<section style="width:100%;" class="container">
        	<?php $this->load->view("ikmc/commons/header_all");?>
            <section class="content">
            	
            	<section class="baithithu">
                	
  <div style="width:80%; margin:0px auto;">
    	<div class="row">
			<section class="row ct">
           	<!--End .Nav-->
            <?php if(isset($list_question) && count($list_question) >0){?>
                <form name="form" id="form">
                    <div class="result_test" id="result_test" hidden="" style="margin-top: 45px;" >
                        <div class="info_line">
                            <?php echo $arg['points'];?>: 
                            
                        </div>
                        <div class="info_line">
                            <span class="mark_test" id="mark_test">0</span>
                        </div>
                        <div class="info_line">
                            <?php echo $arg['num_right'];?>: <span id="num_right_ans" class="num_right_ans">0</span>
                        </div>
                        <div class="info_line">
                            <?php echo $arg['num_wrong'];?>: <span class="num_wrong_ans" id="num_wrong_ans">1</span>
                        </div>
                        <div class="info_line">
                            <?php echo $arg['time_test'];?>: <span id="time_test_real" class="time_test_real">1</span>
                        </div>
                        
                    </div>
                    <div class="action_after" id="action_after" onclick="review();" hidden="">
                            <?php echo $arg['review'];?>
                        </div>
                    <div class="contents" id="contents">
                        <div class="title_code"><?php echo $code_title; ?></div>
                        <div class="title_question"><?php echo $arg['title'];?></div>
                        <div class="list_question" id = "list_question">
                            <input hidden="" id="num_question" value="<?php echo count($list_question); ?>"/>
                            <input hidden="" id="time_test" value="<?php echo $time_test; ?>"/>
                            <input hidden="" id="id_code" value="<?php echo $list_question[0]['id_code']; ?>"/>
                            <input hidden="" id="year" value="<?php echo $list_question[0]['year']; ?>"/>
                            
                        <?php 
                        $order_question = 0;
                        $part = "0";

                        foreach($list_question as $question)
                        {
                            $order_question++;       
                        ?>
                        <?php 
                            if($question['part'] != $part)
                            {
                                $part = $question['part'];
                        ?>
                            <div class="part">Part <?php echo $part;?></div>
                        <?php
                            }
                        ?>
                            
                            <div class="one_question">
                                <input hidden="" id="id_question_<?php echo $order_question;?>" value="<?php echo $question['id'];?>"/>
                                <input hidden="" id="id_topic_question_<?php echo $order_question;?>" value="<?php echo $question['id_topic'];?>"/>
                                <input hidden="" id="type_question_<?php echo $order_question;?>" value="<?php echo $question['type'];?>"/>
                                <input hidden="" id="level_question_<?php echo $order_question;?>" value="<?php echo $question['level'];?>"/>
                                <input hidden="" id="mark_question_<?php echo $order_question;?>" value="<?php echo $question['mark'];?>"/>
                                <div class="question_header">
                                    <div class="question_order">
                                        <div class="order_view" id="order_view_<?php echo $order_question; ?>" ><?php echo $order_question;?></div>
                                    </div>
                                    <div class="question_content">
                                        <?php echo $question['content'];?>
                                        <?php
                                        if($question['img'] != "")
                                        {
                                        ?>
                                            <div><img src="<?php echo base_url().'images/test_question/'.$question['img'];?>"/></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="question_hint" id="question_hint_<?php echo $order_question; ?>" hidden="">
                                    <div class="hint_title" id="hint_title_<?php echo $order_question;?>" onclick="show_hidden_hint(<?php echo $order_question;?>);"><?php echo trim($question['hint']) != '<p></p>' ? $arg['show_hint'] : ""?></div>
                                    <div class="hint_content" id="hint_content_<?php echo $order_question; ?>" hidden="">
                                        <?php echo $question['hint'];?>
                                        <?php 
                                        if($question['hint_img'] != "")
                                        {
                                        ?>
                                            <div><img src="<?php echo base_url().'images/test_question/'.$question['hint_img'];?>"/></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="question_key" id="question_key_<?php echo $order_question; ?>" hidden="">
                                    <div class="key_title" id="key_title_<?php echo $order_question;?>" onclick="show_hidden_full_key(<?php echo $order_question;?>);"><?php trim($question['full_key_img']) != '' ? $arg['full_key'] : ""?></div>
                                    <div class="key_content" id="key_content_<?php echo $order_question; ?>">
                                        <?php echo $question['full_key'];?>
                                        <?php 
                                        if($question['full_key_img'] != "")
                                        {
                                        ?>
                                            <div><img src="<?php echo base_url().$question['full_key_img'];?>"/></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                
                                </div>
                                <div class="question_ans">
                                <?php 
                                if($question['type'] == 1)
                                {    
                                ?>
                                    <div class="ans_title"><?php echo $arg['choose_comment'];?></div>
                                    <div class="ans_content" id="ans_content_<?php echo $order_question; ?>">
                                    <ul class="list-inline">
                                    <?php 
                                    $order_radio = 1;
                                    $order_wrong_ans = 1;
                                    while($order_radio <= $question['wrong_ans_test']+1)
                                    {
                                        
                                    ?>
                                        <?php 
                                        if($order_radio == $question['order_right_ans'])
                                        {
                                        ?>
                                        <li>
                                        <div class="ans_line" id="ans_line_<?php echo $order_question."_".$order_radio; ?>">
                                            <input type="radio" name="ans_question_<?php echo $order_question; ?>" id="ans_question_<?php echo $order_question."_".$order_radio; ?>" value="<?php echo $order_radio; ?>"/>
                                            <?php echo $title_order_ans[$order_radio].$question['right_ans'];?>
                                            <?php 
                                            if($question['ra_img'] != "")
                                            {
                                            ?>
                                            <img src="<?php echo base_url().'images/test_question/'.$question['ra_img'];?>"/>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        </li>
                                        <?php
                                            
                                        }
                                        else
                                        {
                                        ?> 
                                        <li>
                                        <div class="ans_line" id="ans_line_<?php echo $order_question."_".$order_radio; ?>">
                                            <input type="radio" name="ans_question_<?php echo $order_question; ?>" id="ans_question_<?php echo $order_question."_".$order_radio; ?>" value="<?php echo $order_radio; ?>"/>
                                            <?php echo $title_order_ans[$order_radio].$question['wrong_ans_'.$order_wrong_ans];?>
                                            <?php 
                                            if($question['wa_img_'.$order_wrong_ans] != "")
                                            {
                                            ?>
                                            <img src="<?php echo base_url().'images/test_question/'.$question['wa_img_'.$order_wrong_ans];?>"/>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        </li>
                                    <?php
                                            $order_wrong_ans++;
                                        }
                                        $order_radio++;
                                        
                                    }
                                    ?> 
                                    <input hidden="" id="right_ans_question_<?php echo $order_question;?>" value="<?php echo $question['order_right_ans'];?>"/>  
                                    </ul>
                                    </div>
                                <?php 
                                }
                                else{                    
                                ?>
                                     <div class="ans_title"><?php echo $arg['fill_comment'];?></div>
                                    <div class="ans_content">
                                        <div class="ans_line">
                                            <input type="text" id="user_ans_<?php echo $order_question;?>" value=""/>
                                        </div>
                                        <div class="ans_line" id="right_ans_<?php echo $order_question;?>" hidden="">
                                            <?php echo $arg['right_ans'];?>: <span id="right_ans_question_<?php echo $order_question;?>"><?php echo $question['right_ans']?></span>
                                            <?php 
                                            if($question['ra_img'] != "")
                                            {
                                            ?>
                                            <img src="<?php echo base_url().'images/test_question/'.$question['ra_img'];?>"/>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php 
                                }
                                ?>
                                </div>
                                
                            </div>
                        <?php } ?>
                            
                        </div>
                    </div>
                    
                </form>
                    <div class="submit_form" id="submit_form" >
                            <img src="<?php echo base_url();?>img/kangaroo/dong_ho.png"/>
                            <b id="txtTime" class="time_test">00:00</b>
                            <div class="end_test" onclick="submit_form();"><?php echo $arg['action'];?></div>
                            
                    </div>
            <?php }else{?>
                 <div class="contents" id="contents">
                        <div class="title_code"><?php echo $code_title; ?></div>
                        <div class="title_question"></div>
                        <div class="list_question" id = "list_question" style="background: #eee;">
                    
                            <p style="padding:30px 0; text-align: center; font-size: 14pt; font-weight: bold;"><?php echo $lang == 'vi'? "Xin lỗi, hiện tại chưa có câu hỏi cho phần thi bạn đã chọn.":'No questions, please excuse!'?></p>
                    </div>
                    <button onclick = "javascript:history.go(-1)" class="btn btn-lg col-sm-offset-1" style="margin: 50px auto;"><?php echo $lang == 'vi'? 'Quay lại':'Go back'?></button>

            <?php   }?>
            </section>

        </div>
	</div>
                    
    </section>
    </section><!--End .baithithu-->
    </section>
    <?php $this->load->view("ikmc/commons/footer_all");?>
    
                
               
               
                
                           
    </body>
   

<script>
    <?php if(isset($list_question) && count($list_question) >0){?>
     var time = document.getElementById("time_test").value;
     demNguoc();

     $(document).ready(function() {
        //var aboveHeight = $(document).height();
        //alert(aboveHeight + "+" + screen.height);
        if($(document).height() - 100 > screen.height) $(' .submit_form').css('position','fixed').next().css('bottom','0px');
        //alert(aboveHeight + "-" + screen.height + "=" + $(window).scrollTop());
        $(window).scroll(function(){
           //alert($(document).height() + "-" + screen.height + "=" + (aboveHeight - screen.height) + "<>" + $(window).scrollTop());
            if ($(window).scrollTop() < $(document).height() - screen.height - 290){
            $('.submit_form').css({"position":"fixed","width":"82%"});
             //alert($(window).scrollTop() + "+" + aboveHeight);

            } else {
                $('.submit_form').css({"position":"relative","width":"100%"});
                
            }
        });
    });
     <?php   }?>
</script>
</html>