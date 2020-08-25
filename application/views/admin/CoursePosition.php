<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
		<title> Admin Panel</title>
	</head>
	<body class="main-body app sidebar-mini Light-mode">
		
		<?php include("inc/sidemenu.php"); ?>
		<div class="main-content app-content">
			<?php include("inc/header.php"); ?>
			<div class="container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Course Position</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Edit Course Positions</h5>
							</div>
							<div class="card-body">
								<table class="table table-bordered">
									<tr>
										<th>Course Name</th>
										<th>Position</th>
									</tr>
									<?php if(!empty($crsData)): ?>
										<?php foreach($crsData as $key): ?>
											<tr>
												<td><?= $key['course_name']; ?></td>
												<td>
													<select id="crs_<?= $key['crsId']; ?>_<?= $key['crsPositions']; ?>" class="slPos">
														<?php $n=1; for ($i=0; $i < $key['totalCourse']; $i++): $nn = $n++;
														 if($nn == $key['crsPositions']): $slct = "selected"; else: $slct = ""; endif; ?>
															<option <?= $slct; ?> value="<?= $nn; ?>"><?= $nn; ?></option>
														<?php endfor; ?>
													</select>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								Courses By Position
							</div>
							<div class="card-body">
								<table class="table table-bordered">
									<tr>
										<th>SL</th>
										<th>Course Name</th>
									</tr>
									<?php if(!empty($crsPos)): ?>
										<?php $s = 1; foreach($crsPos as $crs): $sl = $s++; ?>
											<tr>
												<td><?= $sl; ?></td>
												<td><?= $crs->course_name; ?></td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/dash_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".slPos").change(function(){
					ids = this.id;
					spl = ids.split("_");
					crsId = spl[1];
					oldPosition = spl[2];

					curPosition = this.value;
					//alert(crsId+" and "+curPosition+" and "+oldPosition);
					$.post("<?= base_url('admin_panel/CoursePosition/setPosition'); ?>",
					{
						crsId: crsId,
						curPosition: curPosition,
						oldPosition: oldPosition
					},
					function(response,status)
					{
						alert("position Changed");
						location.href="";
					}

						)
				});
			});

		</script>
	</body>
</html>