<?php

$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "c9";
$dbport = 3306;

// Create connection
$db= new mysqli($servername, $username, $password, $database, $dbport);

$user_id = $_COOKIE['user_id'];
if ($user_id === 'admin') {
    $sql = "SELECT * FROM qna";
    
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row) {
        echo "<table>";
        echo "<tr><td>" . 'id' . "</td><td>" . 'title' . "</td><td>" . 'question' . "</td></tr>";
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['title'] . "</td><td>" . $row['question'] . "</td></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['title'] . "</td><td>" . $row['question'] . "</td></tr>";
        }
        echo "</table>";
        
        echo '<h1>Want to delete or modify a question? in the first box, write to delete / wirte m to modify</h1>
         
         <form method="get" action="action_by_admin.php">
          action : <input type="text" name="action" />
          id :  <input type="text" name="id" />
          title :  <input type="text" name="title" />
          modified_question :  <input type="text" name="m_question" />
         <input type="submit" />';
         
    } else {
        echo 'there is no qna!';
    }
}
else{
    $sql = "SELECT title, question FROM qna WHERE id = '$user_id'";
    
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row) {
        echo "<table>";
        echo "</td><td>" . 'title' . "</td><td>" . 'question' . "</td></tr>";
        echo "<tr><td>" . $row['title'] . "</td><td>" . $row['question'] . "</td></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<tr><td>" . $row['title'] . "</td><td>" . $row['question'] . "</td></tr>";
        }
        echo "</table>";
        
        echo '<h1>Want to delete or modify a question? in the first box, write to delete / wirte m to modify</h1>
         
         <form method="get" action="action.php">
          action : <input type="text" name="action" />
          title :  <input type="text" name="title" />
          modified_question :  <input type="text" name="m_question" />
         <input type="submit" />';
    } else {
        echo "you haven't written any qna!";
    }
}


$db->close();
?>