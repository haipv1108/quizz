<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							
							<div>
								  <?php if(isset($message)) {echo $message; die;}?>
							</div>
						</div>
						<table>
						<form action="" method="post">
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th><a href="#">Title</a></th>
								   <th><a href="#">Content</a></th>
								   <th><a href="#">Create on</a></th>
								   <th>Active</th>
								   <th>Message</th>
								   <th>Tool</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left" >
										
											<select name="dropdown">
												<option>Choose an action...</option>
												<option value="publish">publish to selected</option>
												<option value="unpublish">unpublish to selected</option>

											</select>
											<input class="button" type="submit" name="submit" value="Apply to selected" />
										
										</div>
										
									</td>
								</tr>
							</tfoot>
							<tbody>
							<?php foreach($view_article as $key=> $val){?>
								<tr>
									<td><input type="checkbox" name="checkbox[]" value="<?php echo $val['id'];?>" /></td>
									<td><?php echo $val['title']; ?></td>
									<td><a href="#" title="title"><?php echo $val['content']; ?></a></td>
									<td><?php echo $val['date']; ?></td>
									<td><?php if($val['active']==0) echo "No"; else echo "Yes";?></td>
									<td>Noi dat messege</td>
									<td>
										<!-- Icons -->
										 <a href="<?php echo base_url();?>member/edit/<?php echo $val['id'];?>" title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo base_url();?>member/delete/<?php echo $val['id'];?>" title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
									</td>
								</tr>
							<?php }?>
							</tbody>
							</form>
						</table>
					</div> <!-- End #tab1 -->    
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->