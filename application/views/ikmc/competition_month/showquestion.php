    <div class="list_question" id = "list_question">
        <input hidden="" id="num_question" value="<?php echo count($list_question); ?>"/>
        <input hidden="" id="time_test" value="<?php echo $time_test; ?>"/>
        <input hidden="" id="id_code" value="<?php echo $list_question[0]['id_code']; ?>"/>
        
        
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
                    
                </div>
            </div>
            
            
            <div class="question_ans">
            <?php 
            if($question['type'] == 1)
            {    
            ?>
                <div class="ans_title">Chọn đáp án đúng</div>
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
                           
            ?>
                 
            </div>
            
        </div>
    <?php } ?>
        
    </div>