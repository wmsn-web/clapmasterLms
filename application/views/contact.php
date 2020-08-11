<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>Contact Us - Clap Master</title>
    	<?php include('inc/layout.php'); ?> 
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
			<section class="hero_area themeColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <h5 class="text-white">Contact Person</h5>
                            <span class="text-white">
                                <b><i class="fa fa-user"></i> Name-</b> ANSH NAGPAL<br>
                                <b><i class="fa fa-phone"></i> Contact no-</b> +91 9650 744 530<br>
                                <b><i class="fa fa-envelope"></i> Email-</b> info@masterclap.in<br>
                                <b><i class="fa fa-envelope"></i> Email-</b> masterclap@gmail.com<br>
                                
                            </span>                        
                    </div>
                    <div class="col-md-6">
                        <h5>Send Your Query</h5>
                        <p class="text-white">We're here to answer any questions you have about MasterClap or our courses.</p>
                        
                            <div class="card">
                                <div class="card-body">
                                    <div class="alrt">
                                        <div id="alrt-msg" class="alert alert-success"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Full Name</label> <small id="msg1" class="text-danger"></small>
                                        <input type="text" id="name" class="form-control danger">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label> <small id="msg2" class="text-danger"></small>
                                        <input type="text" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label> <small id="msg3" class="text-danger"></small>
                                        <textarea id="msgs" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button id="snd" class="btn btn-dark">Send Query</button>
                                        <img id="loder" src="<?= base_url('assets/img/loader.gif'); ?>" width="35">
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
                $(".alrt").hide();
                $("#loder").hide();
                //$("#alrt-msg").fadeOut(2000);

                $("#snd").click(function(){

                                            

                    var name = $("#name").val();
                    var email = $("#email").val();
                    var msgs = $("#msgs").val();
                    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
                    if(name == ""){$("#name").focus(); $("#msg1").html("Please Enter Your Full Name.")}
                    else if(email == ""){$("#email").focus(); $("#msg2").html("Please Enter Your Email Address.")}
                    else if(msgs == ""){$("#msgs").focus(); $("#msg3").html("Please Write Something.")}
                    else
                    {
                        if(!email_regex.test(email))
                        {
                            $("#email").focus(); $("#msg2").html("Please Enter a valid Email Address.")
                        }
                        else
                        {
                            $("#loder").show();
                            $("#snd").hide();
                            $("#msg1").html("");
                            $("#msg2").html("");
                            $("#msg3").html("");
                            $.post("<?= base_url('Pages/sendQuery'); ?>",
                                    {
                                        name: name,
                                        email: email,
                                        msgs: msgs
                                    },
                                    function(response,status)
                                    {
                                        if(response ==1)
                                        {
                                            $(".alrt").show();
                                            //$("#alrt-msg").fadeOut(2000);
                                            $("#alrt-msg").html("Thank you. Your Query has been sent to us. Our concern will contact you soon.");
                                            $("#loder").hide();
                                            $("#snd").show();

                                            $("#name").val("");
                                            $("#email").val("");
                                            $("#msgs").val("");
                                        }
                                    }
                            )
                        }
                    }

                });
            });
        
        </script>
        