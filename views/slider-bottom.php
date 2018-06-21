<div class="banner-bottom">
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
                    <?php
                    $movies = executeQuery("SELECT * FROM movies");
                    foreach($movies as $movie): ?>
                    <div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="index.php?page=watch-movie&movie-id=<?= $movie->id_movie ?>" class="hvr-shutter-out-horizontal"><img src="<?=$movie->image ?>" title="album-name" class="img-responsive" alt="<?=$movie->name ?> " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="#"><?=$movie->name ?></a></h6>
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p><?= $movie->year ?></p>
									<div class="block-stars">
										<ul class="w3l-ratings">
                                            <?php
                                            if($movie->rating == 1)
                                            {
                                                echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
                                            }
                                            if($movie->rating == 2)
                                            {
                                                echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
                                            }
                                            if($movie->rating == 3)
                                            {
                                                echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
                                            }
                                            if($movie->rating == 4)
                                            {
                                                echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
                                            }
                                            if($movie->rating == 5)
                                            {
                                                echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>
                                                        <li><i class='fa fa-star' aria-hidden='true'></i></li>";
                                            }
                                            ?>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
                    <?php endforeach; ?>
				</div>
			</div>			
		</div>
	</div>