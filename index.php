<?php
session_start();
ob_start();
    include "php/connection.php";
	include "views/head.php";
	include "views/login-popup.php";
    include "views/header.php";
	include "views/nav.php";
	unset($_SESSION['regGreske']);
	unset($_SESSION['greske']);
	if(isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "home" :
                include "views/slider.php";
                include "views/slider-bottom.php";
                include "views/home-content.php";
                break;
            case "contact" :
                include "views/contact.php";
                break;
            case "all-movies" :
                if(isset($_SESSION['user']))
                {
                    include "views/movies.php";
                }
                else
                {
                    include "views/error.php";
                }
                break;
            case "watch-movie" :
                if(isset($_SESSION['user']))
                {
                    include "views/watch-movie.php";
                }
                else
                {
                    include "views/error.php";
                    break;
                }
                break;
            case "genres" :
                if(isset($_SESSION['user']))
                {
                    include "views/genres.php";
                }
                else
                {
                    include "views/error.php";
                    break;
                }
                break;
            case "admin-panel" :
                {
                    if($_SESSION['user']->role=="Administrator")
                    {
                        include "views/admin-panel.php";
                        break;
                    }
                    else
                    {
                        include "views/error.php";
                        break;
                    }
                }
            case "about" :
                {
                    include "views/about.php";
                    break;
                }
            default :
                include "views/slider.php";
                include "views/slider-bottom.php";
                include "views/home-content.php";
        }
    }
	else
    {
        include "views/slider.php";
        include "views/slider-bottom.php";
        include "views/home-content.php";
    }
	include "views/social.php";
	include "views/footer.php";
?>