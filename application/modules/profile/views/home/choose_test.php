<section class="content">
	<form method="post" action="">
		<?php echo validation_errors();?>
		<?php
				if(isset($message) && !empty($message)){?>
					<div style="color: red; font-weight: bold"><?php echo $message; ?></div>
		<?php	}?>
		<div>
			Nhập Tên | Mã | ID đề Test<br/>
			<div class="input-group input-group-sm col-md-3">
				<input class="form-control" type="text" name="test" value="<?php echo set_value('test'); ?>">
				<span class="input-group-btn">
					<input type="submit" class="btn btn-success btn-flat" name="submit" value="submit">
				</span>
			</div>
		</div>
	</form>
	<br><br>
	<?php	 if(isset($listtest) && !empty($listtest)){?>
				<div class="box box-success">
					<box class="box-header with-border">
						<h3 class="box-title">Danh sách kết quả tìm kiếm: </h3>
					</box>
					<div class="box-body">

						<div class="row">
							<!-- Hiển thị các danh ĐỀ THI của content -->
							<?php 
								$i = 0;
								foreach($listtest as $key=>$val){
									$i++;?>
										<div class="col-md-3">
											<div class="box <?php if($i <5) echo 'box-success'; else if($i < 9) echo 'box-danger'; else echo 'box-info';?> box-solid">
												<div class="box-header with-border">
													<a href="profile/mark/<?php echo $val['id'];?>" class="btn2-app"><h3 class="box-title"><?php echo $val['name'];?></h3></a>
												</div>
											<div class="box-body">
												<h4><?php echo $val['decription'];?></h4>
											</div>
											</div>
										</div>
										<?php if(($i%4) == 0) echo '<div class="clearfix"></div>';?>
							<?php	}?>
						</div>

					</div>
				</div>

	<?php	}?>
</section>