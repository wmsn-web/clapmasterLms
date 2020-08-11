<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
		<title>Change Password Admin Panel</title>
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
							<h4 class="content-title mb-0 my-auto">Change Password</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row justify-content-center">
					<div class="col-md-4">
						<div class="card">
							<div class="card-body">
								<?php if($feed = $this->session->flashdata("Feed")){ ?>
									<span class="text-danger"><?= $feed; ?></span>
								<?php } ?>
								<form action="<?= base_url('admin_panel/ChangePassword/chng'); ?>" method="post">
									<div class="form-group">
										<label>Old Password</label>
										<input type="Password" name="old_pass" class="form-control" required="required">
									</div>
									<div class="form-group">
										<label>New Password</label> <small id="msg1"></small>
										<input type="Password" id="pass" name="new_pass" class="form-control" required="required">
									</div>
									<div class="form-group">
										<label>Confirm Password</label> <small id="msg2"></small>
										<input type="Password" id="conpass" name="con_pass" class="form-control" required="required">
									</div>
									<div class="form-group">
										<button id="bbnt" class="btn btn-primary">Save</button>
									</div>
								</form>
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
				$("#pass").blur(function(){
					var pass = $("#pass").val();
					if(pass.length<8)
					{
						$("#msg1").html("Minimum 8 characters Password!");
						$("#msg1").css("color","#f00");
						$("#bbnt").attr("disabled",true);
						$("#pass").focus();
					}
					else
					{
						$("#msg1").html("");
						$("#bbnt").attr("disabled",false);
					}
				});
				$("#conpass").keyup(function(){
					var pass = $("#pass").val();
					var conpass = $("#conpass").val();
					if(pass == conpass)
					{
						$("#msg2").html("Password matched");
						$("#msg2").css("color","#090");
						$("#bbnt").attr("disabled",false);
					}
					else
					{
						$("#msg2").html("Password does not match!");
						$("#msg2").css("color","#f00");
						$("#bbnt").attr("disabled",true);
					}
				});
			});
		</script>
	</body>
</html>