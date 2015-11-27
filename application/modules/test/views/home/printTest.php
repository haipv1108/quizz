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
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
		<section class="content">
          <div class="row">
            <!-- Hiển thị các danh ĐỀ THI của content -->
            <div id="test" class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <p class="text-center" style="color:red">
					Mã đề thi: <?php if(isset($test_info) && !empty($test_info)) 
										foreach($test_info as $key=>$val){
											echo 'Mã đề thi: '.$val['madethi'].'<br/>';
											echo 'Thời gian: '.$val['time'].' phút'.'<br/>';
											echo 'Số lượng câu: '.$val['sl'].'<br/>';
										}
								?>
				  </p>
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
              </div>
            </div> <!-- Test -->
          </div><!-- Row-->
        </section>
      </div><!-- /.content-wrapper -->
    </div>
    <script src="template/frontend/Online Examination System/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="template/frontend/Online Examination System/bootstrap/js/bootstrap.min.js"></script>
    <script src="template/frontend/Online Examination System/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="template/frontend/Online Examination System/plugins/fastclick/fastclick.min.js"></script>
    <script src="template/frontend/Online Examination System/dist/js/app.min.js"></script>
    <script src="template/frontend/Online Examination System/dist/js/demo.js"></script>
  </body>
</html>
