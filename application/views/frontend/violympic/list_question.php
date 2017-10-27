<html xmlns="https://www.w3.org./1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
    <meta http-equiv="Content-Language" content="vi" />
    <?php $this->load->view("commons/title_all")?>
    <base href="<?php echo base_url();?>"/>
    <link href="<?php echo base_url();?>css/violympic/tracnghiem.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/violympic/style.css" rel="stylesheet" type="text/css"/>
     <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>    
    <script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
    });
    MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
</script>
<script type="text/javascript">
   history.replaceState( {} , '', 'violympic' );
</script>
   
</head>
<style>
    .latex{
        padding-bottom: 8px !important;
        font-weight: bold !important;
    }
    .q_done_button{
        width: 60% !important;
        padding-bottom: 15px !important;
    }
    #google_translate_element{
            
    }
    .alert-info {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
</style>
<script>
    //To type latex
    onload = function() {
      
    }
      var lang = "<?php echo $lang;?>";
    function insertRecordTest(result,list_right_ans) 

    {

        

        var url = "" //$("#url").val();

        var str_string = 'result=' + result +'&lang='+lang+"&list_right_ans="+list_right_ans;
        console.log(str_string);
                            $.ajax({

                            type: "POST",

                            url: "violympic/insert_record_test",

                            data: str_string,

                            cache: false,

                           success: function(html){
                                //alert(html);
                            }

                            });
    return false;

    } 
   
    function CheckDapAn()
    {   
        document.getElementById("timedownd").style.display = "none";
        
        var type_test = document.getElementById("type_test").value;
        var f = "form";
        var diem = 0;
        var point_max = 0;
        var cauDung = 0;
        var causai = 0;
        var diemcausai = 0;
        var listquestion_num = document.getElementById("listquestion-num").value;
        //var q_level0_count = 0;
        
        var course_id = document.getElementById("course_id").value;
        var r_basic = 0;
        var t_basic = 0;
        

        var r_medium = 0;
        var t_medium = 0;
        

        var r_advanced = 0;
        var t_advanced = 0;
        

        var wrong_list_text = "";
        var list_right_ans="";

        var arr_result = new Array();

        
        
        for(var i = 1; i <= listquestion_num; i++)
        {
            var id = "Cau" + i; 
            var id_question = document.getElementById('id' + id).value;
            var type = document.getElementById("loai" + id).value;
            
            point_max += parseInt(document.getElementById("diem" + id).value);

            
            
            var level = document.getElementById("level" + id).value;
            var topic_id = document.getElementById('topic_id' + id).value;
            var index_lecture = find_lecture(arr_result, topic_id);
            if(index_lecture == -1){
                index_lecture = arr_result.length;
                arr_result[index_lecture] = new Array();
                arr_result[index_lecture][0] = topic_id;
                arr_result[index_lecture][1] = 0; //số câu đúngdễ
                arr_result[index_lecture][2] = 0; //so cau dễ
                arr_result[index_lecture][3] = 0; //số câu đúng khó
                arr_result[index_lecture][4] = 0;  //số câu khó
                arr_result[index_lecture][5] = 0;  //diem dat duoc
                arr_result[index_lecture][6] = 0;  //diem toi da
                arr_result[index_lecture][7] = 0;  //số câu đúng trung bình
                arr_result[index_lecture][8] = 0; //số câu trung bình
                arr_result[index_lecture][9] = 0; //diem dat duoc phan dẽ
                arr_result[index_lecture][10] = 0;  //diem toi da phần dễ
                arr_result[index_lecture][11] = 0;  //diem dat duoc phan trung binh
                arr_result[index_lecture][12] = 0;  //diem toi da phan trung binh
                arr_result[index_lecture][13] = 0;  //diem dat duoc phan kho
                arr_result[index_lecture][14] = 0;// diem toi da phan khó

            }
            if(level == 1 || level == '1' ){
                arr_result[index_lecture][2]++;
                t_basic++;
                arr_result[index_lecture][10] += parseInt(document.getElementById("diem" + id).value);
            }
            else  if(level == 3 || level == '3' ){
                arr_result[index_lecture][4]++;
                t_advanced++;
                arr_result[index_lecture][14] += parseInt(document.getElementById("diem" + id).value);
            }else  if(level == 2 || level == '2' ){
                arr_result[index_lecture][8]++;
                t_medium++;
                arr_result[index_lecture][12] += parseInt(document.getElementById("diem" + id).value);
            }
            arr_result[index_lecture][6] += parseInt(document.getElementById("diem" + id).value);
            if(type == 1)//trac nghiem
            { 
                var daDung = document.forms[f].elements["da" + id].value;
                if(document.forms[f].elements[id].value == daDung || document.forms[f].elements[id][daDung].checked ) 
                {   
                    //alert( document.forms[f].elements[id].checked);
                    cauDung++;   
                    diem += parseInt(document.getElementById("diem" + id).value);
                    arr_result[index_lecture][5] += parseInt(document.getElementById("diem" + id).value);
                    document.getElementById("q_question_name_" + i).style.backgroundColor =  "rgb(0, 255, 100)";
                   list_right_ans += (list_right_ans != "" ? ','+id_question : id_question);
                    if(level == 1 || level == '1' ){
                        arr_result[index_lecture][1]++;
                        r_basic++;
                        arr_result[index_lecture][9] += parseInt(document.getElementById("diem" + id).value);
                    }
                    else if(level == 3 || level == '3' ){
                        arr_result[index_lecture][3]++;
                        r_advanced++;
                        arr_result[index_lecture][13] += parseInt(document.getElementById("diem" + id).value);
                    }else if(level == 2 || level == '2' ){
                        arr_result[index_lecture][7]++;
                        r_advanced++;
                        arr_result[index_lecture][11] += parseInt(document.getElementById("diem" + id).value);
                    }
                    
                }
                else
                {
                    //14/10/16: tuyên thêm( tính lại diem theo quy tac Kang)
                    if(document.forms[f].elements[id].value != "" ){
                            //alert(document.forms[f].elements[id].value);
                            causai ++;
                            diemcausai += parseInt(document.getElementById("diem" + id).value);
                            arr_result[index_lecture][5] -= (parseInt(document.getElementById("diem" + id).value)/4);
                            if(level == 1 || level == '1' ){
                                arr_result[index_lecture][9] -= (parseInt(document.getElementById("diem" + id).value)/4);
                            }
                            else if(level == 3 || level == '3' ){
                                arr_result[index_lecture][13] -= (parseInt(document.getElementById("diem" + id).value)/4);
                            }else if(level == 2 || level == '2' ){
                                arr_result[index_lecture][11] -= (parseInt(document.getElementById("diem" + id).value)/4);
                            }

                    }
                    //end
                    document.getElementById("q_question_name_" + i).style.backgroundColor = "rgb(250, 0, 0)";
                    document.getElementById("q_question_name1_" + i).style.color = "rgb(255, 255, 255)";
                    wrong_list_text += id_question + "," + topic_id + ";";
                }
                //document.getElementById("Cau" + i + "-" + daDung).style.backgroundColor = "rgb(27, 188, 247)";
                document.getElementById("dapandung_" + i).style.display =  "block";
                arrayRadio = document.forms[f].elements[id];
                for(var j = 0; j < arrayRadio.length; j++)
                {
                    document.forms[f].elements[id][j].disabled = "disabled";
                }
                
            }
            //else{}// nếu là điền đáp an điền đáp án //xem backup
            
            if(document.getElementById("show-hint-" + i) != null) document.getElementById("show-hint-" + i).hidden = false;
             document.getElementById("q_question_name1_" + i).style.color = "rgb(255, 255, 255)";
        }
        
        if(cauDung*2 < listquestion_num) {
            document.getElementById('q_line_info_time_test').style.backgroundColor = "#48075f";
            document.getElementById('q_line_info_time_test1').style.backgroundColor = "#48075f"; 
        }
        else if(cauDung < listquestion_num)  {
            document.getElementById('q_line_info_time_test').style.backgroundColor = "#48075f";
            document.getElementById('q_line_info_time_test1').style.backgroundColor = "#48075f"; 
        }
        else{
           
            document.getElementById('q_info_result_test2').style.color = "rgb(255, 255, 255)";
            document.getElementById('q_info_result_test2').style.float = "left";
            document.getElementById('q_info_result_test3').style.color = "rgb(255, 255, 255)";
                   
            document.getElementById('q_line_info_time_test1').style.backgroundColor = "#48075f";
            
        }
        document.getElementById('ketquatest').style.display = "block";
        document.getElementById("infotest").style.display = "none";
        document.getElementById("q_txt_soCauDung").innerHTML = cauDung + "/" + listquestion_num;
         //14/10/16 tuyen sua:
         ///cu
        var diemHe100 = Math.round(diem / point_max * 100);
        // document.getElementById("q_txt_point").innerHTML = diemHe100 ;
       //mơi
        var diem_final = (diem - diemcausai/4) +'/'+ point_max;
        document.getElementById("q_txt_point").innerHTML = diem_final ;
        //end 14/10/16

        document.getElementById("point").value = diemHe100;
        document.getElementById("q_done_button").hidden = true;
       //  document.getElementById("q_done_button").width = "60%";
           
        //document.getElementById("q_reset_button").hidden = false;
        stopDemNguoc = true;
        //console.log(arr_result);
        var result = to_string(arr_result);

        insertRecordTest(result,list_right_ans);
       
        $("#go_back_after_submit").css("display","block");
        $("#msg_num_question").hide();
        
        
    }
    function find_lecture(arr_result, lecture_id){
        for (var i = 0; i < arr_result.length; i++) {
            if(arr_result[i][0] == lecture_id) return i;
        }
        return - 1;
    }
    function to_string(arr_result){
        var str = "";
        for (var i = 0; i < arr_result.length; i++) {
            str += arr_result[i][0] + "," + arr_result[i][1]  + "," + arr_result[i][2]  + "," + arr_result[i][3]  + "," + arr_result[i][4] + "," + arr_result[i][5]  + "," + arr_result[i][6]+ "," + arr_result[i][7]+ "," + arr_result[i][8]+ "," + arr_result[i][9]+ "," + arr_result[i][10]+ "," + arr_result[i][11]+ "," + arr_result[i][12]+ "," + arr_result[i][13]+ "," + arr_result[i][14] + ";";
        }
        return str;
    }
    function showHint(i)
    {
        if(document.getElementById("question-hint-" + i) != null) 
        document.getElementById("question-hint-" + i).hidden = false;
        document.getElementById("show-hint-" + i).hidden = true;
        document.getElementById("hidden-hint-" + i).hidden = false;
    }
    function hiddenHint(i)
    {
        if(document.getElementById("question-hint-" + i) != null) 
        document.getElementById("question-hint-" + i).hidden = true;
        document.getElementById("show-hint-" + i).hidden = false;
        document.getElementById("hidden-hint-" + i).hidden = true;
    }
    function resetForm()
    {
        if(confirm("Bạn có chắc chắn muốn làm lại bài thi không?"))
        {
            var listquestion_num = document.getElementById("listquestion-num").value;
            time = document.getElementById("time-test").value;
            for(var i = 1; i <= listquestion_num; i++)
            {
                var type = document.getElementById("loaiCau" + i).value;
                if(type == 1)
                {
                    var len = document.forms["form"].elements["Cau" + i].length;
                    for(var j = 0; j < len; j++)
                    {   
                        document.getElementById("Cau" + i + "_" + j).checked = false;
                    }
                }
                // else
                // {
                //     document.getElementById("Cau" + i).value = "";
                // }
            }
        } 
    }
    
    
    var stopDemNguoc = false;
    function demNguoc()
    {   
        document.getElementById('q_line_info_time_test').style.backgroundColor = "#48075f";

        if(stopDemNguoc == true) return;
        if(time > 0)
        {   
            time -=1;
            var min = parseInt(time / 60);
            var sec = time % 60;
            var s = min + " minutes ";
            var s1=min+":"
            if(min < 10) s = "0" + s;
            if(sec < 10) s = s + "0";
            s += sec + " seconds";
            s1+=sec;
            document.getElementById("txtTime").innerHTML = s;
            document.getElementById("txtTime1").innerHTML = s1;
            setTimeout("demNguoc()", 1000);    
        }
        else
        {
            alert("Time out.");
            CheckDapAn();
        }       
    }
    
    $(document).ready(function(){
        $("#close_msg").click(function(){
            $("#msg_num_question").html("");
        });
    });
</script>
<!-- Code chống Ctrl U - F12 - Ctrl S : -->
<script>
// $(function(){if(window._userdata&&_userdata.page_desktop)window.location=_userdata.page_desktop});jQuery(document).ready(function($){var $ctsearch=$('#ct-search'),$ctsearchinput=$ctsearch.find('input.ct-search-input'),$body=$('html,body'),openSearch=function(){$ctsearch.data('open',true).addClass('ct-search-open');$ctsearchinput.focus();return false},closeSearch=function(){$ctsearch.data('open',false).removeClass('ct-search-open')};$ctsearchinput.on('click',function(e){e.stopPropagation();$ctsearch.data('open',true)});$ctsearch.on('click',function(e){e.stopPropagation();if(!$ctsearch.data('open')){openSearch();$body.off('click').on('click',function(e){closeSearch()})}else{if($ctsearchinput.val()===''){closeSearch();return false}}})});$(function(){$("img").on("error",function(){$(this).attr({alt:this.src,src:""})})});shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){}),shortcut.add("Ctrl+S",function(){}),shortcut.add("Ctrl+Shift+I",function(){}),shortcut.add("Ctrl+Shift+J",function(){}),shortcut.add("Ctrl+Shift+K",function(){}),shortcut.add("Ctrl+K",function(){}),shortcut.add("F12",function(){}),shortcut.add("Ctrl+U",function(){});
</script>

<body>  
<!-- Chống chuột phải -->
<!-- <body  onselectstart="return false" oncontextmenu="return false">   -->
    <?php //$this->load->view('commons/header_all')?>
    
    <div class="q_wrapper">
        
    <form name="form" id="form">
        <div class="q_header">
            <!--img src="<?php echo base_url();?>images/violympic/test_banner.png"/-->
        </div>
        
        <div class="q_content area_translate" >
            <div class="q_info" style="margin-top:0px;">
                <div id="infotest">
                    <input id="type_test" name="type_test" value="<?php echo $this->uri->segment(2);?>" hidden="true"/>
                    <input id="course_id" name="course_id" value="<?php echo $course_id;?>" hidden="true"/>
                    
                    <div id="q_line_info_time_test" class="q_line_info_time_test" style="/*line-height: 45px;*/
    color: yellow;
   /* height: 45px;*/
    text-align: center;
  /*   
    width: 88%;*/
    margin: 0;
    padding: 15px;
    padding-left: 105px;
    font-family: Arial, Helvetica, sans-serif;    background-color: #48075f!important;">
                        <center><p class="q_txt_time" style="color: yellow;">
                        <?php echo $lang == 'vi' ? 'Số câu hỏi: '.count($arrayQuestion).' - '.'Thời gian còn lại: <span id="txtTime" style="color:yellow">0</span></center>' : 'Number of questions:<?php echo  count($arrayQuestion);?> Remain time: <span id="txtTime" style="color:yellow">0</span></center>' ?>
                        </p>
                    </div>
                </div>
                
                <div class="q_result_test" id="ketquatest" style="display: none;">
                    <div class="q_img_result_test"><img class="q_imgEmotion" id="imgEmotion" /></div>
                    <div class="q_info_result_test" id="q_info_result_test1">
                        <div class="q_line_info">
                            <p style="color: yellow; float: left;padding: 25px;line-height: 0;" id="q_info_result_test2">
                                <i><?php echo $lang == 'vi' ? 'Trả lời đúng: ' :'Right answer: '?></i>
                                <b id="q_txt_soCauDung"></b>
                                <i><?php echo $lang == 'vi' ? 'câu hỏi' :'questions' ?>. </i> 
                            </p>
                        </div>
                        <div id="q_line_info_time_test1" class="q_line_info" style="line-height: 45px;
    color: yellow;
 /*   height: 45px;*/
    text-align: center;
    
    /*width: 88%;*/
    margin: 0;
    padding: 15px;
    padding-left: 105px;
    font-family: Arial, Helvetica, sans-serif;">
                            <p style="color: yellow;padding: 10px;line-height: 0;"id="q_info_result_test3">
                                <i><?php echo $lang == 'vi' ? 'Điểm của bạn' :'Your score' ?>: </i> 
                                <b id="q_txt_point" ></b>
                                <input id="point" name="point" value="" hidden="true"/>
                                
                            </p>
                        </div>
                   </div>    
                </div>
                
            </div>
            <div class="q_done_button btn" id = "go_back_after_submit" style="display: none; cursor: pointer;">
                <div onclick="javascript:window.location.href='summer/ikmc_detail_user';" style="height: 30px; width: 200px;    color: #fff;text-align: center; padding: 5px;border-radius: 7px;
        margin-left: 100px;
        background-color: #5cb85c;
        border-color: #4cae4c;"><?php echo $lang =='vi'? "Quay lại" : 'Go back'?></div>
            </div>
            <div class="q_list-question">      
                <div id = "msg_num_question" style="float: left;    width: 100%; position: relative; margin-top:0;">
                <?php  
                    echo (isset($message_num_quetions) ? '<div id = "info-send" class="alert alert-info" style="font-size:16px; text-align:center;width: 96%; ">'.$message_num_quetions.'</div><div id = "close_msg" style="position:absolute;right: 0; margin-right: 5%; margin-top: -85px;color: #31708f;">&times;</div>' : "");?>

                </div>          
                <input id="time-test" type="hidden" value="<?php echo $time_test?>"/>

                    <?php
                    if(isset($arrayQuestion) && $arrayQuestion != null)
                    {
                        $i = 0;
                    ?>
                    
                        <input id="listquestion-num" type="hidden" value="<?php echo count($arrayQuestion)?>"/>
                        
                    <?php
                        foreach($arrayQuestion as $question)
                        {   
                            $i++;
                    ?>
                            <div class="q_question">
                                <div class="q_question_info">
                                    <div class="q_question_name" id="q_question_name_<?php echo $i; ?>" >
                                        <p id="q_question_name1_<?php echo $i; ?>" style="border: 1px solid green;
    color: #F60;
    word-spacing: 2px;
    padding: 8px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;">
                                        <?php 
                                            echo  $lang == 'vi' ? 'Câu hỏi '.$i.' ' :"Question ".$i." ";
                                        ?> 
                                        </p>
                                    </div> 
                                    <input type="hidden" name="idCau<?php echo $i; ?>" id="idCau<?php echo $i; ?>" value="<?php echo $question['id']; ?>" />
                                    <input type="hidden" name="loaiCau<?php echo $i; ?>" id="loaiCau<?php echo $i; ?>" value="1" />

                                    <input type="hidden" name="topic_idCau<?php echo $i; ?>" id="topic_idCau<?php echo $i; ?>" value="<?php echo $question['topic']; ?>" />
                                    <input type="hidden" name="levelCau<?php echo $i; ?>" id="levelCau<?php echo $i; ?>" value="<?php echo $question['part'] == 'A' ? '1' :($question['part'] == 'C' ? '3' : ($question['part'] == 'B' ? '2' : $question['part'])); ?>" />
                                    <input type="hidden" name="diemCau<?php echo $i; ?>" id="diemCau<?php echo $i; ?>" value="<?php echo  $question['mark'];//echo $question_point[$question['year']][$question['id_code']];?>" />
                                </div>
                                <div class="q_question_body">
                                    <div class="q_question_content">
                                    <?php
                                        if($question['content'] != null && trim($question['content']) != "")
                                        {
                                    ?>
                                            <div class="q_question_text" style="font-weight: bold;">
                                            <?php 
                                                echo $question['content']; 
                                            ?> 
                                           
                                            </div>
                                    
                                    <?php
                                        }
                                        
                                    ?>
                                    
                                    </div>
                                                                                                  
                                <?php
                                
                                    if(($question['hint'] != null && trim($question['hint'] != "<p></p>")) )
                                    {
                                ?>
                                    <div id="show-hint-<?php echo $i?>" hidden="" style="margin-bottom: 1em;color: blue;cursor: pointer;" ><a onclick="showHint(<?php echo $i?>);"><?php echo $lang=='vi' ? 'Hiện gợi ý': 'Show solution'?> </a></div>
                                    <div id="hidden-hint-<?php echo $i?>" hidden="" style="margin-bottom: 0.5em; color: blue;cursor: pointer;"><a onclick="hiddenHint(<?php echo $i?>);"><?php echo $lang=='vi' ? 'Ẩn gợi ý': 'Hide solution'?></a></div>
                                    <div class="q_question_hint" id="question-hint-<?php echo $i?>" hidden="">
                                    <?php
                                        if($question['hint'] != null){
                                    ?>    
                                            <div class="q_question_hint_text">
                                                <?php echo $lang == 'vi' ? 'Gợi ý: '. $question['hint'] : 'Solution: '.$question['hint'];?>
                                            </div>
                                    <?php
                                        }
                                       
                                    ?>
                                    
                                    </div>
                                <?php
                                        
                                    }
                                ?>
                                    <div class="col-sm-12 q_question_answer" style="float: left;">
                               
                                <?php   
                                        
                                    
                                  
                                        $wrong_ans_db = 4;
                                        $wrong_ans_test = 4;
                                        for($k = 1; $k <= $wrong_ans_db; $k++)
                                        {
                                             $arrayIndexAns[$k-1] = $k;
                                        }
                               
                                        if(isset($arrayIndexAns) && $arrayIndexAns != null) shuffle($arrayIndexAns); //trộn mảng
                                        $j = rand(0, $wrong_ans_test); //sinh ngẫu nhiên vị trí để đặt đáp án đúng
                                        for($k = $wrong_ans_test; $k >$j ; $k--) //lùi các giá trị từ j trở đi, ra sau 
                                        {   
                                            $arrayIndexAns[$k] = $arrayIndexAns[$k-1];
                                        }
                                
                                        $arrayIndexAns[$j] = 0; //chèn đáp án đúng vào vị trí j
                                
                                    
                                        for($k = 0; $k <= $wrong_ans_test; $k++)
                                        {
                                            if($arrayIndexAns[$k] == 0)
                                            {
                                                $ans_content = $question['right_ans'];
                                                // $ans_img = $question['ra_img'];
                                            }
                                            else
                                            {
                                                $ans_content = $question['wrong_ans_'.$arrayIndexAns[$k]];
                                                // $ans_img = $question['wa_img_'.$arrayIndexAns[$k]];
                                            }
                                ?>
                                            <div class=" q_answer_line" style="float: left!important; <?php echo empty($ans_content)? 'min-width: 0;':'';?>">
                                                <!--<div class="q_answer_radio">-->
                                                     
                                                <!--</div>-->
                                                
                                                <div class="q_answer_content" id="Cau<?php echo $i."-".$k; ?>">
                                        
                                                		<input type="radio" name="Cau<?php echo $i; ?>" id="Cau<?php echo $i."_".$k; ?>" value="<?php echo $k; ?>"     <?php echo $j == $k ? 'style="position: relation;"':'';?> <?php echo empty($ans_content)?'hidden' :'';?>/>
                                                		<?php echo $j == $k ? "<img id='dapandung_".$i."' src='".base_url()."images/test_question/dung.png' style='    width: 20px; margin-right: -20px; margin-top: -30px;position: absolute;float:left;display:none;'>":""?>  
                                                <?php
                                                    if($ans_content != null && trim($ans_content) != ""){
                                                ?>
                                                        <div class="q_answer_text">
                                                            
                                                            <?php echo $ans_content; ?>                                                      </div>
											
                                                <?php
                                                    }
                                                    
                                                ?>
                                               </div>
                                                
                                            </div>
                                
                                <?php
                                        }
                                        $arrayIndexAns = null;
                                ?>
                                
                                            <input type="hidden" name="DACau<?php echo $i; ?>" id="daCau<?php echo $i; ?>" value="<?php echo $j; ?>" />
                                
                                
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }else{
                        echo $lang =='vi'?"Không có câu hỏi nào!":"No question!";
                    }
                    ?>
            </div>
        </div>
        <div id="q_cat_skein" style="position: fix;margin-right: 2em; width: 12em;margin-bottom: 2em;float: right; clear: none;">
                 
        </div>
        <?php 
        if(isset($arrayQuestion) && count($arrayQuestion) >0){ ?>
        <div class="q_done_button btn" id="q_done_button" >
            <div onclick="CheckDapAn();" style="height: 30px; width: 200px;    color: #fff;text-align: center; padding: 5px;border-radius: 7px;
    margin-left: 100px;
    background-color: #5cb85c;
    border-color: #4cae4c;"><?php echo $lang =='vi'? "Nộp bài" : 'Submit'?></div>            
        </div>
        <?php 
        }else{?>
        <div class="q_done_button btn">
            <div onclick="javascript:history.go(-1)" style="height: 20px; width: 200px;    color: #fff;text-align: center; padding: 5px;border-radius: 7px;
    margin-left: 100px;
    background-color: #5cb85c;
    border-color: #4cae4c;"><?php echo $lang =='vi'? "Quay lại" : 'Go back'?></div>
        </div>
    <?php }?>
        <div class="q_reset_button" id="q_reset_button" hidden="">
            <div onclick="resetForm();" style="height: 20px; width: 250px;    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c; text-align: center;padding: 5px;border-radius: 7px;
    margin-left: 100px;">Reset and start test again</div>            
        </div>
        
    </form>
    
    
    </div>
    
    
<div class="timedownd" id="timedownd" style="
    width: 170px;
    background: #248AB2;
    float: right;
    position: fixed;
    bottom: 0px;
    right: 18px;
    font-size:25px;
    border: solid 1px #fff;
    border-radius: 1px;
"><center><span id="txtTime1" style="color:#fff;
    width: 67px;
    height: 72px;"></span></center></div>
<!--PHAN FOOTER CUA TRANG WEB-->

</body>

<script>

     var time = document.getElementById("time-test").value;
     <?php
     if(isset($arrayQuestion) && count($arrayQuestion) >0){ ?>
        demNguoc();
    <?php }?>
</script>
