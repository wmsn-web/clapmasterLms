<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>About Us - Clap Master</title>
    	<?php include('inc/layout.php'); ?> 
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
			<section class="hero_area themeColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="courses_offered">
                            <h4>My Menu</h4>
                            <a id="mpro" class="getChap" href="javascript:void(0)">My Profile<i class="fa fa-angle-right"></i></a>
                            <a id="" class="getChap" href="<?= base_url('MyCart'); ?>">My Cart<i class="fa fa-angle-right"></i></a>
                             <a id="" class="getChap" href="<?= base_url('MyCourses'); ?>">My Course<i class="fa fa-angle-right"></i></a>
                              <a id="chps" class="getChap" href="javascript:void(0)">Change Password<i class="fa fa-angle-right"></i></a>
                               <a id="" class="getChap" href="<?= base_url('Logout/index'); ?>">Logout<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="courses_offeredrr">
                            <div class="card">

                                <div class="card-body">
                                    <div id="profile">
                                    <?php if($feed = $this->session->flashdata("Feed")){ ?>
                                    <span class="text-success"><?= $feed; ?></span>
                                    <?php } ?>
                                    <h4 class="card-title"><?= $data['name']; ?></h4>
                                    <form action="<?= base_url('MyProfile/updateUser'); ?>" method="post">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Full Name</label>
                                                <input type="text" name="name" class="form-control" required="required" value="<?= $data['name']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email Address</label>
                                                <input type="text" name="email" class="form-control" readonly="readonly" value="<?= $data['email']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Mobile Number</label>
                                                <input type="text" name="mobile" class="form-control" required="required" value="<?= $data['mobile']; ?>">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label>State</label>
                                                <select name="state" class="form-control" required="required">
                                                    <?php foreach ($states as $key) {
                                                        if($key['state'] == $data['state']):
                                                            $slct = "selected"; else: $slct = ""; endif;
                                                        
                                                   ?>
                                                   <option <?= $slct; ?> value="<?= $key['state']; ?>"><?= $key['state']; ?></option>
                                               <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>City Name</label>
                                                <input type="text" name="city" class="form-control" required="required" value="<?= $data['city']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>PIN</label>
                                                <input type="text" name="pin" class="form-control" required="required" value="<?= $data['pin']; ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div id="pasw">
                                        <h4>Change Password</h4>
                                        <form>
                                            <div class="form-group col-md-6">
                                                <label>Old Password</label>
                                                <input type="password" id="oldpas" class="form-control" required="required">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>New Password</label>
                                                <input type="password" id="password" class="form-control" required="required">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label><span id="msg"></span>
                                                <input type="password" id="conpass" class="form-control" required="required">
                                            </div>
                                            <button id="sbps" type="button" class="btn btn-primary">Change Password</button>
                                        </form>
                                    </div>
                                </div><!-- Card-body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
		<?php include('inc/footer.php'); ?>
		</div>
		<?php include('inc/modal.php'); ?>
		<?php include('inc/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#alrt").fadeOut(5000);
                $("#pasw").hide();
                $("#chps").click(function(){
                    $("#profile").hide();
                    $("#pasw").show(200);
                });
                $("#mpro").click(function(){
                    $("#profile").show(200);
                    $("#pasw").hide();
                });
                $("#conpass").keyup(function(){
                    var pass = $("#password").val()
                    var conpass = $("#conpass").val()
                    if(pass == conpass)
                    {
                        $("#msg").html("Password Matched!");
                        $("#msg").css("color","#090");
                    }
                    else
                    {
                        $("#msg").html("Password does not Match!");
                        $("#msg").css("color","#f00");
                    }
                });
                $("#sbps").click(function(){
                    var pass = $("#password").val();
                    var conpass = $("#conpass").val();
                    var oldpas = $("#oldpas").val();
                    if(oldpas == ""){ alert('Enter Old Password')}
                    else if(pass == ""){ alert('Enter valid password')}
                    else if(conpass == ""){ alert('Confirm Password')}
                    else
                    {
                         if(pass == conpass)
                            {
                                
                                $("#msg").html("Password Matched!");
                                $("#msg").css("color","#090");
                                
                                $.post("<?= base_url('MyProfile/chpass'); ?>",
                                        {
                                            oldpas: oldpas,
                                            pass: pass

                                        },
                                        function(response,status)
                                        {
                                            if(response=="No")
                                            {
                                                alert("Invalid Old Password!")
                                                return false;
                                            }
                                            else
                                            {
                                                alert("Password Successfully Changed. You will be redirect to login page. Login again with your New password");
                                                location.href="<?= base_url('MyProfile'); ?>";
                                            }
                                        }
                                )
                            }
                            else
                            {
                                
                                $("#msg").html("Password does not Match!");
                                $("#msg").css("color","#f00");
                                return false;
                            }
                    }
                });
            });
        
        </script>
        