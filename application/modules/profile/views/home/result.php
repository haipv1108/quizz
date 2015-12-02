
<div class="content-box">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="box">
					<div class="content-box-header box-header with-border">
						<h3 class="box-title">Kết quả bài thi</h3>
					</div>
					
					<div class="content-box-content">
						<div>
							<form action="" method="post" class="form-horizontal">
								<div class="box-body">
									<!-- Điểm đạt được -->
									<div class="form-group">
										<label for="" class="col-md-4 control-label">Điểm đạt được:</label>
										<div class="col-md-5">
											<p style="padding-top: 7px;	"><b><?php echo $score;?></b></p>
										</div>
									</div>
									<!-- Điểm bài thi -->
									<div class="form-group">
										<label for="" class="col-md-4 control-label">Trên tổng điểm:</label>
										<div class="col-md-5">
											<p style="padding-top: 7px;	"><b><?php echo $totalScore;?></b></p>
										</div>
									</div>
									<!-- Điểm đạt được -->
									<div class="form-group">
										<label for="" class="col-md-4 control-label">Điểm quy đổi:</label>
										<div class="col-md-5">
											<p style="color: blue; padding-top: 7px;	"><b><?php echo round($score/$totalScore*10,2);?></b></p>
										</div>
									</div>
								</div> <!-- end box-body -->
									<?php if(isset($test) && !empty($test)){
										$number_question = 1;
										foreach($test as $key=>$val){?> <!--moi cau hoi-->
											<div class="clearfix cauhoi-wrap chanle">
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
								<div class="box-footer text-center">
									<form method="post" action="">
										<input type="submit" class="btn btn-success" value="Trở về" name="submit_rs">
									</form>
								</div>
							</form>
						</div> <!-- End  -->     
					</div> <!-- End .content-box-content -->
				</div>

			</div>
		</div>
	</div>
</div> <!-- End .content-box -->