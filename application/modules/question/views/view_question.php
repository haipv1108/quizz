<div class="content-box-content">
	<div class="tab-content default-tab"> 
	<?php if(isset($total) && !empty($total)){?>
		<div class="notification success png_bg">
			<a href="" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
				Database has a total of <?php echo $total;?> question.
			</div>
		</div>
	<?php }?>
		<table>
			<thead>
				<tr>
				   <th>Question</th>
				   <th>Answer</th>
				   <th>Level</th>
				   <th>Correct</th>
				   <th>Ans Explained</th>
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
		<?php	if(isset($view_question) && !empty($view_question)){
					foreach($view_question as $key=>$val){?>
						<tr>
							<td><?php echo $val['question'];?></td>
							<td>
								<?php foreach (json_decode($val['answer'],true) as $key => $value) {
									echo "{$key} : {$value}<br/>";
								}?>
							</td>
							<td><?php echo $val['level'];?></td>
							<td>
								<?php foreach (json_decode($val['correct'],true) as $key1 => $value1) {
									echo "<li>{$value1}</li>";
								}?>
							</td>
							<td><?php echo $val['ans_explained'];?></td>
							<td>
								<a href="<?php echo site_url();?>question/editquestion/<?php echo $val['id'];?>" title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/pencil.png" alt="Edit"></a>
								<a href="<?php echo site_url();?>question/deletequestion/<?php echo $val['id'];?>" title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
							</td>
						</tr>
		<?php		}
				}?>
			</tbody>
		</table>
	</div>   
</div>