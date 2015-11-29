<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	  <base href="<?php echo site_url();?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (isset($meta_title))? htmlspecialchars($meta_title): 'Online Examination System';?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="template/frontend/Online Examination System/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/documentation/style.css" type="text/css">
    <link rel="stylesheet" href="template/frontend/Online Examination System/web/style.css" type="text/css">
  </head>
  <body>
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div>
		    <section class="content">


          <div class="row">
            <!-- Hiển thị các danh ĐỀ THI của content -->
            <div id="test" class="col-md-10 col-md-offset-1">
              <div class="box">
                <!-- Title của đề thi -->
                <div class="row" style="padding-top: 20px;">
                  <div class="col-md-5">
                    <p class="text-center" style="font-size: 18px;"><b>Trường Đại học Bách Khoa Hà Nội</b></p>
                    <p class="text-center" style="font-size: 16px;"><b>Dự án đào tạo HEDSPI</b></p>
                  </div>
                  <div class="col-md-6 col-md-offset-1">
                    <p class="text-center" style="font-size: 16px;"><b>
                   <?php if(isset($test_info) && !empty($test_info)){
                      echo 'Mã đề thi: '.$test_info['madethi'].'<br/>';
                      echo 'Thời gian: '.$test_info['time'].' phút'.'<br/>';
                      echo 'Số lượng câu: '.$test_info['sl'].'<br/>';
                    }?>
                    </b>    
                  </p>
                  </div> 
                </div>

                <div class="box-header">
                  <p class="pull-right">Lưu ý: Một câu hỏi có thể có nhiều hơn một đáp án đúng.</p>
                  <form>
                    <input type="button" value="Print this page" onClick="window.print()">
                  </form>
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
          			  <?php }
          				}?>
                </div>
                <div class="box-fotter">
                  <p class="text-center"><b>---------------------------- Hết ----------------------------</b></p>
                  <p class="text-center">(Cán bộ coi thi không giải thích gì thêm)</p>
                </div>
              </div>
            </div> <!-- Test -->
          </div><!-- Row-->
        </section>
      </div>
    </div>
    <script src="template/frontend/Online Examination System/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="template/frontend/Online Examination System/bootstrap/js/bootstrap.min.js"></script>
    <script src="template/frontend/Online Examination System/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="template/frontend/Online Examination System/plugins/fastclick/fastclick.min.js"></script>
    <script src="template/frontend/Online Examination System/dist/js/app.min.js"></script>
    <script src="template/frontend/Online Examination System/dist/js/demo.js"></script>
  </body>
</html>
