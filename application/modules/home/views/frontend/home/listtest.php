<section class="content">
  <div class="row">
	<!-- Hiển thị các danh ĐỀ THI của content -->
	<div id="test" class="col-md-9">
		<div class="box box-danger">
			<div class="box-header">
				<h3 class="box-title">Danh sách đề thi trắc nghiệm <?php echo (isset($subject) && !empty($subject))?$subject['name']:'';?></h3>
			</div>
			<?php
				if(isset($level) && !empty($level)){
					foreach($level as $key=>$val){?>
						<div class="box-body">
						<p>Cấp đô: <?php echo $val['name'];?></p>
				<?php	if(isset($listtest[$val['name']]) && !empty($listtest[$val['name']])){
							foreach($listtest[$val['name']] as $k=>$v){?>
								<div class="col-md-2 col-sm-4 col-xs-6 margin-bottom">
								  <div class="col-md-12 no-padding border_col">
									<a href="<?php echo site_url();?>test/test/testdetail/<?php echo $val['id'];?>" class="btn2-app">
									<img alt="Photo" src="template/frontend/Online Examination System/image/bunpou.png" class="img-responsive">
									<span><?php echo $v['name'];?></span>
								  </a>
								  </div>
								</div>
					<?php	}
						}?>
						</div>
			<?php	}
				}
			?>

		</div>
	</div>
	
	<!-- Thống kê các thông tin về user -->
	<div id="thong_ke" class="col-md-3 padding-right">
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Thống kê</h3>
		</div>
		<div class="box-body">
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam minima sed inventore ratione, dignissimos perspiciatis nesciunt. Aliquid eveniet, dolores iure ipsum vel vitae quam ad. Earum vero, ut excepturi blanditiis.</p>
		</div>
	  </div>
	</div> <!-- #thong_ke -->
  </div>
	
</section>