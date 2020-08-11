<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>MY Cart - Clap Master</title>
    	<?php include('inc/layout.php'); ?> 
        <style type="text/css">
            .tlb {width:100%;}
            .tlb td{padding: 2px 2px; border-bottom: solid 1px #fff}
            .tlb th {padding: 2px 2px}
            .bnt {padding: 2px 8px; background: #8501DA; color: #fff; border: solid 1px #fff;}
            .msg1{display: none;}
            span.right{float: right; cursor: pointer; color: #FFC7FD}

        </style>
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
                                <div class="col-md-12">
                                <table class="table table-bordered text-white">
                                    <tr>
                                        <th>Plans</th>
                                        <th>Items</th>
                                        <th style="text-align: right">Price</th>
                                    </tr>
                                
                                <?php foreach($cartData as $key){ ?>
                                    <tr>
                                        <td><?= ucwords($key['category']); ?>
                                            <a href="<?= base_url('MyCart/delCart/'.$key['id']); ?>">
                                                <span class="right">Remove</span>
                                            </a>
                                        </td>
                                        <?php if($key['category'] == "basic"): $class = " class='mdl'"; else: $class = ""; endif; ?>
                                        <td>
                                            <span <?= $class; ?>  id="<?= $key['id']; ?>">
                                            <b><?= $key['tag']; ?> </b>
                                            <?php foreach($key['items'] as $itm){ ?>
                                                <?= $itm['title'].$itm['chapName']." | "; ?>
                                            <?php } ?>
                                            <?= "(".$key['course'].$key['level'].")"; ?>
                                            </span>
                                        </td>
                                        <td style="text-align: right;"><?= number_format($key['price'],2); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <?php if($totBalance['discount']==null)
                            {
                                $disp = "style='display:none'";
                                $discount = 0;
                                $discType = "";
                            }
                            else
                            {
                                $disp = "";
                                $expl = explode("_", $totBalance['discount']);
                                $discType = $expl[0];
                                $discount = $expl[1];
                            }
                            if($discType =="flat")
                            {
                                $disc = $discount;
                            }
                            else
                            {
                                $disc = $discount*$totBalance['totprice'];
                            }
                            $bl = $totBalance['totprice']-$disc;
                            $txx = $txDetails['txpercent'] * $bl;
                            $gross = $bl+$txx;
                            ?>
                            <table class="tlb text-white">
                                 <tr>
                                        <th><?= nbs(5); ?></th>
                                        <th>
                                            <?php if($totBalance['discount']==null){ ?>
                                                Do you have Coupon code ?
                                                <input type="text" id="coupon" placeholder="Apply Coupon code">
                                                <input type="submit" id="sub" class="bnt" value="Apply">
                                                <span class="msgCpn"></span>
                                            <?php }else{ ?>
                                                Discount Applied <i class="fa fa-check"></i>
                                            <?php } ?>
                                        </th>
                                        <td>Sub Tota =</td>
                                        <td style="text-align: right;"><span id="totbal"><?= number_format($totBalance['totprice'],2); ?></span></td>
                                    </tr>
                                    <tr id="disc" <?= $disp; ?>>
                                        <th><?= nbs(5); ?></th>
                                        <th></th>
                                        <td>Discount =</td>
                                        <td style="text-align: right;"><span id="disc">-<?= number_format($disc,2); ?></span></td>
                                    </tr>
                                    <tr>
                                        <th><?= nbs(5); ?></th>
                                        <th></th>
                                        <td>GST (<?= $txDetails['tax']; ?>%) =</td>
                                        <td style="text-align: right;"><span id="tax"><?= number_format($txx,2); ?></span></td>
                                    </tr>
                                    
                                    <tr>
                                        <th><?= nbs(5); ?></th>
                                        <th></th>
                                        <td>Gross Amount =</td>
                                        <td style="text-align: right;"><span id="gross"><?= number_format($gross,2); ?></span></td>
                                    </tr>
                            </table>
                            <div style="float: right;"><?= br(2); ?>
                            <a href="<?= base_url('MyCart/processCheckOut/'.$gross.'/'.$txx); ?>">
                                <button class="btn btn-light">Checkout Now</button>
                            </a>
                            </div>
                        </div>
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
                $("#sub").click(function(){
                    var totbal = "<?= $totBalance['totprice']; ?>";
                    var tax = "<?= $txx; ?>";
                    var coupon = $("#coupon").val();
                    if(coupon == "")
                    {
                        alert('Enter Valid Coupon code!');
                        return false;
                    }
                    else
                    {
                        $.post("MyCart/getCoupon",
                                {
                                    coupon: coupon
                                },
                                function(response,status)
                                {
                                    if(response == "no")
                                    {
                                        $(".msgCpn").html("Invalid Coupon code!"); 
                                    }
                                    else
                                    {
                                       location.href="";
                                    }
                                }
                        )
                    }
                });
                $(".mdl").css("cursor","pointer");
                $(".mdl").click(function(){
                    id = this.id;
                    $.post("<?= base_url('MyCart/getCartbasicPlan'); ?>",
                            {
                                id: id
                            },
                            function(response,status)
                            {
                                $("#shTbl").html(response);
                            }
                    )
                    $("#slctPlan").show(200);
                });

                $("#modClspp").click(function(){
                    $("#slctPlan").hide(200);
                });
                 $("#modClsp").click(function(){
                    $("#slctPlan").hide(200);
                });

                 $(".svbasic").click(function(){
                    
                    var favorite = [];
                    $.each($("input[name='vid_id']:checked"), function(){
                        favorite.push($(this).val());
                    });
                    var ccount = $("input[name='vid_id']:checked").length;
                    var single_vid_id = favorite.join(",");
                    if(ccount == 0)
                    {
                        alert("click on Remove to Delete All Selected Videos");
                    }
                    else
                    {
                        
                        var price = $("#price").val();
                        var totPrice = ccount*price;
                        var cat_value = ("basic_"+ccount+"_"+single_vid_id);
                        var cat_id  = single_vid_id;
                        var ids = $("#ids").val();
                        //alert(ids)
                        $.post("<?= base_url('MyCart/updateCartBasic'); ?>",
                            {
                                price: totPrice,
                                cat_value: cat_value,
                                cat_id: cat_id,
                                id: ids
                            },
                            function(response,status)
                            {
                                location.href="<?= base_url('MyCart'); ?>"
                            }
                        )
                        
                    }
                });
            });
        
        </script>
        