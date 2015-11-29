<section class="content">
  <div class="row">
	<!-- Hiển thị các danh ĐỀ THI của content -->
	<?php if(isset($error) && !empty($error)) echo $error;?>
	<div class="box-header with-border">
		<h3 class="box-title">Danh sách kết quả tìm kiếm: </h3>
	</div>

			<div class="box box-danger">
				<?php  if(isset($listcate) && !empty($listcate)){
						  foreach($listcate as $k=>$v){
							  if(isset($listtest[$v['id']]) && !empty($listtest[$v['id']])){?>
								  <h3 class="box-title">Môn học: <a href="home/listtest/<?php echo $v['id'];?>" class="btn2-app"><?php echo $v['name'];?></a></h3>
						<?php	  $i = 0;
								  foreach($listtest[$v['id']] as $key=>$val){
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
					<?php		}
							  }
							  echo '<br>';
						  }
						}?>
			</div>
  </div>
</section>