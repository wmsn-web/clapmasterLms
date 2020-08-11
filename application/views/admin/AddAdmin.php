<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/form_layout.php"); ?>
		<title>Add Super Admin - Admin Panel</title>
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
							<h4 class="content-title mb-0 my-auto">Add Super Admin</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<a href="<?= base_url('admin_panel/SuperAdmins'); ?>">
									<button class="btn btn-outline-primary"><i class="fas fa-eye"></i> View SuperAdmin</button>
								</a>
								<?= br(3); ?>
								<div class="row justify-content-center">
									<div class="col-md-4">
										<div class="card border-1">
											<div class="card-header bg-primary text-center">
												<h3 class="card-title text-white">Super Admin Registration</h3>
											</div>
											<div class="card-body">
												<?php if($err = $this->session->flashdata("err")){ ?>
													<span class="text-danger"><?= $err; ?></span>
												<?php } ?>
												<?php if($feed = $this->session->flashdata("Feed")){ ?>
													<span class="text-success"><?= $feed; ?></span>
												<?php } ?>
												<form action="<?= base_url('admin_panel/SuperAdmins/regAdmin'); ?>" method="post">
													<div class="form-group">
														<label>Username</label>
														<input type="text" id="no_space"  name="user" class="form-control" required="required">
													</div>
													<div class="form-group">
														<label>Email Address</label>
														<input type="email" name="email" class="form-control" required="required">
													</div>
													<div class="form-group">
														<label>Mobile</label>
														<input type="tel" name="mobile" class="form-control" required="required">
													</div>
													<div class="form-group">
														<label>Password</label>
														<input type="password" name="password" class="form-control" minlength="8" required="required">
													</div>
													<div class="form-group">
														<button class="btn btn-primary">Register</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
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
		<?php include("inc/form_js.php"); ?>
		<script type="text/javascript">
			$('#no_space').on("input", function () {
    $(this).val($(this).val().replace(/ /g, ""));
});
		</script>
	</body>
</html>