<section class="content">
  <div class="row">
	<!-- Hiển thị các danh ĐỀ THI của content -->
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Danh sách đề thi trắc nghiệm</h3>
			</div>
				<?php if(isset($error) && !empty($error)) echo $error;
					  else if(isset($listtest) && !empty($listtest)){
							$i = 0;
							foreach($listtest as $key=>$val){
								$i++;?>
									<div class="col-md-3">
										<div class="box <?php if($i <5) echo 'box-success'; else if($i < 9) echo 'box-danger'; else echo 'box-info';?> box-solid">
											<div class="box-header with-border">
												<a href="test/testdetail/<?php echo $val['id'];?>" class="btn2-app"><h3 class="box-title"><?php echo $val['name'];?></h3></a>
												<div class="box-tools pull-right">
													<button class="btn btn-box-tool" data-widget="collapse">
														<i class="fa fa-minus"></i>
													</button>
												</div>
											</div>
										<div class="box-body no-padding">
											<h4><?php echo $val['decription'];?></h4>
										</div>
										</div>
									</div>
					<?php	}
						}?>
		</div>
  </div>
	
</section>