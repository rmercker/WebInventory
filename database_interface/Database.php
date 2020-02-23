<?php

	if (basename($_SERVER["PHP_SELF"]) == "Database.php") {
		Header("Location: ./Login.php");
		exit();
	}


	function getConnection() {
		$DBinstance = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) (CONNECT_DATA = (SID = xe)))";


		try {
			$Connection = new PDO("oci:dbname=" .$DBinstance, $Username, $Password,
				array(
        			PDO::ATTR_TIMEOUT => 10, // in seconds
        			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
				);
			return $Connection;
		} catch (PDOException $e) {
			//TODO: send to error page and report.
			return null;
		}
	}


	function getUserHashword($username) {
		$Connection = getConnection();
		if ($Connection == null) return null; // need db not responding error
		$query = $Connection->prepare("Select PASSWORD From USERS Where USERNAME=:name");
		$query->bindParam(':name', $username);
		$query->execute();
		$row = $query->fetch();
		if ($row == null || $query->fetch() != false) return null; //TODO: report error on multiple of a username;
		return $row[0];
	}

	function addUserLogin($username, $token) {
		$Connection = getConnection();
		if ($Connection == null) return null; // need to throw error to say db not responding
		$date = date_create(null, new DateTimeZone("UTC")); 
		$date->add(new DateInterval('P1D'));
		$date_str = $date->format("Y-m-d H:i:s");
		$query = $Connection->prepare("INSERT INTO LOGGED_IN_USERS (USERNAME, LOGGIN_TOKEN, TOKEN_TTL) VALUES(:username, :token, :ttl)");
		$query->bindParam(':username', $username);
		$query->bindParam(':token', $token);
		$query->bindParam(':ttl', "TO_DATE($date_str, 'yyyy/mm/dd hh12:mi:ss')");

		if (!$query->execute()) 
		{
			echo "no go";
		}
	}

	function removeUserLogin ($token) {
		$Connection = getConnection();
		if ($Connection == null) return null; // need to throw error to say db not responding
		$query = $Connection->prepare("REMOVE FROM LOGGED_IN_USERS WHERE LOGGIN_TOKEN=:token");
		$query->bindParam(':token', $token);
		$query->execute();
	}

	function checkUserLogin($token) {
		$Connection = getConnection();
		if ($Connection == null) return null; // need to throw error to say db not responding

		$date = date_create(null, new DateTimeZone("UTC")); 
		$query = $Connection->prepare("SELECT TOKEN_TTL FROM LOGGED_IN_USERS WHERE LOGGIN_TOKEN=:token");
		$query->bindParam(':token', $token);
		$query->execute();
		$result = $query->fetch();
		echo ($result[0]);
		echo ('hello');
		$result = new DateTime($result[0]);
		echo($result->format('Y-m-d H:i:s'));
		echo($date->format('Y-m-d H:i:s'));

		if ($result != null)
			if ($result > $date)
				return true;
			else {
				removeUserLogin($token);
				return false;
			}
		else 
			return false;
	}

	function containsToken($token) {
		$Connection = getConnection();
		if ($Connection == null) return null; // need to throw error to say db not responding

		$date = date_create(null, new DateTimeZone("UTC")); 

		try {
			$query = $Connection->prepare("SELECT COUNT() FROM LOGGED_IN_USERS WHERE LOGGIN_TOKEN=:token");
			$query->bindParam(':token', $token);
			$query->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		$result = $query->fetch();

		if ($result != null && $result[0] > 0) 
			return true;
		else
			return false;
	}
?>
