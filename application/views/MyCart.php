<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>MY Cart - Clap Master</title>
    	<?php include('inc/layout.php'); ?> 
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
			<section class="hero_area themeColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-white">
                            My Cart
                        </h3>
                        <div class="row">
                            <?php if($feed=$this->session->flashdata("Feed")){ ?>
                                <div class="col-md-12">
                                    <div id="alrt" class="alert alert-danger">
                                        <?= $feed; ?>
                                    </div>
                                </div>
                            <?php } ?>
                           <?php if(empty($cartData)){ ?>
                            <div class="col-md-12">
                                <div class="alert alert-primary">
                                    No Item Found on Cart.
                                </div>
                            </div>
                            <?php }else{ ?>
                                <?php foreach($cartData as $key){ ?>
                            <div class="col-md-3 mb-10">
                                <div class="card">
                                    <div class="text-center">
                                        <span>#<?= ucwords($key['order_id']); ?></span>

                                        <span style="float: right; padding-right: 10px;">
                                            <a href="<?= base_url('MyCart/delCart/'.$key['id']); ?>"> 
                                                <i class="fa fa-times text-danger"></i>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="my-card">
                                            <span>Plan: <?= ucwords($key['category']); ?> Plan</span><br>
                                            <span>Price: <?= $key['price']; ?>/-</span><br>
                                            <div align="center">
                                                <a href="PayNow/secure/<?= $key['order_id']; ?>">
                                                    <button class="btn btn-dark">Buy Now</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
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
        