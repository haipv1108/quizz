<div class="content-box-content">
	<div class="tab-content default-tab" id="tab1">
	<?php if(isset($total) && !empty($total)){?>
		<div class="notification success png_bg">
			<a href="" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
				Database has a total of <?php echo $total;?> test.
			</div>
		</div>
	<?php }?>
		<table>
			<thead>
				<tr>
				   <th>Mã đề thi</th>
				   <th>Tên đề thi</th>
				   <th>Môn học</th>
				   <th>Thời gian</th>
				   <th>Số lượng câu hỏi</th>
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
		<?php	if(isset($view_test) && !empty($view_test)){
					foreach($view_test as $key=>$val){?>
						<tr>
							<td><?php echo $val['madethi'];?></td>
							<td><?php echo $val['name'];?></td>
							<td><?php echo $val['categoryid'];?></td>
							<td><?php echo $val['time'];?></td>
							<td><?php echo $val['sl'];?></td>
							<td>
								<!-- <a href="<?php echo site_url();?>admin/edituser/<?php echo $val['id'];?>" title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/pencil.png" alt="Edit"></a> -->
								<a href="<?php echo site_url();?>managetest/delete/<?php echo $val['id'];?>" title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
		<?php		}
				}?>
			</tbody>
		</table>
	</div>   