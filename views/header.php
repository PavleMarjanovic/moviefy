<body>
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="index.php?page=home"><h1>Movie<span>Fy</span></h1></a>
			</div>
			<div class="w3_search">
			</div>
			<div class="w3l_sign_in_register">
				<ul><?php
                    if(isset($_SESSION['user']))
                    {
                        echo "<li><a href='php/logout.php'>Logout</a></li>";
                        $username = $_SESSION['user']->username;
                        echo "<li>Hello, <b>$username</b></li>";
                    }
                    else
                    {
                        echo "<li><a href='#' data-toggle='modal' data-target='#myModal'>Login</a></li>";
                        if(isset($_POST['siLogin']))
                        {
                            echo "<li>Wrong username or password! Try again!</li>";
                            $greske = $_SESSION['greske'];
                            foreach($greske as $greska)
                            {
                                echo "<li>".$greska."</li>";
                            }
                        }
                    }
                    if(isset($_SESSION['regGreske']))
                    {
                        $regGreske = $_SESSION['regGreske'];
                        foreach($regGreske as $regGreska)
                        {
                            echo "<li>".$regGreska."</li>";
                        }
                    }
                    else
                    {
                        unset($_SESSION['regGreske']);
                    }
                    ?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>