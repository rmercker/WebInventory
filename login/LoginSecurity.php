<?php
	if (basename($_SERVER["PHP_SELF"]) == "LoginSecurity.php") {
		Header("Location: ./Login.php");
		exit();
	}

	require '../database_interface/Database.php';

	function login($name, $password) {

		if ($name == null || $password == null) return false;
		
		$hashword = getUserHashword($name);
		if ($hashword == null) return false;

		return password_verify($password, $hashword);
	}

	function logout($token) {
		// removes user from logged in table
		removeUserLogin($token);
	}

	function validUserLoggedIn($token) {
		// check session token against saved user token

		return checkUserLogin($token);
	}

	function getTokenForSession($username) {
		// returns a token to be saved for the current session.
        $token = bin2hex(random_bytes(64));

        while(!verifyUniqueToken($token)) {
        	$token = bin2hex(random_bytes(64));
        }

        addUserLogin($username, $token);

        return $token;
	}

	function verifyUniqueToken($token) {
		// check logged in user table to ensure uniqueness
		return containsToken($token);
	}
?>