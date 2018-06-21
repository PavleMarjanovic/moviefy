<?php if(isset($_GET['movie-id'])) : ?>
<script src="js/simplePlayer.js"></script>
<script>
    $("document").ready(function() {
        $("#video").simplePlayer();
    });
</script>
<?php
    $watchMovies = executeQuery("SELECT * FROM movies m INNER JOIN categories c ON m.id_category = c.id_category");
?>
<div class="single-page-agile-main">
    <div class="container">
        <div class="agileits-single-top">
            <ol class="breadcrumb">
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=<?php foreach($watchMovies as $watch)
                    {
                        if($_GET['movie-id'] == $watch->id_movie)
                        {
                            echo "genres&genre=".$watch->category;
                        }
                    }
                    ?>"><?php foreach($watchMovies as $watch)
                        {
                            if($_GET['movie-id'] == $watch->id_movie)
                            {
                                echo $watch->category." Movies";
                            }
                        }
                        ?></a></li>
                <li class="active"><?php foreach($watchMovies as $watch)
                    {
                        if($_GET['movie-id'] == $watch->id_movie)
                        {
                            echo $watch->name;
                        }
                    }
                    ?></li>
            </ol>
        </div>
        <div class="single-page-agile-info">
            <div class="show-top-grids-w3lagile">
                <div class="col-sm-8 single-left">
                    <div class="song">
                        <div class="song-info">
                            <h3><?php foreach($watchMovies as $watch)
                                {
                                    if($_GET['movie-id'] == $watch->id_movie)
                                    {
                                        echo $watch->name;
                                    }
                                }
                                ?></h3>
                        </div>
                        <div class="video-grid-single-page-agileits">
                            <div data-video="<?php foreach($watchMovies as $watch)
                            {
                                if($_GET['movie-id'] == $watch->id_movie)
                                {
                                    echo $watch->link;
                                }
                            }
                            ?>" id="video"> <img src="<?php foreach($watchMovies as $watch)
                                {
                                    if($_GET['movie-id'] == $watch->id_movie)
                                    {
                                        echo $watch->image;
                                    }
                                }
                                ?>" alt="<?php foreach($watchMovies as $watch)
                                {
                                    if($_GET['movie-id'] == $watch->id_movie)
                                    {
                                        echo $watch->name;
                                    }
                                }
                                ?>" class="img-responsive" /> </div>
                                <?php foreach($watchMovies as $watch)
                                {
                                    if($_GET['movie-id'] == $watch->id_movie)
                                    {
                                        echo $watch->year;
                                    }
                                }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>