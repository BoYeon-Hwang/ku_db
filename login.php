<?php

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;

// Create connection
$db= new mysqli($servername, $username, $password, $database, $dbport);

// Verification
if($_SERVER["REQUEST_METHOD"] == "GET") {
      // username and password sent from form 
      
      $user_id = mysqli_real_escape_string($db,$_GET['id']);
      $user_pw = intval(mysqli_real_escape_string($db,$_GET['password'])); 
      
      $sql = "SELECT id FROM member_rel WHERE id = '$user_id' and pw = '$user_pw'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         setcookie("user_id", $user_id, time()+3600, "/");
         
         header("location: qna.php");
      }else {
         header("location: loginfail.html");
      }
   }
?>