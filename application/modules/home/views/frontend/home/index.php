<section class="content">
	<div class='row'>
	<?php 	if(isset($list_cate) && !empty($list_cate)){
				$i = 0;
				foreach($list_cate as $key=>$val){ 
					$i++;?>
					<div class="col-md-3">
						<div class="box <?php if($i <5) echo 'box-success'; else if($i < 9) echo 'box-danger'; else echo 'box-info';?> box-solid">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $val['name'];?></h3>
								<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse">
										<i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
		<?php   if(isset($subject[$val['name']]) && !empty($subject[$val['name']])){
					$j=0;?>
					<div class="box-body no-padding">
						<ul class="nav nav-pills nav-stacked">
					<?php	foreach($subject[$val['name']] as $k=>$v){
								$j++;?>
								<li>
									<a href="<?php echo site_url();?>home/listtest/<?php echo $v['id'];?>"><?php echo $v['name'];?>
										<span class="label <?php if($j <2) echo 'label-warning'; else if($j < 3) echo 'label-primary'; else {echo 'label-info';$j = 0;}?> pull-right"><?php echo $v['sl'];?></span>
									</a>
								</li>
					<?php 	}?>
						</ul>
					</div>
		  <?php }?>
						</div>
					</div>
			<?php
				}
			}?>
	</div>
</section>