<?php

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;

// Create connection
$db= new mysqli($servername, $username, $password, $database, $dbport);

$id=$_GET['id'];
$password=intval($_GET['password']);

$sql = "SELECT id FROM member_rel WHERE id = '$id'";
$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);

if($count == 1) {
    echo "another person is already using that id!!".'<br />'.'<a href="./index.html">Go to homepage and try different id</a>';
} else {
    $sql = "insert into member_rel (id, pw)
values('$id', '$password')";

if($db->query($sql) === TRUE){
 echo 'Welcome, you are a new member!'.'<br />'.'<a href="./index.html">Go to homepage and Log-in</a>';
} else {
 echo 'Something wrong happened';
}
}

$db->close();
?>