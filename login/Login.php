<!DOCTYPE html>

<?php

	include 'LoginSecurity.php';

	$document = new DOMDocument();
	$document->loadHTML("Login.php");
	$document->validate();
	$errorMessagePosition = $document->getElementById("error-message");
	$errorMessagePosition->setAttribute("display", "none");

	if (isset($_SESSION)) {
		session_destroy();
		$_SESSION = array();
		setcookie();
	}

	if (isset($_POST["login"])) {
		if (login($_POST["user-name"], $_POST["password"])) {
			session_start();
			header("Location: ../main/ProductsPage.html");
			exit();
		} else {
			$errorMessagePosition.setAttribute("display", "inline");
		}
	}

?>

<html lang="en">
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="LoginStyle.css">
    <title>Inventory System: Login</title>

<head></head>
<body>

	<div id="headline">
		<p><strong> Welcome to your Inventory System! </strong> <br>
			Login below to enter your dashboard.
		</p>
	</div>

	<div id=login-form>
		<div id=form-position>
			<div id=error-message>
				"There is an issue with your username and/ or password."
			</div>
			<form id="login" method="post" action="">
				User Name: <br>
				<input type="text" name="user-name" placeholder="user name here!"> <br> <br>
				Password: <br>
				<input type="text" name="password" placeholder="password here!"> <br> <br>
				<button type="submit" name="login">Login</button>
			</form>
		</div>
	</div>

	<div id="footer">
		<p style="font-size: 0.9rem;font-style: italic;"><a href="https://www.flickr.com/photos/146513039@N06/33820306178">"White painted brick wall - seamless texture"</a><span>by <a href="https://www.flickr.com/photos/146513039@N06">Tiling Textures</a></span> is licensed under <a href="https://creativecommons.org/licenses/by/2.0/?ref=ccsearch&atype=html" style="margin-right: 5px;">CC BY 2.0</a><a href="https://creativecommons.org/licenses/by/2.0/?ref=ccsearch&atype=html" target="_blank" rel="noopener noreferrer" style="display: inline-block;white-space: none;opacity: .7;margin-top: 2px;margin-left: 3px;height: 22px !important;"><img style="height: inherit;margin-right: 3px;display: inline-block;" src="https://search.creativecommons.org/static/img/cc_icon.svg" /><img style="height: inherit;margin-right: 3px;display: inline-block;" src="https://search.creativecommons.org/static/img/cc-by_icon.svg" /></a></p>
	</div>
</body>
</html>