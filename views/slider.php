
<div id="slidey" style="display:none;">
		<ul>
            <?php
            $slider = executeQuery("SELECT * FROM slider");
            foreach($slider as $slide): ?>
			<li><img src="<?= $slide->src ?>" alt=" <?= $slide->title ?> "><p class='title'><?= $slide->title ?></p><p class='description'> <?= $slide->description ?></p></li>
		    <?php endforeach; ?>
        </ul>
    </div>
    <script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
		</script>