<div>
	<ul> 
	<?php if(!isset($tests)) echo "Ban chua tham gia bat ky mot bai test nao !!!<br/>";
		else{
			foreach ($tests as $key => $value) { ?>
				<li><a href="<?php echo base_url();?>profile/profile/detailtest/<?php echo $value['testid'];?>"><?php echo "De so".$value['testid']."<br/>";?></li>				
	
	<?php }}?>
	</ul>
</div>
