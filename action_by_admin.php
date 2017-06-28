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
      
      $action = mysqli_real_escape_string($db,$_GET['action']);
      
      if($action === 'd'){
            $id = mysqli_real_escape_string($db,$_GET['id']);
            $title = mysqli_real_escape_string($db,$_GET['title']);
            $sql = "DELETE FROM qna WHERE id = '$id' and title = '$title'";
            $result = mysqli_query($db, $sql);
      
            echo "deletion successful".'<br />'.'<a href="./qna.php">Go back to qna page!</a>';;
      } else if ($action === 'm') {
            $id = mysqli_real_escape_string($db,$_GET['id']);
            if($id === 'admin'){
                  $title = mysqli_real_escape_string($db,$_GET['title']);
                  $question = mysqli_real_escape_string($db,$_GET['m_question']);
                  
                  $sql = "DELETE FROM qna WHERE title = '$title'";
                  $result = mysqli_query($db, $sql);
                  
                  $sql = "insert into qna (id, title, question)
                  values('$id', '$title', '$question')";
                  $result = mysqli_query($db, $sql);
                  
                  echo "modification successful".'<br />'.'<a href="./qna.php">Go back to qna page!</a>';
            } else {
                  echo "although you are the admin, you cannot modify others' qna. but you can delete qna's".'<br />'.'<a href="./qna.php">Go back to qna page!</a>';
            }
            
      } else {
            echo "you did not enter d or m".'<br />'.'<a href="./qna.php">Go back to qna page!</a>';
      }
      
      
}
   
$db->close();
?>