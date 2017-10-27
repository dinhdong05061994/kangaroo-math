<?php $arr_title = array('1'=>"(A)", '2'=>"(B)", '3'=>"(C)", '4'=>"(D)", '5'=>"(E)");?>
<div class='list_question' id = 'list_question'>
	<?php $part = "0";?>
	<?php for($i=0; $i < count($list_question); $i++):?>
		<?php $question = $list_question[$i];?>
		<?php if($part != $question['part']):
			$part = $question['part'];
		?>
			<div class='part'><?=($lang == "en" ? 'Part:':'Phần:')?> <?php echo $part;?></div>
		<?php endif;?> 	
		<div class='one_question'>
			<div class='question_header'>
				<div class='question_order'>
					<div class='order_view' id='order_view_<?php echo $question['id'];?>'>
						<?php echo $i + 1;?>
					</div>
				</div>
				<div class='question_content'>
					<?php echo $question['content'];?>
				</div>
			</div>
			<div class='question_ans'>
				<div class='ans_title'><?=($lang == "en" ? 'Choose the right answer:':'Chọn đáp án đúng:')?></div>
				<div class='ans_content'>
					<ul class='list-inline'>
						<?php $index_text = 1;?>
						<?php 
						for($j = 1; $j <= 4; $j++):
							if($j == $question['order_right_ans']):
						?>
								<li>
									<div class='ans_line'>
										<span class='right_check' id='right_check_<?php echo $question['id'];?>' hidden></span>
										<input type='radio' name='ans_<?php echo $question['id'];?>'/>
										<?php echo $arr_title[$index_text++].$question['right_ans'];?>
									</div>
								</li>
						<?php
							endif;
						?>
							<li>
								<div class='ans_line'>
									<input type='radio' name='ans_<?php echo $question['id'];?>'/>
									<?php echo $arr_title[$index_text++].$question['wrong_ans_'.$j];?>
								</div>
							</li>
						<?php 
						endfor;
						?>
						<?php if(5 == $question['order_right_ans']):?>
							<li>
								<div class='ans_line'>
									<span class='right_check' id='right_check_<?php echo $question['id'];?>' hidden></span>
									<input type='radio' name='ans_<?php echo $question['id'];?>'/>
									<?php echo $arr_title[$index_text++].$question['right_ans'];?>
								</div>
							</li>
						<?php endif;?>
					</ul>
				</div>
			</div>
		</div>
	<?php endfor;?>
</div>