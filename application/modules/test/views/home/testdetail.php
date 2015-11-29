
       <section class="content">
			<div class="row">
            <!-- Hiển thị các danh ĐỀ THI của content -->
				<form action="" method="post">
					  <div class="box box-success">
						<div class="box-header with-border">
						  <h3 class="box-title text-center">
							<?php
								if(isset($test_info) && !empty($test_info)){
									echo "Đề thi: ".$test_info['name']."<br>";
									echo "Mã đề thi: ".$test_info['madethi']."<br>";
									echo "Thời gian: ".$test_info['time']." phút<br>";
									echo "Số lượng câu hỏi: ".$test_info['sl']."<br>";
								}
							?>
						  </h3>
							<?php if(isset($user) && $user['level'] == 2){?>
									<a class="btn btn-block btn-success btn-lg text-center" href="test/printTest/<?php if(isset($test_info) && !empty($test_info)) echo $test_info['id'];?>">
										Print this test
									</a>
							<?php }?>
						</div>
						<div class="box-body">
						<?php if(isset($test) && !empty($test)){
							$number_question = 1;
							foreach($test as $key=>$val){?>
								<div class="clearfix cauhoi-wrap">
									<span class="cauhoi"><?php echo $number_question++;?>. <?php echo $val['question'];?></span>
									<div class="form-group">
										<?php if(isset($val['answer']) && !empty($val['answer'])){
											$answer_choice = json_decode($val['answer'],true);?>
											<?php $number_choice = count($answer_choice);
													for($choice = 1; $choice<= $number_choice; $choice++){?>
														<?php if(isset($answer_choice[$choice]) && !empty($answer_choice[$choice])){?>
														<div class="radio">
															<label>
																<input type="checkbox" value="<?php echo $choice;?>" name="answer[<?php echo $key;?>][]">
																<?php echo $answer_choice[$choice];?>
															</label>
														</div>
													<?php }?>
											<?php	}?>
								  <?php }?>							
									</div>
								</div>	
					<?php 
							  if($val['type']==3) echo "<div><strong>Phải trả lời hết các đáp án đúng</strong></div>";
							  elseif($val['type']==2) echo "<div><strong>Điểm sẽ được chia đều cho các đáp án đúng</strong></div>";
							  else echo "<div><strong>Chỉ cần chọn một câu trả lời đúng</strong><div>";						  
					  }
						}?>
						<div class="col-md-4 col-md-offset-4">
							 <input type="submit" class="btn btn-block btn-success btn-lg text-center" name="submit" value="Nộp bài">
						</div>
						</div>
					  </div>
					</div> <!-- Test -->
					</div>
				</form>  
          </div><!-- Row-->
        </section>