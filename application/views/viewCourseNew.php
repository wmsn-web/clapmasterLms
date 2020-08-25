<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$aws_server = $this->SiteModel->aws_server();
?><!doctype html>
<html lang="en">
  	<head>
    	<title>Course -Master Clap</title>
    	<?php include('inc/layout.php'); ?>  
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
			<section class="hero_area themeColor"> 
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="courses_offered">
                            <h4>Levels Offered</h4>
                            <?php if(!empty($menuData)){ ?>
                                <?php foreach($menuData['chapData'] as $menu){ ?>
                                     <a id="chap_<?= $menu['id']; ?>" class="getChap" href="javascript:void(0)"><?= $menu['chapName']; ?><i class="fa fa-angle-right"></i></a>
                                <?php } ?>
                            <?php } ?>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero_middle">
                            <h4 class="text-white">Course Name: <?= $menuData['course_name']; ?> <span class="cpName"><?= $menuData['previewData']['chap_name']; ?></span></h4>
                            <div id="vidCntrl">
                                <?php if($menuData['previewData']['preview_type'] == "file"){ ?>
                                    <video autoplay="on" poster="<?= base_url('uploads/videos/'.$menuData['previewData']['thumb']); ?>" controlsList="nodownload" oncontextmenu="return false;" controls >
                                        <source src="<?= $aws_server['serverUrl'].$aws_server['folders'].$menuData['previewData']['preview']; ?>"  type="video/mp4">
                                        Your browser does not support HTML video.
                                    </video>
                                <?php }else{  ?>
                                    <iframe width='100%' height='315' src='https://www.youtube.com/embed/<?= $menuData['previewData']['preview_link']; ?>/?rel=0&showinfo=0'></iframe>
                                <?php } ?>
                            </div>
                            <div class="course_about">
                                <h2>About Course</h2>
                                <p><?= $menuData['descr']; ?></p>
                                <div id="btm-thmb" class="row">
                                    <?php foreach($menuData['vidData'] as $vidData ){ ?>
                                    <div class="col-md-3" style="margin-bottom: 10px">
                                        <div style="background: url('<?= base_url('uploads/videos/'.$vidData['thumb']); ?>'); background-size: cover;" class="vid-box">
                                            <i class="fas fa-play"></i>
                                        </div>
                                        <span class="text-white"><?= $vidData['title']; ?>
                                        </span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="price_section">
                            <div id="priccing">
                                <table class="priceTable prtable">
                                       <tr>
                                            <th style="width: 40%">
                                                <label class="container">Episodes
                                                  <input id="sng" type="radio" name="price" value="basic_<?= $menuData['previewData']['snglnowprice']; ?>">
                                                  <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            <th style="width: 48%">
                                                <span><del id="snglprice">&#8377;<?= $menuData['previewData']['snglprice']; ?></del> <i id="cp1" class="fa fa-info-circle cp" aria-hidden="true"></i></span>
                                                <div id="singl" class="info">
                                                    Episode Plan: Allows to watch single video of this level.
                                                </div>
                                            </th>
                                            <th style="width: 12%">
                                                <span id="snglnowprice" class="txt-13 fw-600">&#8377;<?= $menuData['previewData']['snglnowprice']; ?></span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="width: 40%">
                                                <label class="container">Level Plan
                                                  <input id="lv" type="radio" name="price" checked="checked" value="level_<?= $menuData['previewData']['lvlnowprice']; ?>">
                                                  <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            <th style="width: 48%">
                                                <span><del id="lvlprice">&#8377;<?= $menuData['previewData']['lvlprice']; ?></del></span>  <i id="cp2" class="fa fa-info-circle cp" aria-hidden="true"></i></span>
                                                <div id="lvl" class="info">
                                                    Level Plan: Allows to watch All videos of this level.
                                                    Purchase Full level pay for 7 videos and get 10 videos.
                                                </div>
                                            </th>
                                            <th style="width: 12%">
                                                <span id="lvlnowprice" class="txt-13 fw-600">&#8377;<?= $menuData['previewData']['lvlnowprice']; ?></span>
                                            </th>
                                        </tr>
                                        
                                        <tr>
                                            <th style="width: 40%">
                                                
                                                <label class="container">Course Plan
                                                  <input id="cr" type="radio" name="price" value="cours_<?= $menuData['previewData']['crsnowprice']; ?>">
                                                  <span class="checkmark"></span>
                                                </label>
                                            </th>
                                            <th style="width: 48%">
                                                <span><del id="crsprice">&#8377;<?= $menuData['previewData']['crsprice']; ?></del></span>   <i id="cp3" class="fa fa-info-circle cp" aria-hidden="true"></i></span>
                                                <div id="crs" class="info">
                                                    Course Plan: It covers with all level's Videos. Get and enjoy with Full course Plan.
                                                </div>
                                            </th>
                                            <th style="width: 12%">
                                                <span id="crsnowprice" class="txt-13 fw-600">&#8377;<?= $menuData['previewData']['crsnowprice']; ?></span>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            <div class="btn-group" role="group">
                                <?php if(!$this->session->userdata("ClientId")){ ?>
                                    <a class="boxed_btn " href="#"  data-toggle="modal" data-target="#modal2">Add to Cart</a>
                                    <a class="boxed_btn active" href="#"  data-toggle="modal" data-target="#modal2">Buy Now</a>
                                    
                                <?php }else{ ?>
                                    <button class="btn btn-grey " id="adcart" href="javascript:void(0)">Add to Cart</button>
                                    
                                <?php } ?>
                            </div>
                        </div>
                        <div class="author_card">
                            <h3 id="chapName"><?= $menuData['previewData']['chap_name']; ?></h3>
                            <p>Find your unique voice naturally, while having FUN doing it! A modern approach to singing
                                lessons & vocal training.Find your unique voice naturally, while having FUN doing it!</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service_details_area section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="common_block common_block_2">
                            <h2 class="heading">
                                What you'll learn
                            </h2>
                            <div class="what_learns">
                                <?= html_entity_decode($extData['howtolearn']['what_learn']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="course_summery">
                            <h5>This course includes:</h5>
                            <?php 
                            $incll = $extData['incldt'];
                            $expl = explode(",", $incll);
                            foreach($expl as $incl): ?>
                                <p><i class="fas fa-check"></i> <?= $incl; ?></p>
                            <?php endforeach; ?>
                        </div>
                        <div class="accordion_wrapper_2 ">
                            <h3 class="text-center pt-3">FAQ</h3>
                            <div class="accordion" id="accordion2">
                                <?php if(!empty($extData['faq'])): ?> 
                                    <?php $s = 1; foreach($extData['faq'] as $faq): $ss = $s++; ?>
                                        <div class="card">
                                            <div class="card-header" id="heading21">
                                                <button class="btn-link " type="button" data-toggle="collapse"
                                                    data-target="#collapse<?= $ss; ?>" aria-expanded="true" aria-controls="collapse21">
                                                    <?= $faq['qstion']; ?>
                                                </button>
                                            </div>
                                            <div id="collapse<?= $ss; ?>" class="collapse" aria-labelledby="heading21"
                                                data-parent="#accordion2">
                                                <div class="card-body">
                                                    <p class="text-dark">
                                                    <?= $faq['answr']; ?></p> 
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedbackArea">
            <div class="container">
                <div class="feedbackContainer">
                    <h2>Feedback</h2>
                    <div class="row">
                <?php 
                    //$this->db->distinct();
                    //$this->db->select("user_id");
                    $crsId = $this->uri->segment(3);
                    $this->db->where("crs_id",$crsId);
                    $this->db->order_by("id","DESC");
                    $getReviews = $this->db->get("video_likes");
                    if($getReviews->num_rows()==0)
                    {
                        $dataReview = array();
                    }
                    else
                    {
                        $row = $getReviews->result();
                        foreach ($row as $keyR) {
                        $this->db->where("id",$keyR->user_id);
                        $getUser = $this->db->get("users_profile")->row();
                           $dataReview[] = array
                                                (
                                                    "user_id"=>$keyR->user_id,
                                                    "name"=>$getUser->name,
                                                    "comments"=>$keyR->comments,
                                                    "dates"=>$keyR->date
                                                );
                        }
                        
                    }
                ?>
                <?php if(!empty($dataReview)){ ?>
                    <?php foreach($dataReview as $rev){
                        $expl = explode(" ",$rev['name']);
                        $fl = substr(@$expl[0], 0,1);
                        $ll = substr(@$expl[1], 0,1);
                        $dt = date_create($rev['dates']);
                        $newDate = date_format($dt,'F')." ".date_format($dt,'d').", ".date_format($dt,'Y');
                     ?>
                     <?php /*
                    <div class="singleFeedbackBox">
                        <div class="feedProfile">
                            <div class="feedImgDiv"><?= strtoupper($fl.$ll); ?></div>
                            <div class="feedUser">
                                <a href="#" class="name"><?= $rev['name']; ?></a>
                                <span><?= $newDate; ?></span>
                            </div>
                        </div> <!-- /.feedProfile -->
                        <ul class="rating">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p><?= $rev['comments']; ?></p>
                        <div class="likeFeed">
                            
                        </div>
                    </div> <!-- /.singleFeedbackBox -->
                     <!-- /.singleFeedbackBox -->
                 
                 */ ?>

                 <div class="col-md-6 mb-3">
                             <div class="card  ht-320">
                                 <div class="card-body">
                                     <div class="feedProfile">
                                        <div class="feedImgDiv"><?= strtoupper($fl.$ll); ?></div>
                                        <div class="feedUser">
                                            <a href="#" class="name"><?= $rev['name']; ?></a>
                                            <ul class="rating">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <span><?= $newDate; ?></span>
                                        </div>
                                    </div> <!-- /.feedProfile -->
                                    <p><?= $rev['comments']; ?></p>
                                 </div>
                             </div>
                         </div>
                 <?php } ?>
                 <?php } ?>
                     
                        
                     </div>
                </div> <!-- /.feedbackContainer -->
            </div>
           
        </section>
        <?php include("inc/popHandler.php"); ?>
    <input type="hidden" id="single_cat" name="single_cat" value="level_1_<?= $menuData['previewData']['chapId']; ?>">
    <input type="hidden" id="orderid" name="orderid" value="<?= 'ord_'.mt_rand(00000000,99999999); ?>">
    <?php if($this->session->userdata("ClientId")){ ?>
        <input type="hidden" id="cartnum" value="<?= $getCart; ?>">
    <?php } ?>
		<?php include('inc/footer.php'); ?> 
		</div>
		<?php include('inc/modal.php'); ?>
		<?php include('inc/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                
                $("#collapse1").addClass("show");
                $(".getChap").click(function(){
                    $("#btm-thmb").html("");
                    $("#vidTable").html("");
                    $("#adcart").removeAttr("onclick");
                    $("#adcart").html("Add to Cart");
                    var ids = this.id;
                    var spl = ids.split("_");
                    var id = spl[1];
                    
                    $.post("<?= base_url('Course/getChapdtls'); ?>",
                            {
                                id: id
                            },
                            function(response,status)
                            {
                                //alert(response);
                                
                                var obj = JSON.parse(response);
                                var vidType = obj.previewData.preview_type;
                                if(vidType == "file")
                                {
                                    var thumbUrl = "<?= base_url('uploads/videos/'); ?>"+obj.previewData.thumb;
                                var prevUrl = "<?= "https://goibooking.in/uploads/videos/" ?>"+obj.previewData.preview;
                                var video = "<video autoplay='on' poster='"+thumbUrl+"' controlsList='nodownload' oncontextmenu='return false;' ><source src='"+prevUrl+"'   type='video/mp4'>Your browser does not support HTML video.</video>"
                                }
                                else
                                {
                                    var video = "<iframe id='yt' width='100%' height='315' src='https://www.youtube.com/embed/"+obj.previewData.preview_link+"/?rel=0&showinfo=0&controller=0'></iframe>";
                                }
                                
                                $("#vidCntrl").html(video);
                                $("#chapName").html(obj.previewData.chap_name);
                                $(".cpName").html(obj.previewData.chap_name);

                                $("#snglprice").html("&#8377;"+obj.previewData.snglprice);
                                $("#sngldiscount").html(obj.previewData.sngldiscount+"% off");
                                $("#snglnowprice").html("&#8377;"+obj.previewData.snglnowprice);

                                $("#lvlprice").html("&#8377;"+obj.previewData.lvlprice);
                                $("#lvldiscount").html(obj.previewData.lvldiscount+"% off");
                                $("#lvlnowprice").html("&#8377;"+obj.previewData.lvlnowprice);

                                $("#crsprice").html("&#8377;"+obj.previewData.crsprice);
                                $("#crsdiscount").html(obj.previewData.crsdiscount+"% off");
                                $("#crsnowprice").html("&#8377;"+obj.previewData.crsnowprice);

                                $("#sng").val("basic_"+obj.previewData.snglnowprice);
                                $("#lv").val("level_"+obj.previewData.lvlnowprice);
                                $("#cr").val("cours_"+obj.previewData.crsnowprice);
                                $("#single_cat").val("level_1_"+obj.previewData.chapId)

                                $.each(obj.vidData, function(key, value) {
                                    var appnd = "<tr><td><label class='container'><input type='checkbox' name='vid_id' onclick='vidIdfunc("+value.vid_id+")' value='"+value.vid_id+"'><span class='checkmark'></span></label></td><td><div class='row'><div class='col-md-3'><div style='background:url(<?= base_url('uploads/videos/'); ?>"+value.thumb+"); background-size: cover;' class='vid-box'><i class='fas fa-play'></i></div></div><div class='col-md-9'><div class='vidText'><h5><a  class='text-primary' >"+value.title+"</a></h5><p>"+value.descr+"<br><span><i class='fas fa-eye'></i> 50K <?= nbs(4); ?><i class='fas fa-thumbs-up'></i> 30K <?= nbs(4); ?><i class='fas fa-thumbs-down'></i> 30K</span></p></div></div></div></td></tr>";
                                    var btmmTmb = "<div class='col-md-3' style='margin-bottom: 10px'><div style='background: url(<?= base_url('uploads/videos/'); ?>"+value.thumb+"); ?>); background-size: cover;' class='vid-box'><i class='fas fa-play'></i></div><span class='text-white'>"+value.title+" <i title='"+value.descr+"' class='fa fa-info-circle'></i></span></div>";
                                  $("#vidTable").append(appnd);
                                  $("#btm-thmb").append(btmmTmb);
                                  //alert(value.vid_id);
                                });
                                //alert(thumbUrl);
                                
                            }
                        )
                });
                //Price checkbox click modal show
                $("#myBtn").click(function(){
                    $("#newModal").show();
                });
                $("#cp1").hover(function(){
                    $("#singl").toggle(200);
                });
                $("#cp2").hover(function(){
                    $("#lvl").toggle(200);
                });
                $("#cp3").hover(function(){
                    $("#crs").toggle(200);
                });
                /*===================================*/
                //Modal Close fucntions
                $("#modCls").click(function(){
                    $("#modal1").hide(200);
                });
                 $("#modCls2").click(function(){
                    $("#modal1").hide(200);
                });
                 /*====================================*/
                $("input[name='price']").click(function(){
                    var inpval = this.value;
                    var spl = inpval.split("_");
                    var pln = spl[0];
                    if(pln == "basic")
                    {
                        $("#modal1").show(200);
                        $("#single_cat").val("");
                    }
                    else if(pln == "level")
                    {
                        $("#modal5").show(200);
                        $("#single_cat").val("level_1_<?= $menuData['previewData']['chapId']; ?>");
                    }
                    else if(pln == "cours")
                    {
                         $("#modal6").show(200);
                        $("#single_cat").val("course_1_<?= $menuData['previewData']['crsId']; ?>");
                    }
                });

                $(".svbasic").click(function(){
                    var radioValue = $("input[name='price']:checked").val();
                    var favorite = [];
                    $.each($("input[name='vid_id']:checked"), function(){
                        favorite.push($(this).val());
                    });
                    var ccount = $("input[name='vid_id']:checked").length;
                    var single_vid_id = favorite.join(",");
                    if(ccount == 0)
                    {
                        $("#single_cat").val("");
                    }
                    else
                    {
                        var spl2 = radioValue.split("_");
                        var price = spl2[1];
                        var totPrice = ccount*price;
                        $("#single_cat").val("basic_"+ccount+"_"+single_vid_id);
                        $("#snglnowprice").html("&#8377;"+totPrice);
                    }
                });

                $("#adcart").click(function(){
                    var radioValue = $("input[name='price']:checked").val();
                    var single_cat = $("#single_cat").val();
                    var chapName = $("#chapName").html();
                    var crsName = "<?= $menuData['course_name']; ?>";
                    if(single_cat == "")
                    {
                        alert('Select a Plan Properly!')
                    }
                    else
                    {
                        var spl = single_cat.split("_");
                        var category = spl[0];
                        var ccnt = spl[1]
                        var cat_value = spl[2];
                        

                        var spl2 = radioValue.split("_");
                        var plan = spl2[0];
                        var price = spl2[1];
                        var orderid =  $("#orderid").val();
                        var totPrice = ccnt*price;
                        
                        $.post("<?= base_url('Course/setCart'); ?>",
                                {
                                    course_name: crsName,
                                    chapName: chapName,
                                    category: category,
                                    cat_value: cat_value,
                                    plan: plan,
                                    price: totPrice,
                                    orderid: orderid,
                                    catValue: single_cat
                                },
                                function(response,status)
                                {

                                    if(response == "succ")
                                    {
                                        $("#adcart").html("View Cart");
                                        $("#adcart").attr("onclick","viewCart()")
                                        var cartnum = $("#cartnum").val();
                                        var bltt = parseInt(cartnum)+1;
                                        $(".bullet").show();
                                        $(".bullet").html(bltt);
                                        $("#cartOrder").val(orderid);
                                        $("#buyNowBtn").attr("disabled",false);
                                        alert("you have selected" + crsName);
                                        
                                    }
                                    else
                                    {
                                        alert("Already Added to Cart!");
                                        $("#adcart").html("View Cart");
                                        $("#adcart").attr("onclick","viewCart()")
                                    }
                                    //alert(bltt)
                                }
                        ) 
                    }
            });
                
        });

function viewCart()
        {
            location.href="<?= base_url('MyCart'); ?>";
        }
        </script>
        