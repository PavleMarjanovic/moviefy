<!-- footer -->
<div class="footer">
		<div class="container">
				<div class="clearfix"> </div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<li>
                        <?php $menus = executeQuery("SELECT * FROM menu WHERE level=1 AND id_menu<20");
                        foreach($menus as $menu) :
                        ?>
						<a href="<?= $menu->href?>"><?=$menu->name ?>   </a>
                        <?php endforeach; ?>
					</li>
                    <li>
                        <div class="w3ls_footer_grid1_left">
                            <p>All Rights Reserved 2018. Pavle Marjanovic 141/16</p>
                        </div>
                    </li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>