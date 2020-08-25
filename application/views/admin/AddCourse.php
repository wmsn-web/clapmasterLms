<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
		<title> Add Course - Admin Panel</title>
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
							<h4 class="content-title mb-0 my-auto">Add Course</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row justify-content-center">
					<div class="col-md-5">
						<div class="card">
							<div class="card-header bg-primary text-center">
								<h3 class="text-white card-title">
									<?php if(!$this->uri->segment(4)=="edit"): ?>
									Add Course
									<?php ; else: ?>
									Edit Course
									<?php ; endif; ?>
								</h3>
							</div>
							<div class="card-body">
								<?php if(!$this->uri->segment(4)=="edit"): ?>
									<form action="<?= base_url('admin_panel/AddCourse/addCrs'); ?>" method="post">
										<div class="form-group">
											<label>Course Name</label> *<small class="text-danger">No Special Characters!</small>
											<input type="text" name="course_name" id="input" class="form-control" required="required" pattern="[^-,!@#$%^&*()]+"  >
										</div>
										<div class="form-group">
											<label>Course Description</label>
											<textarea name="course_desc" class="form-control" required="required"></textarea>
										</div>
										<div class="form-group">
											<button class="btn btn-primary">Save</button>
										</div>
									</form>
								<?php ; else: ?>
								<?php if(empty($data)){ echo "Invalid Course!";} else{ ?>
									<form action="<?= base_url('admin_panel/AddCourse/editCrs/'.$data['crsId']); ?>" method="post">
										<div class="form-group">
											<label>Course Name</label> *<small class="text-danger">No Special Characters!</small>
											<input type="text" name="course_name" class="form-control" required="required" value="<?= $data['course_name']; ?>" pattern="[^,!@#$%^&*()]+" >
										</div>
										<div class="form-group">
											<label>Course Description</label>
											<textarea name="course_desc" class="form-control" required="required"><?= $data['descr']; ?></textarea>
										</div>
										<div class="form-group">
											<button class="btn btn-primary">Update</button>
										</div>
									</form>
								<?php } ?>
								<?php ; endif; ?>
							</div>
						</div>
					</div>
				</div>
				
				<!-- row closed -->
				<?php if($feed = $this->session->flashdata("Feed")){ ?>
					<div class="flashd"><?= $feed; ?></div>
				<?php } ?>
			</div>

			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/dash_js.php"); ?>
		
	</body>
</html>