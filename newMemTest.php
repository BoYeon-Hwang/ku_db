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

$sql = "insert into member_rel (id, pw)
values('test_mem', 1111)";

if($db->query($sql) === TRUE){
 echo 'Welcome, you are a new member!';
} else {
 echo 'Something wrong happened';
}

$db->close();
?>