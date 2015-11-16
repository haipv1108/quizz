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
        <form action="" method="post">
            <div id="test" class="col-md-8">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title text-center">
                    NGU PHAP
                  </h3>
                  <p class="text-center" style="color:red">Xem Lại Bài Đã Làm</p>
                </div>
                <div class="box-body">
        <?php if(isset($test) && !empty($test)){
          foreach($test as $key=>$val){?>
          <?php echo $val['correct'];?>
            <div class="clearfix cauhoi-wrap">
              <span class="cauhoi">1. <?php echo $val['question'];?></span>
              <div class="form-group">
                <?php if(isset($val['answer']) && !empty($val['answer'])){
                  $answer_choice = json_decode($val['answer'],true);?>

                  <?php if(isset($answer_choice['answerA']) && !empty($answer_choice['answerA'])){?>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="1" 
                          <?php 
                            if(isset($answer[$key])&&isset($val['correct']&&$answer[$key]==$val['correct']==1)) echo "class = \"true\" checked";
                            if(isset($answer[$key])&&$answer[$key] == 1) echo "class = \"chosen\" checked";
                          ?> 
                          name="answer[<?php echo $key;?>]">
                        <?php echo $answer_choice['answerA'];?>
                      </label>
                    </div>
                  <?php }?>

                  <?php if(isset($answer_choice['answerB']) && !empty($answer_choice['answerB'])){?>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"  value="2" <?php if(isset($answer[$key])&&$answer[$key] == 2) echo "class = \"chosen\" checked";?> name="answer[<?php echo $key;?>]">
                        <?php echo $answer_choice['answerB'];?>
                      </label>
                    </div>
                    <?php }?>  


                    <?php if(isset($answer_choice['answerC']) && !empty($answer_choice['answerC'])){?>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"  value="3" <?php if(isset($answer[$key])&&$answer[$key] == 3) echo "class = \"chosen\" checked";?> name="answer[<?php echo $key;?>]">
                        <?php echo $answer_choice['answerC'];?>
                      </label>
                    </div>
                    <?php }?>

               

                   <?php if(isset($answer_choice['answerD']) && !empty($answer_choice['answerD'])){?>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"  value="4" <?php if(isset($answer[$key])&&$answer[$key] == 4) echo "class = \"chosen\" checked";?> name="answer[<?php echo $key;?>]">
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
                     <input type="submit" class="btn btn-block btn-success btn-lg text-center" name="submit" value="Nộp bài">
              </div>
                </div>
              </div>
            </div> <!-- Test -->
    </form>  
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