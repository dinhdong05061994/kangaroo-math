<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php $this->load->view("ikmc/commons/header_tag"); ?>
    </head>
    <body>

        <section class="container">
            <?php $this->load->view("ikmc/commons/header_all"); ?>
            <section class="content" id="content">
                <!------Grade------>
                <section style="background:#fff;" class="container">
                    <section class="col-sm-12">
                        <section style="margin-top:20px; color:#000;" hidden id="content-result" class="container kq-practive">

                            <section class="col-sm-12">

                                <section class="table-kq">

                                    <table style="margin-top:60px;color:#000;">
                                        <tr style="font-size: 30px">

                                            <td colspan="2"><div align="center"><h1><?=$lang == "en" ? 'RESULT' : 'KẾT QUẢ THI';?></h1></div></td>

                                        </tr>
                                        <tr style="font-size: 24px; height: 50px;">

                                            <td width="100px"><?=$lang == "en" ? 'Score' : 'Số điểm';?> </td>
                                            <td width="144"><div><h1 id="sodiem">0</h1></div></td>
                                        </tr>
                                        <tr style="font-size: 30px">



                                        </tr>

                                        
                                        <tr style="font-size: 24px; height: 50px;">

                                            <td width="250px"><?=$lang == "en" ? 'Time test' : 'Thời gian làm bài';?> </td>

                                            <td id="time_doing" width="144">0</td>

                                        </tr>

                                    </table>

                                </section>



                            </section><!--End .thống kê kêt quả-->

                            <section class="col-sm-6">

                                <label onclick="xemlai();" class="alert alert-danger pull-right"><?=$lang == "en" ? 'REVIEW TEST' : 'XEM LẠI BÀI THI';?></label>

                            </section>

                            <section class="col-sm-6">

                                <label onclick="location.reload(true);

                    window.scrollTo(0, 0);" class="alert alert-success"><?=$lang == "en" ? 'RETEST' : 'LÀM LẠI BÀI MỚI';?></label>

                            </section>

                        </section>



                    </section>
                    <div id="content-thithu" style="margin:0px auto; width: 80%">
                        <div style="border:1px solid #B9574A; font-size: 14px; margin-top: 50px;" class="" id="exercise">

                            <div id="exercise-title" class="alert alert-danger" style="line-height: 45px; color: yellow; height: 85px; text-align: center;">

                                <h3 style="color:blueviolet" class="toan"><b><?=$lang == "en" ? 'THREADS' : 'ĐỀ THI';?></b></h3>

                            </div>

                            <div id="info_board" style="margin-top: 20px;">



                            </div>



                            <script>


                        function capnhat() {



                            var num_ques = document.getElementById('listquestion-num').value;



                            for (i = 1; i <= num_ques; i++) {
                                for (var j = 0; j <= 3; j++) {
                                    var table_answ = document.getElementById('radio_an_' + i + '_' + j).checked;
                                    if (table_answ != '') {
                                        document.getElementById("question_table_" + i).style.background = "url(img/hes_img/xanh.png) top left no-repeat";
                                        document.getElementById("question_table_" + i).style.backgroundSize = "100% 100%";

                                    } else {
                                        document.getElementById("question_table_" + i).style.backgroundColor = "none";

                                    }
                                }


                            }


                            window.scrollTo(0, 0);



                        }
                        function submit_form() {


                            var lang = "<?=$lang?>";
                            var num_right = 0;
                            var num_right_toan = 0;
                            var num_right_van = 0;

                            var mark = 200;

                            var wrong_list_id = "";

                            var right_list_id = "";

                            var num_ques = document.getElementById('listquestion-num').value;



                            for (i = 1; i <= num_ques; i++) {

                                document.getElementById("question_" + i).style.color = "rgb(255, 255, 255)";

                                var type = document.getElementById("type_" + i).value;
                                var wrong_ans = document.getElementById("wrong_ans_" + i).value;
                                var wa_img = document.getElementById("wa_img_" + i).value;



                                if (wrong_ans != '' || wa_img != '') {

                                    var right_ans = document.getElementById('right_ans_' + i).value;

                                    if (document.getElementById('radio_an_' + i + '_' + right_ans).checked) {



                                        var id_question = document.getElementById("id_question_" + i).value;

                                        right_list_id += id_question + ",";

                                        num_right++;
                                        if (i > 30) {
                                            num_right_van++;
                                        } else {
                                            num_right_toan++;

                                        }

                                        mark += 10;


                                        document.getElementById("question_" + i).style.backgroundColor = "rgb(100, 234, 0)";

                                        document.getElementById("question_" + i).style.color = "rgb(255, 255, 255)";

                                        document.getElementById('check_right_ans_' + i).hidden = false;

                                        //document.getElementById("right_choice_"+i).hidden = false;

                                    } else {

                                        var id_question = document.getElementById("id_question_" + i).value;

                                        wrong_list_id += id_question + ",";

                                        document.getElementById("dapan" + i).hidden = false;

                                        document.getElementById("hind" + i).hidden = true;

                                        //document.getElementById("lamlai" + i).hidden = false;

                                        document.getElementById("question_" + i).style.backgroundColor = "rgb(250, 0, 0)";

                                        document.getElementById("question_" + i).style.color = "rgb(255, 255, 255)";

                                    }

                                } else {

                                    var right_ans = document.getElementById('right_ans_' + i).innerHTML;

                                    var ans_ques = document.getElementById('ans_ques_' + i).value;

                                    document.getElementById('daitest').innerHTML = right_ans;


                                    right_ans = right_ans.replace(/ /g, "");


                                    right_ans = right_ans.replace("\n", "");

                                    right_ans = right_ans.toLowerCase();

                                    ans_ques = ans_ques.replace(/ /g, "");

                                    ans_ques = ans_ques.replace("\n", "");

                                    ans_ques = ans_ques.toLowerCase();

                                    if (right_ans == ans_ques)

                                    {

                                        var id_question = document.getElementById("id_question_" + i).value;

                                        num_right++;


                                        mark += 10;


                                        //document.getElementById("right_choice_" + i).hidden = false;
                                        document.getElementById("question_" + i).style.backgroundColor = "rgb(100, 234, 0)";
                                        document.getElementById("question_" + i).style.color = "rgb(255, 255, 255)";
                                        document.getElementById("dapan" + i).hidden = true;


                                    }

                                    else

                                    {



                                        var id_question = document.getElementById("id_question_" + i).value;

                                        wrong_list_id += id_question + ",";

                                        document.getElementById("dapan" + i).hidden = false;

                                        document.getElementById("hind" + i).hidden = true;

                                        //document.getElementById("show_right_ans_" + i).hidden = false;

                                        document.getElementById("question_" + i).style.backgroundColor = "rgb(250, 0, 0)";

                                        document.getElementById("question_" + i).style.color = "rgb(255, 255, 255)";

                                    }



                                }


                            }

                            var result = num_right_toan + "/ 30";
                            var result_van = num_right_van + "/ 30";


                            var time_t = document.getElementById("time_test").value;

                            var phut = time_t.substring(0, 3);

                            var giay = time_t.substring(4, 6);

                        	var time_doing = (24 - phut) + (lang=='en' ? 'minute':'phút') + (60 - giay) + (lang=='en' ? 'seconds':'giây');

                        	document.getElementById('time_doing').innerHTML = time_doing;
                            document.getElementById('sodiem').innerHTML = num_right+"/"+num_ques;

                            document.getElementById('thoigian').innerHTML = "";

                           // document.getElementById('sodiem2').innerHTML = result;
                            //document.getElementById('sodiem3').innerHTML = result_van;
                            document.getElementById('content-thithu').hidden = true;
                            document.getElementById('submit_form_').hidden = true;
                            document.getElementById('content-result').hidden = false;

                            window.scrollTo(0, 0);



                        }

                        //              
                        function showRightAnswer(i) {

                            var type = document.getElementById("type_" + i).value;
                            var wrong_ans = document.getElementById("wrong_ans_" + i).value;
                            var wa_img = document.getElementById("wa_img_" + i).value;
                            if (wrong_ans != '' || wa_img != '')
                                document.getElementById('check_right_ans_' + i).hidden = false;

                            else {
                                document.getElementById('right_ans_' + i).hidden = false;
                            }
                        }
                        function hind(i) {

                            var type = document.getElementById("type_" + i).value;

                            if (type == 0)
                                document.getElementById('hind_ans_' + i).hidden = false;

                            else {

                                document.getElementById('hind_ans_' + i).hidden = false;



                            }

                        }



                        function lamlai(i) {
                            var lang = "<?=$lang?>";
                            var msg = (lang == 'en'? "Are you sure you want to do the wrong questions " + i+"?":"Bạn có chắc chắn muốn làm lại câu hỏi sai " + i + " không?");
                            if (confirm(msg)) {

                                document.getElementById("lamlai" + i).hidden = true;

                                document.getElementById("dapan" + i).hidden = true;

                            }

                        }

                        function reset() {

                            location.reload(true);

                            window.scrollTo(0, 0);

                        }
                        

                            </script>

                            <input id="listquestion-num" type="hidden" value="<?php echo count($list_question);?>"/>

                            <!--exercise item-->
                            <?php
                            if (isset($list_question) && count($list_question) > 0) {
                                ?>
                                <?php
                                $i = 0;
                                $f = 0;
                                $Z = 0;
                                foreach ($list_question as $item) {
                                    $f++;
                                    $i++;
                                    $Z++;
                                    if ($Z > 30) {
                                        $Z = 1;
                                    }
                                    ?>
                                    <input type="hidden" id="id_question_<?php echo $i; ?>" value="<?php echo $item['id']; ?>"/>
                                    <input type="hidden" id="type_<?php echo $i; ?>" value="<?php echo $item['type']; ?>"/>
                                    <input type="hidden" id="wrong_ans_<?php echo $i; ?>" value="<?php
                                    if ($item['wrong_ans_1'] != '') {
                                        echo 'a';
                                    } else {
                                        echo '';
                                    }
                                    ?>" />
                                    <input type="hidden" id="wa_img_<?php echo $i; ?>" value="<?php echo $item['wa_img_1']; ?>"/>

                                    <?php
                                    if (($item['wrong_ans_1'] != '' && $item['wrong_ans_2'] != '' && $item['wrong_ans_3'] != '') || ($item['wa_img_1'] != null && $item['wa_img_2'] != null && $item['wa_img_3'] != null )) {
                                        ?>

                                        <div class="exercise-item <?php
                                        if ($f > 30) {
                                            echo "nguvan";
                                        } else {
                                            echo "toan";
                                        }
                                        ?>">

                                            <div class="exercise-quesion">

                                                <div style="border-color: green; color:#F60; width:60px; word-spacing:2px; padding:2px; " class="quesion-stt" id="question_<?php echo $i; ?>">

                                                    <span style="font-weight:bold;"><?=$lang=="en" ? "Question" :"Câu";?> <?php echo $Z; ?> </span>
                                                    <a href="" name="<?php if ($f > 30) {
                                            echo "nguvan_" . $Z;
                                        } else {
                                            echo "toan_" . $Z;
                                        } ?>"></a>


                                                </div>



                                                <div style="height: auto;" class="quesion-name">

            <?php
            echo $item['content'];
            ?>

                                                </div>



            <?php
            if ($item['img'] != '' && $item['img'] != NULL) {
                ?>



                                                    <div style="clear: both; text-align: center;" class="exercise-image">

                                                        <img max-width="250px" max-height="150px" src="images/test_question/<?php echo $item['img'] ?>">

                                                    </div>

                <?php
            }
            ?>

                                            </div>

                                            <div class="answer">

                                                <?php
                                                $item['wrong_ans_0'] = $item['right_ans'];

                                                for ($k = 1; $k <= 3; $k++) {

                                                    $arrayIndexAns[$k - 1] = $k;
                                                }

                                                if (isset($arrayIndexAns) && $arrayIndexAns != null)
                                                    shuffle($arrayIndexAns);

                                                $j = rand(0, 3);

                                                for ($k = 3; $k > $j; $k--) {

                                                    $arrayIndexAns[$k] = $arrayIndexAns[$k - 1];
                                                }

                                                $arrayIndexAns[$j] = 0;

                                                for ($k = 0; $k <= 3; $k++) {

                                                    if ($arrayIndexAns[$k] == 0) {

                                                        $ans_content = $item['right_ans'];

                                                        $ans_img = $item['ra_img'];
                                                    } else {

                                                        $ans_content = $item['wrong_ans_' . $arrayIndexAns[$k]];

                                                        $ans_img = $item['wa_img_' . $arrayIndexAns[$k]];
                                                    }
                                                    ?>



                                                    <div style="margin-top: 15px; margin-left: 70px;" id="answer_line_<?php echo $f; ?>" class="radio<?php if ($i > 30) {
                                                echo "nguvan";
                                            } ?> answer_line_<?php echo $f . '' . $k; ?> answer-items-<?php echo $k; ?>">



                                                        <input style="vertical-align: middle; /*margin-top:20px;*/" name="radio_an_<?php echo $i; ?>" id="radio_an_<?php echo $i . "_" . $k; ?>" value="<?php echo $k; ?>" type="radio">  

                                                            <?php
                                                            if ($k == 0) {

                                                                echo '(A)';
                                                            } else if ($k == 1) {

                                                                echo '(B)';
                                                            } else if ($k == 2) {

                                                                echo '(C)';
                                                            } else if ($k == 3) {

                                                                echo '(D)';
                                                            } else {

                                                                echo '(E)';
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($ans_img != '') {
                                                                ?>

                                                                <img src="images/test_question/<?php echo $ans_img; ?>"/>


                                                                <?php
                                                            }
                                                            else
                                                                echo $ans_content;
                                                            ?>



                                                            <?php
                                                            if ($k == $j) {
                                                                ?>

                                                                <img id="check_right_ans_<?php echo $i; ?>" hidden="" src='images/test_question/right.png' height='30px'/>

                                                        <?php
                                                    }
                                                    ?>

                                                    </div>


                <?php
            }$arrayIndexAns = null;
            ?>

                                                <input type="hidden" name="right_ans_<?php echo $i; ?>" id="right_ans_<?php echo $i; ?>" value="<?php echo $j; ?>" />

                                            </div>

                                            <div  hidden="" style="clear:both; margin-left: 130px; padding-top: 20px; color: #0C0;" id="dapan<?php echo $i; ?>">

            <?php
            if (isset($item['hint']) && $item['hint'] != '') {
                ?>

                                                    <div style="" onclick="hind(<?php echo $i; ?>);" hidden="" style="clear:both; margin-left: 130px; padding-top: 20px; color: #0C0;" id="hind<?php echo $i; ?>">

                                                        <span style="color:#F93;"><?=$lang == "en" ?'Hint' :'Hướng dẫn';?></span>

                                                    </div>

                                                    <div style="margin-left:35px; color: black; width: 500px; margin-top: 15px; height: auto;" id="hind_ans_<?php echo $i; ?>" class="hind_answer" hidden>

                                                        <?php
                                                        if ($item['hint_img'] != '') {
                                                            ?>

                                                            <img src="images/test_question/<?php echo $item['hint_img'] ?>" />

                                                        <?php
                                                    }
                                                    else
                                                        echo $item['hint'];
                                                    ?>

                                                    </div>

                <?php
            }else {
                ?>

                                                    <div hidden="" id="hind<?php echo $i; ?>">



                                                    </div>

                <?php
            }
            ?>



                                                <span onclick="showRightAnswer(<?php echo $i; ?>);" style="position: absolute; margin-top:15px;"><?=$lang == "en" ? "Answer" :"Đáp án";?></span>

                                            </div>

                                        </div>

                                        <div class="<?php
                            if ($f > 30) {
                                echo "nguvan";
                            } else {
                                echo "toan";
                            }
                            ?>" id="clear2"></div>

            <?php
        } else {
            ?>

                                        <div class="exercise-item" style="margin-bottom: 25px;">

                                            <div class="exercise-quesion">

                                                <div style="color:#F60; border-color: green;" class="quesion-stt" id="question_<?php echo $i; ?>">

                                                    <span style="font-weight:bold; width:90px; word-spacing:2px; padding:2px;"><b><?=$lang == "en" ? "Question" : 'Câu';?> <?php echo $i; ?> </b></span>

                                                </div>

                                                <div style="height: auto;" class="quesion-name">

            <?php
            echo $item['content'];
            ?>

                                                </div>

                                                <?php
                                                if ($item['img'] != '' && $item['img'] != NULL) {
                                                    ?>

                                                    <div style="clear: both; text-align: center; margin-bottom: 25px;" class="exercise-image">

                                                        <img max-width="350px" max-height="250px" src="images/test_question/<?php echo $item['img'] ?>">

                                                    </div>

                <?php
            }
            ?>

                                            </div>

            <?php
            if ($item['hint'] != NULL && $item['hint'] != '') {
                ?>

                                                <div onclick="hind(<?php echo $i; ?>);" hidden style="clear:both; margin-left: 130px; padding-top: 30px; color: #0C0;" id="hind<?php echo $i; ?>">

                                                    <span style="color:#F93;"><?=$lang == "en" ? "Hint":"Hướng dẫn";?></span>



                                                </div>

                                                <?php
                                            } else {
                                                ?>

                                                <div hidden="" id="hind<?php echo $i; ?>">



                                                </div>

                <?php
            }
            ?>



                                            <div onclick="showRightAnswer(<?php echo $i; ?>);" hidden style="clear:both; margin-left: 130px; padding-top: 20px; color: #0C0;" id="dapan<?php echo $i; ?>">

                                                <span><?=$lang == "en" ? "Answer":"Đáp án";?></span>

                                            </div>

                                            <div class="answer-txt">

                                                <div id="hind_ans_<?php echo $i; ?>" style="height: auto; width: 500px;" class="hind_answer" hidden>

            <?php echo $item['hint']; ?>

                                                </div>

                                                <div style="margin-top: 10px;"></div>
                                                <div style="clear:both; padding: 5px;"></div>
                                                <div id="right_ans_<?php echo $i; ?>" hidden="" class="right_answer">
            <?php echo $item['right_ans']; ?>
                                                </div>



                                                <input style="border:2px solid green; height: 35px;" name="ans_ques_<?php echo $i; ?>" id="ans_ques_<?php echo $i; ?>" type="text" value="" class="answer-txt" />

                                            </div>

                                            <div style=" clear: both; width:100%; height: 20px;"></div>



                                        </div>

                                        <div id="clear2"></div>



            <?php
        }
    }
} else {
    ?>
                                <h3><?=$lang=='en'? 'No question!':'Không có câu hỏi nào!';?></h3>
    <?php
}
?>


                        </div>
                    </div>



                    <section id="submit_form_" style="position: relative; margin: 0px auto;">

                        <form name="time">

                            <section style="height: 70px; position: fixed; max-width: 914px;left: 50%; bottom: 0px; background:#B9574A;margin: 0px auto; margin-left: -459px;" class="container submit_form">

                                <section style="line-height: 70px;" class="col-sm-6">

                                    <section class="col-sm-6">

                                        <img style="margin-top: 15px;" class="pull-right" src="images/test_question/dong_ho.png">   

                                    </section>

                                    <section id="thoigian" class="col-sm-6 pull-right">

                                        <form name="time" method="post">



                                            <input style="font-size: 30px; color: #fff; border: none; height: 60px; background: #B9574A;" id="time_test" name="time_test" type="text" value="0" />

                                            <script>

                                    $(document).ready(function() {

                                        cd();


                                    });

                                            </script>






                                        </form>

                                    </section>

                                </section>

                                <section style="line-height: 70px;" class="col-sm-6">

                                    <section class="col-sm-6">

                                        <input style="width:110px; font-weight: bold; height: 45px; margin-top: 15px;" onclick="submit_form();" value="<?=$lang == "en" ?'SUBMIT' : 'NỘP BÀI';?>" class="btn btn-success" />


                                    </section>

                                </section>



                            </section>

                        </form>

                    </section><!--End .submit-form-->




                    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jslatex.forTest.js"></script>

                    <script type="text/javascript">

                                    onload = function() {

                                        $(".latex").latex();

                                        $(".latex_newline").latex();

                                    }

                                    function xemlai() {



                                        document.getElementById('content-thithu').hidden = false;

                                        document.getElementById('submit_form_').hidden = true;
                                        document.getElementById('content-result').hidden = true;

                                        window.scrollTo(0, 100);

                                    }



                                    var mins
                                    var secs;

                                    function cd() {
                                        mins = 1 * m("24");
                                        secs = 0 + s(":60");
                                        redo();
                                    }
                                    function cd2() {
                                        mins = 1 * m("0");
                                        secs = 0 + s(":60");
                                        redo2();
                                    }

                                    function m(obj) {
                                        for (var i = 0; i < obj.length; i++) {
                                            if (obj.substring(i, i + 1) == ":")
                                                break;
                                        }
                                        return(obj.substring(0, i));
                                    }

                                    function s(obj) {
                                        for (var i = 0; i < obj.length; i++) {
                                            if (obj.substring(i, i + 1) == ":")
                                                break;
                                        }
                                        return(obj.substring(i + 1, obj.length));
                                    }

                                    function dis(mins, secs) {
                                        var disp;
                                        if (mins <= 9) {
                                            disp = " 0";
                                        } else {
                                            disp = " ";
                                        }
                                        disp += mins + ":";
                                        if (secs <= 9) {
                                            disp += "0" + secs;
                                        } else {
                                            disp += secs;
                                        }
                                        return(disp);
                                    }

                                    function redo() {
                                        secs--;
                                        if (secs == -1) {
                                            secs = 59;
                                            mins--;
                                        }
                                        document.time.time_test.value = dis(mins, secs);
                                        if ((mins == 0) && (secs == 0)) {
                                            submit_form();

                                        } else {
                                            cd = setTimeout("redo()", 1000);
                                        }
                                    }
                                    function redo2() {
                                        secs--;
                                        if (secs == -1) {
                                            secs = 59;
                                            mins--;
                                        }
                                        document.time.time_test2.value = dis(mins, secs);
                                        if ((mins == 0) && (secs == 0)) {
                                            submit_form();

                                        } else {
                                            cd2 = setTimeout("redo2()", 1000);
                                        }
                                    }



                                    $(document).ready(function() {


                                        if ($(document).height() - 100 > screen.height)
                                            $(' .submit_form').css('position', 'fixed').next().css('bottom', '0px');

                                        $(window).scroll(function() {

                                            if ($(window).scrollTop() < $(document).height() - screen.height - 650) {
                                                $('.submit_form').css({"position": "fixed"});

                                            } else {
                                                $('.submit_form').css({"position": "relative"});

                                            }
                                        });
                                    });





                    </script>              


















                </section><!---End .Grade-->

<?php //$this->load->view("ikmc/commons/organizers"); ?>
<?php $this->load->view("ikmc/commons/footer_all"); ?>
            </section>
        </section>




    </body>

</html>
