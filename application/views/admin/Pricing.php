<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/table_layout.php"); ?>
		<title> All Courses</title>
	</head>
	<body class="main-body app sidebar-mini Light-mode">
		<div id="global-loader" class="light-loader">
			<img src="<?= base_url(); ?>admin_assets/img/loaders/loader.svg" class="loader-img" alt="Loader">
		</div>
		<?php include("inc/sidemenu.php"); ?>
		<div class="main-content app-content">
			<?php include("inc/header.php"); ?>
			<div class="container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<a href="<?= base_url('admin_panel/'); ?>">
								<i class="mdi mdi-home text-muted hover-cursor"></i>
						    </a>
						    
								<p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Price Setup&nbsp;/&nbsp;</p>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row justify-content-center">
					<div class="col-md-10">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">All Courses</h3> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
								<table class="table table-bordered" id="example33">
									<thead>
										<tr>
											<th>SL</th>
											<th class="bg-primary text-white">Course Name</th>
											
											<th class="bg-primary text-white">Course Chapters</th>
											
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($data)){ ?>
											<?php $s =1; foreach ($data as $key) { $sl = $s++; $slid = "arr_".$sl; $slarea = "area_".$sl ?>
												<tr>
													<td><?= $sl; ?></td>
													<td><b><?= $key['course_name']; ?></b>
													</td>
													
													<td>
														<div class="table-responsive">
														<table class="table table-bordered">
															<tr>
																<th>Chapters</th>
																<th>Full Course Price</th>
																<th>Full Course Discount</th>
																<th>Level Price</th>
																<th>Level Discount</th>
																<th>Each Video Price</th>
																<th>Each Video Discount</th>
																<th>Action</th>
															</tr>
															<?php if(!empty($key['chapData'])){ ?>
																<?php foreach($key['chapData'] as $key2) {
																	if($key2['crsIds']==$key['crsId'])
																		{
																			$disp = "";
																		}
																		else
																		{
																			$disp ="style='display:none'";
																		}
																	 ?>

																	<tr <?= $disp; ?>>
																		<td><?= $key2['chapName']; ?></td>
																		<td><input type="text" id="fl_<?= $key2['id']; ?>" value="<?= $key2['full_price']; ?>" class="Price" placeholder="Edit"></td>

																		<td><input type="text" id="fd_<?= $key2['id']; ?>" value="<?= $key2['full_discount']; ?>" class="Price" placeholder="Edit"></td>

																		<td><input type="text" id="lvp_<?= $key2['id']; ?>" value="<?= $key2['price']; ?>" class="Price" placeholder="Edit"></td>

																		<td><input type="text" id="lvd_<?= $key2['id']; ?>" value="<?= $key2['discount']; ?>" class="Price" placeholder="Edit"></td>

																		<td><input type="text" id="ec_<?= $key2['id']; ?>" value="<?= $key2['each_price']; ?>" class="Price" placeholder="Edit"></td>

																		<td><input type="text" id="ecd_<?= $key2['id']; ?>" value="<?= $key2['each_discount']; ?>" class="Price" placeholder="Edit"></td>
																		<td><button class="btn btn-primary">Save</button></td>
																	</tr>
																<?php } ?>	
														    <?php } ?>
														</table>
													</div>
													</td>
													
												</tr>
											<?php } ?>
									    <?php } ?>
									</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Add Chapter</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form action="<?= base_url('admin_panel/AllCourses/addChapter'); ?>" method="post">
						<div class="modal-body">
							<div class="form-group">
								<label>Chapter Name</label>
								<input type="text" name="chapName" class="form-control" required="required">
							</div>
							<input type="hidden" id="crs" name="crsId" class="form-control">
							<div class="form-group">
								<label>Position</label>
								<select name="position" class="form-control" required="required">
									<option value="">Select</option>
									<?php $s =1; for ($i=0; $i < 8; $i++) {
									 $ss = $s++;
									 if($ss==1){$st = "st";}elseif ($ss==2) {$st="nd";}elseif ($ss==3) {$st="rd";}else{$st="th";}
									 	
									  ?>
										<option value="<?= $ss; ?>"><?= $ss." ".$st; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input type="text" name="price" class="form-control" required="required">
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Save Chapter</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
				
				<!-- row closed -->
			</div>
			<?php if($feed = $this->session->flashdata("Feed")){ ?>
					<div class="flashd"><?= $feed; ?></div>
				<?php } ?>
				<div id="msg"></div>
			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/table_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".flashd").fadeOut(5000);
				$(".Price").blur(function(){
					var id = this.id;
					var valu = this.value;
					var spl = id.split("_");
					var target = spl[0];
					var ids = spl[1];
					
					$.post("<?= base_url('admin_panel/Pricing/setPrice'); ?>",
					 {
					 	id: ids,
					 	price: valu,
					 	target: target
					 },
					 function(response,status)
					 {
					 	
					 	$("#msg").addClass("flashd");
					 	$("#msg").html("Price Updated Successfully :)");
					 	
					 }
					)
					
					
				});

				

			});
		</script>
	</body>
</html>