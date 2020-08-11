<!--  JavaScript -->
	
	<!-- JQuery -->
	<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<!-- BootStart Poper -->
	<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
	<!-- BootStart Poper -->
	<script src="<?= base_url('assets/js/bootstrap.v4.3.1.min.js'); ?>"></script>
	<!-- OwlCarosel -->
	<script src="<?= base_url('assets/js/owl.carousel.min.js'); ?>"></script>
	<!-- Animated Wow -->
	<script src="<?= base_url('assets/js/wow.min.js'); ?>"></script>
    <!-- counterup JS -->
    <script src="<?= base_url('assets/js/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.counterup.min.js'); ?>"></script>
    <!-- Rating js-->
        <script src="<?= base_url(); ?>assets/plugins/rating/jquery.rating-stars.js"></script>

        <!-- Rating js-->
        <script src="<?= base_url(); ?>assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/rating/jquery.barrating.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/rating/ratings.js"></script>

        <!-- Rating js-->
        <script src="<?= base_url(); ?>assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/rating/jquery.barrating.js"></script>

	<!-- Custome -->
	<script src="<?= base_url('assets/js/active.js'); ?>"></script>
	<script>
        $(document).ready(function(){
            $(".dropbtn2").click(function(){
                $(".dropdown-content2").toggle(200);
            });

            $("#mobmn").click(function(){
                $("#mySidenav").toggleClass("sdmenu2");
                $("#icn").toggleClass("fa-times");
            });
            $("#mMenu").click(function(){
                $(".desk-menu").show(300);
            });
            $(".menuClose").click(function(){
                $(".desk-menu").hide(300);
            });

            $(".cat-title").click(function(){
                var id = this.id;
                $.post("<?= base_url('MenuController/getVids'); ?>", 
                        {
                            id: id
                        },
                        function(response,status)
                        {
                            $(".box-content").html(response); 
                        }
                    )

                
            });



        });

        function newfunction(val)
        {
             //$("#showCased").html("hello");
            $.post("<?= base_url('MenuController/getPreview'); ?>",
             {
                id : val
             },
             function(response,status)
             {
                //Show case
                $(".box-content").html(response);
                //alert("response");
             }
            )
        }

</script>