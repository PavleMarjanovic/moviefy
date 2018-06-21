<div class="movie-browse-agile">
					     <!--/browse-agile-w3ls -->
                        
                         
                         <div class="browse-agile-w3ls general-w3ls">
								<div class="tittle-head">
                                </br>
									<h4 class="latest-text">Movies </h4>
									<div class="container">
										<div class="agileits-single-top">
											<ol class="breadcrumb">
											  <li><a href="index.php?page=home">Home</a></li>
											  <li class="active">All Movies</li>
											</ol>
										</div>
									</div>
								</div>
								     <div class="container">
							<div class="browse-inner">
                            <?php
                            $limit = 12;
                            if(isset($_GET['number']))
                            {
                                $number = $_GET['number'];
                                $offset = $limit * $number;
                            }
                            else
                            {
                                $number = 0;
                                $offset = 0;
                            }
                            $movies = executeQuery("SELECT * FROM movies m INNER JOIN categories c ON m.id_category = c.id_category ORDER BY m.rating DESC LIMIT $offset, $limit");
                            foreach($movies as $movie): ?>
							   <div class="col-md-2 w3l-movie-gride-agile">
                               
										 <a href="index.php?page=watch-movie&movie-id=<?= $movie->id_movie ?>" class="hvr-shutter-out-horizontal"><img src="<?=$movie->image?>" title="<?=$movie->name ?>" alt="<?=$movie->name ?>" />
									     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									  <div class="mid-1">
										<div class="w3l-movie-text">
											<h6><a href="#"><?=$movie->name ?></a></h6>							
										</div>
										<div class="mid-2">
										
											<p><?=$movie->year ?></p>
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
                                            <br/>
                                            <p><?=$movie->category ?></p>
											<div class="clearfix"></div>
										</div>
											
									</div>
                                    <?php if($movie->ribbon == 1)
                                            {
                                                echo "<div class='ribben two'>
										        <p>NEW</p>
                                                </div>";
                                            }
                                    ?>
									</div>
                                    <?php endforeach; ?>
								<div class="clearfix"> </div>
                                </div>
        	
				<!--//browse-agile-w3ls -->
						<div class="blog-pagenat-wthree">
                            <ul>
                                <?php $brojac = executeQuery("SELECT COUNT(name) AS brojac FROM movies");
                                foreach($brojac as $broj)
                                {
                                    $variable = $broj->brojac;
                                }
                                ?>
								<li><a class="first" href="index.php?page=all-movies">First Page</a></li>
                                <?php
                                global $variable;
                                $pagination = $variable/12;
                                for($i=1; $i<$pagination; $i++) : ?>
                                    <li><a href="index.php?page=all-movies&number=<?=$i?>"><?=$i+1 ?></a></li>
                                <?php endfor; ?>
								<li><a class="last" href="index.php?page=all-movies&number=<?php
                                    if($_GET['number']+1<=$pagination)
                                    {
                                        echo $_GET['number']+1;
                                    }
                                    ?>">Next Page</a></li>
							</ul>
						</div>
					</div>