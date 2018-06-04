<?php 
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);
	//variable

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
	//code from file gets injected into current file, like a shortcut, to keep things clean and easier to organize
	function getInputValue($name) {
	if(isset($_POST[$name])) {
		echo $_POST[$name];
		//this function remembers fields in input txt (autoFill)
		}
	}
?>

<html>  
<head>
	<title>Welcome to Sound Spa!</title>
</head>
<body>
<div id="inputContainer">
	<form id="loginForm" action="register.php" method="POST">
		<h2>Login to your account</h2>
		<p>
			<label for="loginUserName">User Name</label>
			<input id="loginUserName" name="loginUserName" type="text" placeholder="Name" required>	
		</p>
		<p>
			<label for="loginPassword">Password</label>
			<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
		</p>
		<button type="submit" name="loginButton">LOG IN</button>
	</form>


		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your free account</h2>
			<p>
				<?php echo $account->getError(Constants::$userNameCharacters); ?>
				<label for="userName">Username</label>
				<input id="userName" name="userName" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('userName') ?>" required>
			</p>

			<p>
				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
				<label for="firstName">First name</label>
				<input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstName') ?>" required>
			</p>

			<p>
				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
				<label for="lastName">Last name</label>
				<input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('lastName') ?>" required>
			</p>

			<p>
				<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
			</p>

			<p>
				<label for="email2">Confirm email</label>
				<input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email2') ?>" required>
			</p>

			<p>
				<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
				<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
				<?php echo $account->getError(Constants::$passwordCharacters); ?>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Your password" value="<?php getInputValue('password') ?>" required>
			</p>

			<p>
				<label for="password2">Confirm password</label>
				<input id="password2" name="password2" type="password" placeholder="Your password" value="<?php getInputValue('password2') ?>" required>
			</p>

			<button type="submit" name="registerButton">SIGN UP</button>
			
		</form>




</div>
</body>
</html>