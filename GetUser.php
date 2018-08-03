<?php
	// login credentials
	include 'loginInfo.php';
	
	// user specified login information
	$user_email = $_POST["loginEmail"];
	$user_password = $_POST["loginPassword"];
	
	// connect to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", $username, $password, $databaseName);
	
	// check connection
	if(!$mysqli){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	// sql query
	$sql = "SELECT * FROM user INNER JOIN userGameData ON user.id = userGameData.userID WHERE email='".$user_email."' AND password='".$user_password."'";
	
	// get the information returned from the server
	$result = mysqli_query($mysqli ,$sql);
		
	// if a single row was returned, log in was successful
	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
				
		echo "".$row['id'] . "|" .$row['firstName'] . "|" .$row['lastName'] . "|" .$row['money'] . "|" .$row['scene']. "|" .$row['shotgun'] . "|" .$row['slingshot'] . "|" .$row['watergun'] . "|" .$row['lives']. "|" .$row['hitpoints']. "";

	}
	else{
		echo "Login information is invalid.";
	}
?>