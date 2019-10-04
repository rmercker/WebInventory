<?php

	if (basename($_SERVER["PHP_SELF"]) == "LoginSecurity.php") {
		Header("Location: ./Login.php");
		exit();
	}

	function login($name, $password) {
		$hashword = password_hash("password", PASSWORD_DEFAULT, ['cost' => 12]);

		return $name == "name" && $hashword == password_verify($password, $hashword);
	}

	function logout($token) {
		// removes user from logged in table
	}

	function validUserLoggedIn($token) {
		// check session token against saved user token
		return true;
	}

	function getTokenForSession() {
		// returns a token to be saved for the current session.
        $token = bin2hex(random_bytes(64));

        while(!verifyUniqueToken($token)) {
        	$token = bin2hex(random_bytes(64));
        }

        return $token;
	}

	function verifyUniqueToken($token) {
		// check logged in user table to ensure uniqueness
		return true;
	}
?>