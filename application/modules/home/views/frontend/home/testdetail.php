
       <section class="content">
          <div class="row">
            <!-- Time -->
            <div id="time" class="col-md-1 fixed">
              <div class="bg-yellow fixed" >
                <div class="description-block padding-bottom" style="margin-top: 0px;">
                  <div class="sparkbar pad text-center" data-color="#fff">
                    <i class="fa fa-clock-o" style="display: inline-block; width: 34px; height: 30px; vertical-align: top; font-size: 30px;" width="34" height="30"></i>
                  </div>
                  <span class="description-text"><b>55:12</b></span>
                  <div class="pad"></div>
                </div>
              </div>
            </div>
            <!-- Hiển thị các danh ĐỀ THI của content -->
            <div id="test" class="col-md-8">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title text-center">
                    NGU PHAP
                  </h3>
                  <p class="text-center" style="color:red">Huong dan lam bai</p>
                </div>
                <div class="box-body">
				<?php if(isset($test) && !empty($test)){
					foreach($test as $key=>$val){?>
						<div class="clearfix cauhoi-wrap">
							<span class="cauhoi">1. <?php echo $val['question'];?></span>
							<div class="form-group">
								<?php if(isset($val['answer']) && !empty($val['answer'])){
									$answer_choice = json_decode($val['answer'],true);?>
									<?php if(isset($answer_choice['answerA']) && !empty($answer_choice['answerA'])){?>
										<div class="radio">
											<label>
												<input type="radio" checked="" value="1" name="answerA">
												<?php echo $answer_choice['answerA'];?>
											</label>
										</div>
							  <?php }?>
									<?php if(isset($answer_choice['answerB']) && !empty($answer_choice['answerB'])){?>
										<div class="radio">
											<label>
												<input type="radio" checked="" value="1" name="answerA">
												<?php echo $answer_choice['answerB'];?>
											</label>
										</div>
							  <?php }?>
									<?php if(isset($answer_choice['answerC']) && !empty($answer_choice['answerC'])){?>
										<div class="radio">
											<label>
												<input type="radio" checked="" value="1" name="answerC">
												<?php echo $answer_choice['answerC'];?>
											</label>
										</div>
							  <?php }?>
									<?php if(isset($answer_choice['answerD']) && !empty($answer_choice['answerD'])){?>
										<div class="radio">
											<label>
												<input type="radio" checked="" value="1" name="answerD">
												<?php echo $answer_choice['answerD'];?>
											</label>
										</div>
							  <?php }?>
						  <?php }?>							
							</div>
						</div>							  
			  <?php }
				}?>
                  <div class="col-md-4 col-md-offset-4">
                    <button class="btn btn-block btn-success btn-lg text-center">Nộp bài</button>
                  </div>
                </div>
              </div>
            </div> <!-- Test -->
            
            <!-- Thống kê các thông tin về user -->
            <div id="thong_ke" class="col-md-3">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Thống kê</h3>
                </div>
                <div class="box-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam minima sed inventore ratione, dignissimos perspiciatis nesciunt. Aliquid eveniet, dolores iure ipsum vel vitae quam ad. Earum vero, ut excepturi blanditiis.</p>
                </div>
              </div>
            </div> <!-- #thong_ke -->
          </div><!-- Row-->
        </section>