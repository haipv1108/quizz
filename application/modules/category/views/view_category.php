<div class="content-box-content">
	<div class="tab-content default-tab"> 
	<?php if(isset($total) && !empty($total)){?>
		<div class="notification success png_bg">
			<a href="" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
				Database has a total of <?php echo $total;?> category.
			</div>
		</div>
	<?php }?>
		<table>
			<thead>
				<tr>
				   <th>Name</th>
				   <th>Decription</th>
				   <th>Tool</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="6">
						<div class="pagination">
							<?php if(isset($paginator) && !empty($paginator)) echo $paginator;?>
						</div> <!-- End .pagination -->
						<div class="clear"></div>
					</td>
				</tr>
			</tfoot>
		 
			<tbody>
		<?php	if(isset($view_category) && !empty($view_category)){
					foreach($view_category as $key=>$val){?>
						<tr>
							<td><?php echo $val['name'];?></td>
							<td><?php echo $val['decription'];?></td>
							<td>
								<a href="<?php echo site_url();?>category/editcategory/<?php echo $val['id'];?>" title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/pencil.png" alt="Edit"></a>
								<a href="<?php echo site_url();?>category/deletecategory/<?php echo $val['id'];?>" title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
		<?php		}
				}?>
			</tbody>
		</table>
	</div>   
</div>