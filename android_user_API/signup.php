<?php
$link = mysqli_connect("localhost", "root", "", "db_account");

if(isset($_POST['username']) && isset($_POST['password'])){
          $result='';
	  $username = $_POST['username'];
          $password = $_POST['password'];
        $sql = "INSERT INTO accounttable (Username, Password) VALUES ('$username','$password')";
        if(mysqli_query($link, $sql)){
                 $result="true";
                // echo "Records inserted successfully.";
        } else{
                 $result="false";
                 //echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
                echo $result;
}
 
// Close connection
mysqli_close($link);
?>