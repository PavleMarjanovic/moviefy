<?php
if(isset($_POST['contactSubmit']))
{
        $text = $_POST['text'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];

        if(mail("admin@moviefy.ml","MOVIEFY CONTACT FORM: Message from ".$email,"Message: ".$text, "From:$email"))
        {
            http_response_code(200);
            $success = array();
            array_push($success, "Ok");
            echo json_encode($success);
        }
        else
        {
            http_response_code(400);
        }
    }
?>
<div class="contact-agile">
		<div id="map"></div>
        <?= $text.$email ?>
		<div class="faq">
			<h4 class="latest-text w3_latest_text">Contact Us</h4>
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Address</h3>
					<h4>Knez Mihailova 3,</h4>
					<h4>Belgrade,</h4>
					<h4>Serbia.</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Call Us</h3>
					<h4>+38169112354</h4>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>Email</h3>
					<h4><a href="mailto:info@example.com">admin@moviefy.eu5.net</a></h4>
					<h4><a href="mailto:info@example.com">pavle@moviefy.eu5.net</a></h4>
				</div>
				<div class="col-md-3 social-w3l">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>Social media</h3>
					<ul>
						<li><a href="http://www.facebook.com/marjanovic23"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
						<li class="twt"><a href="http://www.twitter.com/PaulMarjanovic"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
						<li class="ggp"><a href="http://www.instagram.com/23pavle"><i class="fa fa-instagram" aria-hidden="true"></i><span class="text">Instagram</span></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
                <div id="errors"></div>
				<form action="" method="post">
					<input type="text" name="firstName" id="firstName" placeholder="FIRST NAME" required="">
					<input type="text" name="lastName" id="lastName" placeholder="LAST NAME" required="">
					<input type="text" name="email" id="email" placeholder="EMAIL" required="">
					<input type="text" name="subject" id="subject" placeholder="SUBJECT" required="">
					<textarea  name="taMessage" id="taMessage" placeholder="YOUR MESSAGE" required=""></textarea>
					<input type="button" id="contactSubmit" name="contactSubmit" value="SEND MESSAGE">
				</form>
			</div>
		</div>
	</div>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>        
			<script type="text/javascript">
				google.maps.event.addDomListener(window, 'load', init);
				function init() {
					var mapOptions = {
						zoom: 11,
						center: new google.maps.LatLng(44.8254390, 20.4489216),
						styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
					};
					var mapElement = document.getElementById('map');
					var map = new google.maps.Map(mapElement, mapOptions);
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(40.6700, -73.9400),
						map: map,
					});
				}
			</script>