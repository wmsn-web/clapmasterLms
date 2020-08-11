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
                                   <form action="<?= base_url('ClientLogin/LoginOther'); ?>" method="post">
                                    <?php if($err = $this->session->flashdata("err")){ ?>
                                        <b><?= $err; ?></b>
                                    <?php } ?>
                                        <div class="sign-form">
                                            <div class="form-group">
                                                <label>Mobile No. Or Email Id</label>
                                                <input type="text" name="username" class="form-controls" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-controls" placeholder="Password">
                                            </div>
                                            <input type="hidden" name="redirectUrl" value="<?= $_GET['backUrl']; ?>">
                                            <button type="submit">Login</button><br>
                                            
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
		
	</body>
</html>