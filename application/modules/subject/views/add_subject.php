<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Content box</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content">
		<?php echo validation_errors();?>
		<?php 	if(isset($error)){?>
					<div style="color: red; font-weight: bold"><?php echo $error;?></div>
			<?php } ?>
			<?php 	if(isset($success)){?>
					<div style="color: green; font-weight: bold"><?php echo $success; die;?></div>
			<?php } ?>
		<form action="" method="post">
			<p>
				<label>Name Subject</label>
				<input class="text-input" type="text" name="name" value="<?php echo set_value('name'); ?>"/>
			</p>
				<div class="clear"></div>
			<p>
				<label>Select Category</label>
				<select name="category">
					<?php	if(isset($list_category) && !empty($list_category)){
								foreach($list_category as $key=>$val){?>
									<option value = '<?php echo $val['id'];?>'><?php echo $val['name'];?></option>
					<?php		}
							}?>
				</select>
			</p>
				<div class="clear"></div>
			<p> 
				<label>Decription</label>
				<input class="text-input large-input" type="text" name="decription" value="<?php echo set_value('decription'); ?>" />
			</p>
			<div class="clear"></div>
			<p>
				<input class="button" type="submit" name="submit" value="Submit" />
			</p>
		</form>
	</div>
</div>