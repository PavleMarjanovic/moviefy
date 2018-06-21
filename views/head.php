<!DOCTYPE html>
<html lang="en">
<head>
<title>Moviefy | <?php
    if(isset($_GET['page']))
    {
        echo strtoupper($_GET['page']);
    }
    else {
        echo "HOME";
    } ?></title>
<!-- for-mobile-apps -->
<link rel="icon" href="../favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Movies Online Streaming Web Service OnlineMovies Moviefy" />
<meta name="author" content="Pavle Marjanovic" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<link href="css/jquery.slidey.min.css" rel="stylesheet">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
	 
		});
	 
	}); 
</script>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
    <?php if($_GET['page']=="home"): ?><script src="js/script.js"></script><?php endif; ?>
    <?php if($_GET['page']=="contact"): ?><script src="js/contact.js"></script><?php endif; ?>
    <script src="js/ajax.js"></script>
    <script src="js/quizAjax.js"></script>

</head>