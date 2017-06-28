<?php

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;

// Create connection
$db= new mysqli($servername, $username, $password, $database, $dbport);

// Check connection
if($db->connect_erro) {
    die("Connection failed: " . $db->connect_error);
}
echo "Connected succesfully (".$db->host_info.")";

$id=$_GET['id'];
$password=intval($_GET['password']);

$sql = "insert into member_rel (id, pw)
values('$id', '$password')";

if($db->query($sql) === TRUE){
 echo 'Welcome, you are a new member!'.'<br />'.'<a href="./index.html">Go to homepage and Log-in</a>';
} else {
 echo 'Something wrong happened';
}

$db->close();
?>