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
						    
								<p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;All Course&nbsp;/&nbsp;</p>
							
							
							
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
								<table class="table table-bordered" id="example2">
									<thead>
										<tr>
											<th>SL</th>
											<th class="bg-primary text-white">Course Name</th>
											<th style="width: 20%" class="bg-primary text-white">Course Details</th>
											<th class="bg-primary text-white">Course Level</th>
											<th class="bg-warning text-white">Edit</th>
											<th class="bg-danger text-white">Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($data)){ ?>
											<?php $s =1; foreach ($data as $key) { $sl = $s++; $slid = "arr_".$sl; $slarea = "area_".$sl ?>
												<tr>
													<td><?= $sl; ?></td>
													<td><b><?= $key['course_name']; ?></b><br><br>
														<a onclick="return confirm('<?= $key['txt']; ?>')" href="<?= base_url('admin_panel/AllCourses/publish/'.$key['crsId']); ?>">
														<button class="btn btn-primary"><?= $key['btn']; ?></button>
													</td>
													<td style="width: 20%"><?= html_entity_decode($key['descr']); ?></td>
													<td>
														<a class="modal-effect adcp" data-effect="effect-newspaper" id="<?= $key['crsId']; ?>" data-toggle="modal" href="#modaldemo8">Add Level</a><br>
														<span id="<?= $slid; ?>" class="selectArrow"><i class="fas fa-angle-down"></i></span>
														<span id="<?= $slarea; ?>" class="slArea">
															<ul>
																<?php if(!empty($key['chapData'])){ ?>
																	<?php foreach ($key['chapData'] as $key2) {
																		if($key2['crsIds']==$key['crsId'])
																		{
																			$disp = "";
																		}
																		else
																		{
																			$disp ="style='display:none'";
																		}
																	 ?>
																		<li <?= $disp; ?>><a href="<?= base_url('admin_panel/ChapterContent/index/'.$key2['id']); ?>"><?= $key2['chapName']; ?></a> <?= nbs(5); ?>
																		<a class="text-danger" href="<?= base_url('admin_panel/AllCourses/delChap/'.$key2['id']); ?>"><i class="fas fa-times"></i></a></li>
																	<?php } ?>
																<?php } ?>
															</ul>
														</span>
													</td>
													<td><a href="<?= base_url('admin_panel/AddCourse/index/edit/'.$key['crsId']); ?>">Edit</a></td>
													<td>
														<a onclick="return confirm('Are you Sure? Delete this Course.')" class="text-danger" href="<?= base_url('admin_panel/AddCourse/delCrs/'.$key['crsId']); ?>">
														Delete</a></td>
												</tr>
											<?php } ?>
									    <?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Add Level</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form action="<?= base_url('admin_panel/AllCourses/addChapter'); ?>" method="post">
						<div class="modal-body">
							<div class="form-group">
								<label>Level Name</label>
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
								<label>price(Price For All Videos of this level)</label>
								<input type="text" name="price" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea name="descr" class="form-control" required="required"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Save Level</button>
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
			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/table_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".selectArrow").click(function(){
					var id = this.id;
					var spl = id.split("_");
					var ids = spl[1];
					var newId = "area_"+ids;
					$("#"+newId).toggle(300);
				});
				$(".adcp").click(function(){
					var id = this.id;
					$("#crs").val(id);
				});

			});
		</script>
	</body>
</html>