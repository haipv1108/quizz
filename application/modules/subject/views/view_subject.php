<div class="content-box-content">
	<div class="tab-content default-tab"> 
	<?php if(isset($total) && !empty($total)){?>
		<div class="notification success png_bg">
			<a href="" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
				Database has a total of <?php echo $total;?> subject.
			</div>
		</div>
	<?php }?>
		<table>
			<thead>
				<tr>
				   <th><input class="check-all" type="checkbox" /></th>
				   <th>Subject</th>
				   <th>Category</th>
				   <th>Decription</th>
				   <th>Tool</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="6">
						<div class="bulk-actions align-left">
							<select name="dropdown">
								<option value="option1">Choose an action...</option>
								<option value="option2">Edit</option>
								<option value="option3">Delete</option>
							</select>
							<a class="button" href="#">Apply to selected</a>
						</div>
						
						<div class="pagination">
							<?php if(isset($paginator) && !empty($paginator)) echo $paginator;?>
						</div> <!-- End .pagination -->
						<div class="clear"></div>
					</td>
				</tr>
			</tfoot>
		 
			<tbody>
		<?php	if(isset($view_subject) && !empty($view_subject)){
					foreach($view_subject as $key=>$val){?>
						<tr>
							<td><input type="checkbox" value = '<?php echo $val['id'];?>'/></td>
							<td><?php echo $val['subject_name'];?></td>
							<td><?php echo $val['category_name'];?></td>
							<td><?php echo $val['decription'];?></td>
							<td>
								<a href="<?php echo site_url();?>subject/editsubject/<?php echo $val['id'];?>" title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/pencil.png" alt="Edit"></a>
								<a href="<?php echo site_url();?>subject/deletesubject/<?php echo $val['id'];?>" title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
		<?php		}
				}?>
			</tbody>
		</table>
	</div>   
</div>