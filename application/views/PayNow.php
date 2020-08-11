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
                    <div class="col-md-4">
                        <?php 
                        if($cart->category == "basic")
                        {
                            $tag = "(Single Video)";
                        }
                        else
                        {
                            $tag = "(All Videos)";
                        } ?>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <th>Order ID: </th>
                                        <td><?= nbs(10).ucwords($cart->order_id); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Plan: </th>
                                        <td><?= nbs(10).ucwords($cart->category); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Watch Permission: </th>
                                        <td><?= nbs(10).ucwords($tag); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Price: </th>
                                        <td><?= nbs(10)."&#8377; ".number_format($cart->gross_price,2); ?>/-</td>
                                    </tr>
                                </table>
                                <?php include("inc/payU.php"); ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        
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
                
            });
        
        </script>
        