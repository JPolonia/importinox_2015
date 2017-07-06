<?php $page='home';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'template/header.html';?>
	<link rel="stylesheet" href="css/default-skin/photoswipe_home.css"> 
	    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="css/owl.carousel.css">
     
</head>
<body class="off">
	<div class="wrapbox" >

		<!-- TOP AREA -->
		<?php include 'template/toparea.html';?>

		<!-- NAV -->
		<?php include 'template/nav.html';?>

		<!-- CAROUSEL -->
		<?php include 'content/home_1_carousel.html';?>
		
		<!-- WRAPSEMIBOX -->
		<div class="wrapsemibox">

			<!-- SEMIBOXSHADOW -->
			<?php include 'template/semiboxshadow.html';?>

			<!-- INTRO NOTE -->
			<?php include 'content/home_2_note.html';?>

			<!-- INTRO BOXES -->
			<?php include 'content/home_3_boxes.html';?>

			<!-- INTRO GAMA -->
			<?php/* include 'content/home_4_intro_gama.html';*/?>
			
			<!-- INTRO SERVICES -->
			<?php include 'content/home_5_services.html';?>

			<!-- INTRO APPLICATIONS -->
			<?php include 'content/home_6_applications.html';?>
		</div>

		<!-- BEGIN FOOTER -->
		<?php include 'template/footer.html';?>
	</div>

	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<?php include 'template/photoswipe.html';?>

	<!-- SCRIPTS - GERAL -->
	<?php include 'template/scripts.html';?>

	<!-- SCRIPTS - HOME -->
	<script src="js/home.js"></script>
	<!-- Include owl carousel plugin -->
    <script src="js/owl.carousel.js"></script>
    <script>
	    $(document).ready(function() {
	    	$('.owl-carousel').owlCarousel({
			    items:1,
			    margin:0,
			    loop:true,
                
			});  
		});

		var windowWidth = $(window).width();
    	$('#owl-cont').css({'width':windowWidth});
    	$('#owl-demo').css({'width':windowWidth});
    	$('#owl-demo .item').css({'width':windowWidth});

    	// Listen for orientation changes
		window.addEventListener("orientationchange", function() {
		  // Announce the new orientation number
		  //alert(window.orientation);
		  var windowWidth = $(window).width();
	    	$('#owl-cont').css({'width':windowWidth});
	    	$('#owl-demo').css({'width':windowWidth});
	    	$('#owl-demo .item').css({'width':windowWidth});
		}, false);
	</script>
</body>
</html>