<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>Home - Clap Master</title>
    	<?php include('inc/layout.php'); ?>
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?>
		
        <section style="margin-top: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2">&nbsp;</div>
                            <div class="col-md-8">
                                <div class="mt-180">
                                    <h1>Reset Password</h1>
                                   <form action="<?= base_url('ForgotPass/chPass'); ?>" method="post">
                                    <?php if($err = $this->session->flashdata("err")){ ?>
                                        <b><?= $err; ?></b>
                                    <?php } ?>
                                        <div class="sign-form">
                                            <div class="form-group">
                                                <label>New Password</label><small id="msg1"></small>
                                                <input id="pass" type="password" name="password" class="form-controls" placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label><small id="msg2"></small>
                                                <input id="conpass" type="password" name="password2" class="form-controls" placeholder="Confirm Password">
                                            </div>
                                            <input type="hidden" name="user" value="<?= $user; ?>">
                                            <button id="bbnt" type="submit">Save</button><br>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2">&nbsp;</div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <img class="img-responsive" src="<?= base_url(); ?>assets/img/banarImg.png" alt="">
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