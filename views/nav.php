<!-- nav -->
<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
                            <?php
                            $menus = executeQuery("SELECT * FROM menu WHERE level = 1 AND id_menu < 20");
                            foreach($menus as $menu): ?>
                            <li><a href="<?= $menu->href ?>"><?= $menu->name ?></a></li>
                            <?php endforeach; ?>
                            <?php if(isset($_SESSION['user']))
                            {
                                include "login-genres-nav.php";
                            }
                            if($_SESSION['user']->role==="Administrator")
                            {
                                echo "<li><a href='index.php?page=admin-panel'>Admin CP</a></li>";
                            }
                            ?>
						</ul>
					</nav>
				</div>
			</nav>	
		</div>
	</div>
<!-- //nav -->