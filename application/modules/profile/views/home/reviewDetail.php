
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
                  <p class="text-center" style="color:red">Huong dan lam bai</p>
                </div>
                <div class="box-body">
        Tổng điểm bài thi: <?php echo $score;?>
        <?php if(isset($test) && !empty($test)){
          $number_question = 1;
          foreach($test as $key=>$val){?>
            <div class="clearfix cauhoi-wrap">
              <span class="cauhoi"><?php echo $number_question++;?>. <?php echo $val['question'];?></span>
              <div class="form-group">
                <?php if(isset($val['answer']) && !empty($val['answer'])){
                  $answer_choice = json_decode($val['answer'],true);?>
                  <?php //print_r($answer_choosen)?>
                  <?php $number_choice = count($answer_choice);
                  if(isset($answer_choosen[$key]))
        /**/            $answer_true = json_decode($val['correct'],true);
                      for($choice = 1; $choice<= $number_choice; $choice++){?>
                        <?php if(isset($answer_choice[$choice]) && !empty($answer_choice[$choice])){?>
                        <div class="radio">
                          <label>
                            <input                             
                            <?php if(isset($answer_choosen[$key])&&in_array($choice, $answer_choosen[$key])) echo "class = \"chosen\" checked";?> 
                            <?php if(isset($answer_true)&&in_array($choice, $answer_true)) echo "class = \"true\"";?>
                            type="checkbox" value="<?php echo $choice;?>" name="answer[<?php echo $key;?>][]">
                            <?php echo $answer_choice[$choice];?>
                          </label>
                        </div>
                      <?php }?>
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

