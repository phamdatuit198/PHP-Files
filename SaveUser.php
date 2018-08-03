<?php
	// login credentials
	include 'loginInfo.php';
	
	// user specified login information
	$userMoney = $_POST["userMoney"];
	$userShotgun = $_POST["userShotgun"];
	$userWatergun = $_POST["userWatergun"];
	$userSlingshot = $_POST["userSlingshot"];
	$userLives = $_POST["userLives"];
	$userHitpoints = $_POST["userHitpoints"];
	$userID = $_POST["userID"];
	$userScene = $_POST["userScene"];
	
	// connect to the database
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", $username, $password, $databaseName);
	
	// check connection
	if(!$mysqli){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	// sql query
	
	$sql = "UPDATE userGameData SET money = " .$userMoney. ", scene = " .$userScene. ", shotgun = " .$userShotgun. ", watergun = " .$userWatergun. " , slingshot = " .$userSlingshot. ", lives = " .$userLives. ", hitpoints = " .$userHitpoints. " WHERE userID = " .$userID. ";" ;
	
	// get the information returned from the server
	$result = mysqli_query($mysqli ,$sql);
		
	// check if update was successful
	if($result){
		echo "Save successful.";
	}
	else{
		echo "Save not successful.";
	}
?>