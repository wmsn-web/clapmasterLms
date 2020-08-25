<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>Contact Us - Master Clap</title>
    	<?php include('inc/layout.php'); ?> 
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
			<section class="hero_area themeColor">
            <div class="container">
                <div class="bx-full bx-brd">
                                    <div class="bx-content bx-white">
                                      <div class="row">
                                          <div class="col-md-5">
                                              <h4 class="">Contact Person</h4>
                                                <span class="">
                                                    <b><i class="fa fa-user"></i> Name-</b> ANSH NAGPAL<br>
                                                    <b><i class="fa fa-phone"></i> Contact no-</b> +91 9650 744 530<br>
                                                    <b><i class="fa fa-envelope"></i> Email-</b> info@masterclap.in<br>
                                                    <b><i class="fa fa-envelope"></i> Email-</b> masterclap.in@gmail.com<br>
                                                </span> 
                                                <img src="<?= base_url('assets/img/aboutImg.png'); ?>" class="img-responsive" />
                                                <ul class="followContact">
                        <li><a target="_blank" href="https://www.facebook.com/112535730511932/posts/118324056599766/?substory_index=0"><i class="fab fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/master-clap-6060311b1"><i class="fab fa-linkedin "></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/MasterClap1"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/masterclap.inc/"><i class="fab fa-instagram
"></i></a></li>
                        <li><a target="_blank" href="https://in.pinterest.com/masterclap/"><i class="fab fa-pinterest-square"></i></a></li>
                    </ul> 
                                          </div>
                                          <div class="col-md-7">
                                              <form action="<?= base_url('Home/sendContact'); ?>" method="post" class="border-form shaddow-form">
                                                  <h4>Send Us your query</h4>
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
                                                        <label>Message</label>
                                                        <textarea name="mssg" class="form-control" required="required" placeholder="Write your query"></textarea>
                                                        <br>
                                                        <button class="btn btn-primary">Send</button>
                                                    </div>
                                              </form>
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
        