<div>
	<ul> 
	<?php 	if(!isset($tests) && !empty($tests)) echo "Bạn chưa tham gia bất kỳ một bài test nào.<br/>";
			else{
				foreach ($tests as $key => $value) { ?>
					<li><a href="profile/detailtest/<?php echo $value['id'];?>"><?php echo "Mã đề thi: ".$value['madethi']."<br/>";?></li>
		<?php 	}
			}?>
	</ul>
</div>
