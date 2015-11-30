    <section class="content">
	<!-- Hiển thị các danh ĐỀ THI của content -->
	  <div class="box box-success">
		<div class="box-header with-border">
		  <h3 class="box-title text-center">
			Tổng điểm bài thi: <?php echo $score*10;?>
		  </h3>
		</div>
		<div class="box-body">
			<?php if(isset($test) && !empty($test)){
			  $number_question = 1;
			  foreach($test as $key=>$val){?> <!--moi cau hoi-->
				<div class="clearfix cauhoi-wrap">
				  <span class="cauhoi"><?php echo $number_question++;?>. <?php echo $val['question'];?></span>
				  <div class="form-group">
					<?php if(isset($val['answer']) && !empty($val['answer'])){
					  $answer_choice = json_decode($val['answer'],true);?>

					  <?php $number_choice = count($answer_choice);
							$answer_true = json_decode($val['correct'],true);
							for($choice = 1; $choice<= $number_choice; $choice++){?>
								<div class="radio">
									<label   
											<?php if(isset($answer_true)&&in_array($choice, $answer_true)) echo "class = \"color: bg-green\"";?>
											<?php if(isset($answer_choosen[$key])&&in_array($choice, $answer_choosen[$key])) echo "class = \"color: bg-red\" ";?> 
									>
										<input
											type="checkbox" value="<?php echo $choice;?>" name="answer[<?php echo $key;?>][]"
											 <?php if(isset($answer_choosen[$key])&&in_array($choice, $answer_choosen[$key])) echo "checked";?>                              
										>
										<?php echo $answer_choice[$choice];?>
									</label>
								</div>
						  <?php }?>
				  <?php }?>             
				  </div>
				</div>                
			<?php }
			}?>
		</div>
	  </div>
	</section>

