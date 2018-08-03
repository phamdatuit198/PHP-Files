<?php
	// log in information
	include 'loginInfo.php';
	
	// user specified registration data
	$user_firstName = $_POST["registerFirstName"];
	$user_lastName = $_POST["registerLastName"];
	$user_email = $_POST["registerEmail"];
	$user_password = $_POST["registerPassword"];
	
	// connect to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", $username, $password, $databaseName);
	
	// check connection
	if(!$mysqli){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	// sql query to check if user exists
	$sql = "SELECT firstName, lastName, email, password FROM user WHERE firstName='".$user_firstName."' AND lastName='".$user_lastName."' AND email='".$user_email."'";
		
	// get the information returned from the server
	$result = mysqli_query($mysqli ,$sql);
	
	// if the database doesn't have that user data, insert into the table
	if($result->num_rows == 0){
		// sql query to insert the user
		$sql = "INSERT INTO user (firstName, lastName, email, password) VALUES ('".$user_firstName."','".$user_lastName."','".$user_email."','".$user_password."' )";
		
		// sql query in insert usergamedata
		if (mysqli_query($mysqli, $sql)) {
			$sql = "INSERT INTO userGameData (userID, money, scene, shotgun, slingshot, watergun, lives, hitpoints) VALUES (LAST_INSERT_ID(),500,1,2,2,2,3,5)";
			if (mysqli_query($mysqli, $sql)) {
			
				// sql query
				$sql = "SELECT * FROM user INNER JOIN userGameData ON user.id = userGameData.userID WHERE email='".$user_email."' AND password='".$user_password."'";
	
				// get the information returned from the server
				$result = mysqli_query($mysqli ,$sql);
		
				// if a single row was returned, log in was successful
				if($result->num_rows == 1){

					//echo "Login successful.";
					$row = $result->fetch_assoc();
	
					echo "".$row['id'] . "|" .$row['firstName'] . "|" .$row['lastName'] . "|" .$row['money'] . "|" .$row['scene']. "|" .$row['shotgun'] . "|" .$row['slingshot'] . "|" .$row['watergun'] . "|" .$row['lives']. "|" .$row['hitpoints']. "";

    				//echo "User account created successfully";
    			}
			} else {
    			echo "Error";
			}
		} else {
    			echo "Error";		}
	}
	else{
		echo "User account already exists.";
	}

?>