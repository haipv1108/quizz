<div class="content-box">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="box">
					<div class="content-box-header box-header with-border">
						<h3 class="box-title">Kết quả bài thi</h3>
					</div>
					
					<div class="content-box-content">
						<div>
							<form action="" method="post" class="form-horizontal">
								<div class="box-body">
									<!-- Điểm đạt được -->
									<div class="form-group">
										<label for="" class="col-md-4 control-label">Điểm đạt được:</label>
										<div class="col-md-5">
											<p style="padding-top: 7px;	"><b><?php echo $score;?></b></p>
										</div>
									</div>
									<!-- Điểm bài thi -->
									<div class="form-group">
										<label for="" class="col-md-4 control-label">Trên tổng điểm:</label>
										<div class="col-md-5">
											<p style="padding-top: 7px;	"><b><?php echo $totalScore;?></b></p>
										</div>
									</div>
									<!-- Điểm đạt được -->
									<div class="form-group">
										<label for="" class="col-md-4 control-label">Điểm quy đổi:</label>
										<div class="col-md-5">
											<p style="color: blue; padding-top: 7px;	"><b><?php echo round($score/$totalScore*10,2);?></b></p>
										</div>
									</div>
								</div> <!-- end box-body -->
								<div class="box-footer text-center">
									<form method="post" action="">
										<input type="submit" class="btn btn-success" value="Trở về" name="submit_rs">
									</form>
								</div>
							</form>
						</div> <!-- End  -->     
					</div> <!-- End .content-box-content -->
				</div>
			</div>
		</div>
	</div>
</div> <!-- End .content-box -->
