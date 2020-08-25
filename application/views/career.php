<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>About Us - Master Clap</title>
    	<?php include('inc/layout.php'); ?> 
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
			<section class="hero_area themeColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-white">Career</h2>
                        <div class="bx-full bx-brd">
                                <div class="bx-white">
                                    <h3>Career</h3>
                                    <p>
                                        MasterClap is transforming online education by enabling anyone in the world to learn from the very best. Our trainers include best minds who are passionate about their art and want to share their knowledge. We are unravelling what makes an actor able to cry on demand, how a singer able to bring soul to music , and what it takes to snap a best view. Our online learning content is available to students anywhere anytime, which supports our mission to ignite the greatness in others. We will provide you with a Certificate.
                                    </p>
                                    <div class="bx-content">
                                        <form action="<?= base_url('Home/sendQuery'); ?>" method="post" class="border-form shaddow-form" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Introduce yourself</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" name="name" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="text" name="email" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" name="mobile" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload Resume</label>
                                                        <input type="file" name="cvfile" class="form-control-file" accept=
"application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document, image/*" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Something About You</label>
                                                        <textarea name="mssg" class="form-control" required="required" placeholder="Write Something About You"></textarea>
                                                        <br>
                                                        <button class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
            });
        
        </script>
        