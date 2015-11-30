<section class="content">
	<form method="post" action="">
		<?php echo validation_errors();?>
		<?php
				if(isset($message) && !empty($message)){?>
					<div style="color: red; font-weight: bold"><?php echo $message; ?></div>
		<?php	}?>
		<div>
			Nhập Tên | Mã | ID đề Test<br/>
			<input class="text-input" type="text" name="test" value="<?php echo set_value('test'); ?>"/>
			<input type="submit" name="submit" value="submit">
		</div>
	</form>
	<br><br>
	<?php	 if(isset($listtest) && !empty($listtest)){?>
				<div class="row">
					<!-- Hiển thị các danh ĐỀ THI của content -->
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Danh sách kết quả tìm được</h3>
							</div>
							<?php 
									$i = 0;
									foreach($listtest as $key=>$val){
										$i++;?>
											<div class="col-md-3">
												<div class="box <?php if($i <5) echo 'box-success'; else if($i < 9) echo 'box-danger'; else echo 'box-info';?> box-solid">
													<div class="box-header with-border">
														<a href="profile/mark/<?php echo $val['id'];?>" class="btn2-app"><h3 class="box-title"><?php echo $val['name'];?></h3></a>
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
							<?php	}?>
						</div>
				</div>
	<?php	}?>
</section>