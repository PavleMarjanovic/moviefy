<?php


if(isset($_SESSION['user'])) :

?>
<div class="general">
    <h4 class="latest-text w3_latest_text">Quiz</h4>
    <div class="container contact-agile">
        <h3 class="hdg">What is your favorite movie genre?</h3>
        <div id="quizErrors"></div>
        <form action="" method="post">
        <ul class="list-group w3-agile">
            <?php $quiz = executeQuery("SELECT * FROM categories");
            $i = 0;
            foreach($quiz as $q) :
                ?>
            <li class="list-group-item"><input type="radio" name="quiz" id="quiz<?=$i++; ?>" value="<?= $q->category ?>"> <?= $q->category ?></li>
            <?php endforeach; ?>
            <input type="button" id="submitButton" name="submitButton" value="SUBMIT RESPONSE">
        </ul>
        </form>
        <div class="clearfix"></div>

    </div>
     <?php endif; ?>
    <?php
        $user = $_SESSION['user']->id_user;
        $userQuiz = executeQuery("SELECT * FROM quiz");
        foreach($userQuiz as $uq)
        {
            if($uq->id_user == $user)
            {
                $denied=1;
            }
            else
            {
                $denied=0;
            }
        }
        if($denied == 1) :
    ?>
    <div class="container contact-agile">
        <h3 class="hdg">Quiz results</h3>
        <div id="quizErrors"></div>
        <div class="tab-content">
            <div class="tab-pane active" id="domprogress">
                <?php $quizResults = executeQuery("SELECT DISTINCT response FROM quiz");
                foreach($quizResults as $quiz) :
                ?>
                <p><?=$quiz->response?></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary" style="width:<?php
                        $results = executeQuery("SELECT * FROM quiz");
                        $brojac = 0;
                        foreach($results as $result)
                        {
                            if($result->response == $quiz->response)
                            {
                                $brojac++;
                            }
                        }
                        $ukupnoGlasova = count($results);
                        $procenat = ($brojac/$ukupnoGlasova)*100;
                        echo $procenat;
                    ?>%"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</div>
    </div>
    <!-- Latest-tv-series -->
	
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<div id="small-dialog" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
	</div>
	<div id="small-dialog1" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/148284736"></iframe>
	</div>
	<div id="small-dialog2" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
	</div>
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
<!-- //Latest-tv-series -->