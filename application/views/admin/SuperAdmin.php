<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/table_layout.php"); ?>
		<title>Super Admin - Admin Panel</title>
		
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
							<h4 class="content-title mb-0 my-auto">Super Admin</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<a href="<?= base_url('admin_panel/SuperAdmins/AddAdmin'); ?>">
									<button class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add SuperAdmin</button>
								</a>
								<?= br(3); ?>
								<div class="table-responsive">
									<table class="table table-bordered" id="example1">
										<thead>
											<tr>
												<th>Username</th>
												<th>Email</th>
												<th>Mobile</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($data)){ ?>
												<?php $s=1; foreach($data as $key){ $ss=$s++; $ed = "ed_".$ss; ?>
													<tr>
														<td><?= $key['user']; ?>
														 </td>
														<td><?= $key['email']; ?></td>
														<td><?= $key['mobile']; ?></td>
														<td>
															<a class="edt" id="ed_<?= $key['id']; ?>" data-toggle="modal" data-target="#signs" href="#"><i class="fas fa-pen"></i> Edit</a>
															
															<?= nbs(4); ?>
															<a class="text-warning chng" data-toggle="modal" data-target="#chPass" id="ch_<?= $key['id']; ?>" href="#">Change Password</a><?= nbs(4); ?>
															<a class="text-danger" href="<?= base_url('admin_panel/SuperAdmins/delUser/'.$key['id']); ?>">Delete</a>
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
				
				<!-- row closed -->
				<?php if($feed = $this->session->flashdata("Feed")){ ?>
					<div class="flashd"><?= $feed; ?></div>
				<?php } ?>
			</div>
			<!-- Container closed -->
			<div id="signs" tabindex="-1"  class="modal fade" role="dialog">
				  <div class="modal-dialog  modal-sm">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">        
				        <span type="button" class="close" data-dismiss="modal">&times;</span>
				      </div>
				      <div class="modal-body">
				        <div class="container">
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="mod-title">
				                        <h5>Edit Super Admin</h5>
				                    </div>
				                    <form action="<?= base_url('admin_panel/SuperAdmins/update'); ?>" method="post">
				                        <div class="sign-form">
				                             <div class="form-group">
				                                <label>Username</label>
				                                <input type="text" id="users" name="user" class="form-control" placeholder="username" readonly="readonly">
				                            </div>
				                            <div class="form-group">
				                                <label>Email Id</label>
				                                <input type="email" id="emails" name="email" class="form-control" placeholder="Email Address" required="required">
				                            </div>
				                             <div class="form-group">
				                                <label>Mobile No</label>
				                                <input type="tel" id="mobs" name="mobile" class="form-control" placeholder="10 Digit Mobile No" maxlength="10" required="required">
				                            </div>
				                            
				                            <button class="btn btn-primary" type="submit">Update</button><br>
				                        </div>
				                    </form>
				                </div>
				                
				            </div>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>
				<div id="chPass" tabindex="-1"  class="modal fade" role="dialog">
				  <div class="modal-dialog  modal-sm">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">        
				        <span type="button" class="close" data-dismiss="modal">&times;</span>
				      </div>
				      <div class="modal-body">
				        <div class="container">
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="mod-title">
				                        <h5>Change Password</h5>
				                    </div>
				                    <form action="<?= base_url('admin_panel/SuperAdmins/updatePass'); ?>" method="post">
				                        <div class="sign-form">
				                             <div class="form-group">
				                                <label>New Password</label> <small id="msg1" class="text-danger"></small>
				                                <input type="Password" id="pass"  name="password" class="form-control" placeholder="New Password" required="required">
				                            </div>
				                            <div class="form-group">
				                                <label>Confirm Password</label> <small id="msg2" class="text-danger"></small>
				                                <input type="Password" id="conpass"  class="form-control" placeholder="Confirm Password" required="required">
				                            </div>
				                             <input type="hidden" id="userss" name="user" value="">
				                            
				                            <button id="bnnt" disabled class="btn btn-primary" type="submit">Update</button><br>
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
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/table_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				
				$(".edt").click(function(){
					var ids = this.id;
					var spl = ids.split("_");
					var id = spl[1];

					$.post("<?= base_url('admin_panel/SuperAdmins/gtUser'); ?>",
							{
								id: id
							},
							function(response,status)
							{
								var obj = JSON.parse(response);
								$("#users").val(obj.user);
								$("#emails").val(obj.email);
								$("#mobs").val(obj.mobile);
							}
						)
				});

				$(".chng").click(function(){
					var ids = this.id;
					var spl = ids.split("_");
					var id = spl[1];
					$.post("<?= base_url('admin_panel/SuperAdmins/gtUser'); ?>",
							{
								id: id
							},
							function(response,status)
							{
								var obj = JSON.parse(response);
								$("#userss").val(obj.user);
								
							}
						)
				});

				$("#pass").blur(function(){
					var pass = $("#pass").val();
					if(pass == ""){ $("#pass").focus(); $("#msg1").html("Enter New Password"); $("#bnnt").attr("disabled",true)}
					else if(pass.length < 8){$("#pass").focus(); $("#msg1").html("Minimum 8 Characters");$("#bnnt").attr("disabled",true)}
					else{$("#msg1").html("");$("#bnnt").attr("disabled",false)}
				});
				$("#conpass").keyup(function(){
					var pass = $("#pass").val();
					var conpass = $("#conpass").val();
					if(conpass == pass)
					{
						$("#msg2").html("Password matched");$("#bnnt").attr("disabled",false); $("#msg2").addClass("text-success"); $("#msg2").removeClass("text-danger");
					}
					else
					{
						
						$("#conpass").focus(); $("#msg2").html("Password Does not match!");$("#bnnt").attr("disabled",true); $("#msg2").addClass("text-danger"); $("#msg2").removeClass("text-success");
					}
				});
				
			});
		</script>
	</body>
</html>