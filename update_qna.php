<?php

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;

// Create connection
$db= new mysqli($servername, $username, $password, $database, $dbport);

$user_id = $_COOKIE['user_id'];
$title=$_GET['title'];
$question=$_GET['question'];

$sql = "insert into qna (id, title, question)
values('$user_id', '$title', '$question')";

if($db->query($sql) === TRUE){
 echo 'Your question is submitted!'.'<br />'.'<a href="./qna.php">Go back to qna page!</a>';
} else {
 echo 'Something wrong happened';
}

$db->close();
?>