<section class="content">
  <div class="row">
  	<div class="col-md-12">
		<!-- Hiển thị các danh ĐỀ THI của content -->
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Danh sách đề thi trắc nghiệm</h3>
			</div>
			<div class="box-body">
				<?php if(isset($error) && !empty($error)) echo $error;
					  else if(isset($listtest) && !empty($listtest)){
							$i = 0;
							foreach($listtest as $key=>$val){
								$i++;?>

								<div class="col-md-10">
				                  <div class="info-box box box-success box-solid">
				                    <span class="info-box-icon">
				                      <p class="text-center">
				                        <a href="test/testdetail/<?php echo $val['id'];?>">
				                          <img src="template/frontend/Online Examination System/image/english.jpg" alt="Nihongo">
				                        </a> 
				                      </p> 
				                    </span>
				                    <div class="info-box-content">
				                      <a href="test/testdetail/<?php echo $val['id'];?>"><span class="info-box-text"><b><?php echo $val['name']?></b></span></a>
				                      <p>
				                        <span><i><?php echo $val['decription']?></i></span>
				                      </p>
				                    </div>
				                  </div>
				                </div>
					<?php	}
						}?>
			</div>
		</div>
	</div>
  </div>
</section>