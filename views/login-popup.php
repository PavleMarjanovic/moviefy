<?php
//LOGIN
if(isset($_POST['siLogin'])){

    $siErrors = [];
    $regExpPass = "/^[\S]{5,}$/";
    $regExpUsername = "/^[a-z]{4,30}$/";

        require_once "php/connection.php";
        if(preg_match($regExpPass, $_POST['siPassword']))
        {
            $siPassword = $_POST['siPassword'];
            $siPassword = md5($siPassword);
            unset($_SESSION['greske']);
        }
        else
        {
            $siErrors[] = "Your password does not meet the requirements.";
        }
        if(preg_match($regExpUsername, $_POST['siUser']))
        {
            $siUser = $_POST['siUser'];
            unset($_SESSION['greske']);
        }
        else
        {
            $siErrors[] = "Your username must have between 4 and 30 small letters.";
        }
        $_SESSION['greske'] = $siErrors;
        try  {
        $upit = "SELECT u.id_user, u.username, u.email, u.password, r.role FROM users u INNER JOIN roles r 
              ON r.id_role = u.id_role 
              WHERE username = :username
             AND password = :password";


            $stmt = $konekcija->prepare($upit);
            $stmt->bindParam(":username", $siUser);
            $stmt->bindParam(":password", $siPassword);

            $stmt->execute();
            $user = $stmt->fetch();
            if ($user) {
                $_SESSION['user'] = $user;
                //header("Location: ?page=all-movies");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
}
?>
<?php
if(isset($_POST['rgRegister']))
{
    $regErrors = [];
    $regExpPass = "/^[\S]{5,}$/";
    $regExpUsername = "/^[a-z]{4,30}$/";
    if(preg_match($regExpUsername, $_POST['rgUser']))
    {
        $rgUser = $_POST['rgUser'];
        unset($_SESSION['regGreske']);
    }
    else
    {
        $regErrors[] = "Your username must have between 4 and 30 small letters.";
    }
    if(filter_var($_POST['rgEmail'], FILTER_VALIDATE_EMAIL))
    {
        $rgEmail = $_POST['rgEmail'];
        unset($_SESSION['regGreske']);
    }
    else
    {
        $regErrors[] = "Email does not meet standard requirements.";
    }
    if(preg_match($regExpPass, $_POST['rgPassword']))
    {
        $rgPassword = md5($_POST['rgPassword']);
        unset($_SESSION['regGreske']);
    }
    else
    {
        $regErrors[] = "Your password does not meet the requirements.";
    }

    $id = "";
    $role = 3;
    $upit = "INSERT INTO users (id_user, username, email, password, id_role) VALUES (:id, :username, :email, :password, :role)";
    $stmt = $konekcija->prepare($upit);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":username", $rgUser);
    $stmt->bindParam(":email", $rgEmail);
    $stmt->bindParam(":password", $rgPassword);
    $stmt->bindParam(":role", $role);
    try {
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        if($ex->getMessage() == "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$rgUser."' for key 'username'")
        {
            $regErrors[] = "Username already in use. Try another one";
        }
    }
    $_SESSION['regGreske'] = $regErrors;
}
?>
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Sign In & Sign Up
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Click Me</div>
							  </div>
							  <div class="form">
                                  <h3>Login to your account</h3>
								<form action="#" method="post">
								  <input type="text" name="siUser" placeholder="Username" id="siUser" required="">
								  <input type="password" name="siPassword" placeholder="Password" id="siPassword" required="">
								  <input type="submit" name="siLogin" id="siLogin" value="Login">
								</form>
							  </div>
							  <div class="form">
								<h3>Create an account</h3>
								<form action="#" method="post">
								  <input type="text" name="rgUser" placeholder="Choose username" id="rgUser" required="">
								  <input type="password" name="rgPassword" placeholder="Password" id="rgPassword" required="">
                                   <input type="password" name="rgConfirmPassword" placeholder="Confirm Password" id="rgConfirmPassword" required="">
								  <input type="email" name="rgEmail" placeholder="Email Address" id="rgEmail" required="">
								  <input type="submit" name="rgRegister" name="rgRegister" id="rgRegister" value="Register">
								</form>
							  </div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms  
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>
<!-- //bootstrap-pop-up -->