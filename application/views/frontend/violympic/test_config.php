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
        var lang = "vi";
        var time_test = 0;
        var flag = 0;
        var number_q_show = 0;

        function submits() {
            if (flag > 0 && time_test > 0) {
                document.forms['form'].submit();
                document.body.innerHTML = "";
            }
            else
            {
                alert("Please check the lecture and then select numbers of basic questions and/or advanced questions.")
            }

        }

        function enableSelect(i)

        {

            if (document.getElementById("checkbox_" + i).checked) {
                document.getElementById("level0_num_" + i).disabled = false;
                document.getElementById("level1_num_" + i).disabled = false;
                document.getElementById("level2_num_" + i).disabled = false;
                flag++;
            }
            else
            {
                document.getElementById("level0_num_" + i).disabled = true;
                document.getElementById("level1_num_" + i).disabled = true;
                document.getElementById("level2_num_" + i).disabled = true;
                flag--;
            }
            timeTest();
        }
        function timeTest()
        {
            time_test = 0;
            var question_num = document.getElementById("question_num").value;
            for (var i = 1; i <= question_num; i++)
            {

                if (document.getElementById("checkbox_" + i).checked) {

                    var basic_num = document.getElementById("level0_num_" + i).value;
                    var medium_num = document.getElementById("level1_num_" + i).value;
                    var intermediate_num = document.getElementById("level2_num_" + i).value;
                    // không cần đến
                    var basic_time = document.getElementById("basic_time_" + i).value;
                    var medium_time = document.getElementById("medium_time_" + i).value;
                    var intermediate_time = document.getElementById("intermediate_time_" + i).value;

                    time_test += basic_num * basic_time + intermediate_num * intermediate_time + medium_num * medium_time;
                    //end
                }
            }
            // không cần đến
            document.getElementById("time_test_show").innerHTML = "Test duration: " + (time_test - time_test % 60) / 60 + " minutes " + (time_test % 60 > 9 ? time_test % 60 : ("0" + time_test % 60)) + " seconds.";
            document.getElementById("time_test").value = time_test;
            // end
        }
        function numberQuestionShow(k)

        {
            number_q_show += k;
            var max = document.getElementById("question_num").value;
            for (var i = number_q_show + 1; i <= max; i++)
            {
                document.getElementById("tr_" + i).hidden = true;
            }
            if (number_q_show > max)
                document.getElementById("show_more").hidden = true;
            else
                document.getElementById("show_more").hidden = false;

            if (number_q_show == 5)
                document.getElementById("show_less").hidden = true;

        }

        function showMore(k)

        {

            for (var i = number_q_show + 1; i <= number_q_show + k && i<=document.getElementById("question_num").value; i++)

            {

                document.getElementById("tr_" + i).hidden = false;

            }

            number_q_show += k;

            if (number_q_show >= document.getElementById("question_num").value)
                document.getElementById("show_more").hidden = true;

            document.getElementById("show_less").hidden = false;

        }
        
        function set_lang(str_lang){
            lang = str_lang;
            label_course = (lang == 'vi' ? 'Chọn lớp':"Choose grade");
            label_td_choose = (lang == 'vi' ? 'Chọn':"Choose");
            label_td_name_topic = (lang == 'vi' ? 'Tên chuyên đề(chủ đề)':"Topic name");
            label_td_choose_num_basic = (lang == 'vi' ? 'Chọn số câu dễ':"Choose number easy questions");
            label_td_choose_num_medium = (lang == 'vi' ? 'Chọn số câu trung bình':"Choose number medium questions");
            label_td_choose_num_advance = (lang == 'vi' ? 'Chọn số câu khó':"Choose number hard questions");
            label_btn_start_test = (lang=='vi'? 'Bắt đầu bài thi' :'Submit');
            // $("td_lecture_name[]")
            topic =[];
            <?php
            foreach ($list_topic as $key => $topic) {
            ?>
                topic['<?=$topic['id'];?>']=[];
                topic['<?=$topic['id'];?>']['en_name']='<?=$topic['en-name']?>';
                topic['<?=$topic['id'];?>']['name']='<?=$topic['name']?>';
           
            
            <?php
            }
            ?>

            $.each(topic, function(index,val){
                if($("#name_"+index).length){
                    $("#name_"+index).text(lang=='vi'? val['name'] :val['en_name']);
                    if(lang=='en'){
                       $("#name_"+index).css('text-transform', 'capitalize'); 
                    }
                }
                
            });
            $("label[for='course']").text(label_course);
            $("#td_choose").text(label_td_choose);
            $("#td_name_topic").text(label_td_name_topic);
            $("#td_choose_num_basic").text(label_td_choose_num_basic);
            $("#td_choose_num_medium").text(label_td_choose_num_medium);
            $("#td_choose_num_advance").text(label_td_choose_num_advance);
            $("#btn-start-test").text(label_btn_start_test);
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
                        <div class="course_select">
                            <label style="font-weight: normal;" for="course"><?php echo $lang == 'vi' ? 'Chọn lớp' : 'Choose grade' ?></label>
                            <form role="form">
                            <div class="form-group">
                                <select style="width:620px;" type="email" class="form-control selection" id="course_select" name="course_select"><!-- onchange="window.location.href = '<?php //echo base_url(); ?>violympic/' + this.value"-->
                                    <?php 
										if(isset($list_grade) && $list_grade != null){
											foreach($list_grade as $grade){
												if($grade_select == $grade['id']){
									?>
													<option <?=(isset($total_question) && $total_question[$grade['id']] > 0) ? 'selected' :'';?> value="<?php echo $grade['id']?>"><?php echo $grade['title'];?><?=(isset($total_question) && $total_question[$grade['id']] <= 0) ? ' <i>(coming soon)</i> ' :'';?></option>
									<?php
												}
												else{
									?>
													<option <?=(isset($total_question) && $total_question[$grade['id']] <= 0) ? 'disabled ' :'';?> value="<?php echo $grade['id']?>"><?php echo $grade['title'];?><?=(isset($total_question) && $total_question[$grade['id']] <= 0) ? ' <i>(coming soon)</i> ' :'';?></option>
									<?php 
												}
											}
										}
									?>
                               </select>
                            </div>
                            </form>
                        </div>
                        <div class="lecture_select">
                            <div class="time_test">
                                <p id="time_test_show" style="display: none;">
                                <?php echo $lang == 'vi' ? 'Thời gian kiểm tra: 00 phút 00 giây' : 'Test duration: 00 minute 00 seconds' ?>
                                </p>
                                <input type="hidden" name="question_num" id="question_num" value="<?php echo count($list_topic);   ?>"/>
                                <input type="hidden" name="time_test" id="time_test" value="" />
                            </div>
                            <div class="table_choise">                          
                                <table style="width:100%; max-height: 500px; overflow: auto;">
                                    <tr class="tr_header">
                                        <td class="td_select" id="td_choose"><?php echo $lang == 'vi' ? 'Chọn' : 'Choose' ?></td>
                                        <td style=" border-right: 1px solid #ffffff;" class="td_lecture_name" id="td_name_topic"><?php echo $lang == 'vi' ? 'Tên chuyên đề(chủ đề)' : 'Topic name' ?></td>
                                        <td class="td_basic_num" id="td_choose_num_basic"><?php echo $lang == 'vi' ? 'Chọn số câu dễ' : 'Choose number easy questions' ?></td>
                                        <td class="td_basic_num" style=" border-right: 1px solid #ffffff;"id="td_choose_num_medium"><?php echo $lang == 'vi' ? 'Chọn số câu trung bình' : 'Choose number medium questions' ?></td>
                                        <td class="td_intermediate_num" id="td_choose_num_advance"><?php echo $lang == 'vi' ? 'Chọn số câu khó' : 'Choose number hard questions' ?></td>
                                    </tr>         
									<?php
										$i = 0;
										foreach($list_topic as $topic)
										{   
											$i++;
											if($i <= 100)
											{
									?>
												<tr id="tr_<?php echo $i;?>" class="tr_<?php echo $i%2;?>">
													<td class="td_select">
														<div>
															<input type="checkbox" name="checkbox_<?php echo $i;?>" id="checkbox_<?php echo $i;?>" value="<?php echo $topic['id'];?>" onclick="enableSelect(<?php echo $i;?>);"/>
														</div>
														</td>
													<td class="td_lecture_name">
														<div>
															<p id="name_<?=$topic['id']?>"><?php echo $lang == "en" ? $topic['en-name'] : $topic['name'];?></p>
															<input type="hidden" id="basic_time_<?php echo $i;?>" value="60"/>
															<input type="hidden" name="basic_grade_<?php echo $i;?>" id="basic_grade_<?php echo $i;?>" value="3"/>
                                                            <input type="hidden" id="medium_time_<?php echo $i;?>" value="60"/>
                                                            <input type="hidden" name="medium_grade_<?php echo $i;?>" id="medium_grade_<?php echo $i;?>" value="4"/>
															<input type="hidden" id="intermediate_time_<?php echo $i;?>" value="60"/>
															<input type="hidden" name="intermediate_grade_<?php echo $i;?>" id="intermediate_grade_<?php echo $i;?>" value="5"/>
														</div>
													</td>
													<td class="td_basic_num">
														<select name="level0_num_<?php echo $i;?>" id="level0_num_<?php echo $i;?>" disabled="" onchange="timeTest();">
														<?php
															for($k = 0; $k<=5; $k++)
															{
														?>
																<option value="<?php echo $k;?>"><?php echo $k;?></option>
														<?php
															}
														?>
														</select>
													</td>
                                                    <td class="td_medium_num td_basic_num">
                                                        <select name="level1_num_<?php echo $i;?>" id="level1_num_<?php echo $i;?>" disabled="" onchange="timeTest();">
                                                        <?php
                                                            for($k = 0; $k<=5; $k++)
                                                            {
                                                        ?>
                                                                <option value="<?php echo $k;?>"><?php echo $k;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                        </select>
                                                    </td>
													<td class="td_intermediate_num">
														<select name="level2_num_<?php echo $i;?>" id="level2_num_<?php echo $i;?>" disabled="true" onchange="timeTest();">

														<?php

															for($k = 0; $k<=5; $k++)

															{

														?>

																<option value="<?php echo $k;?>"><?php echo $k;?></option>

														<?php

															}

														?>

														</select>

													</td>

												</tr>

									<?php

											}

										}

									?>
                                    
            

                                </table>
                           

                            </div>



                            <div class="show_less" id="show_less">

                                <a onclick="numberQuestionShow(-5);"><?php echo $lang=='vi'? 'Ít hơn' :'Less' ?></a>

                            </div>

                            <div class="show_more" id="show_more">

                                <a onclick="showMore(5);"><?php echo $lang=='vi'? 'Nhiều hơn' :'More' ?></a>

                            </div>



                        </div>

                        <div class="button_submit">

                            
                            <button style="width:180px;" type="button" onclick="submits();" class="btn btn-success" id="btn-start-test">
                                <?php echo $lang=='vi'? 'Bắt đầu bài thi' :'Submit' ?>
                            </button>
                        </div>

                    </fieldset>

                </form>

            </div>

         
            
		

        </div>



        <div class="immense_line">

            <hr>

        </div>

       <?php $this->load->view("ikmc/commons/footer_all");?>

    </body>

    </html>

    <script>

        numberQuestionShow(5);

    </script>

    </html>



