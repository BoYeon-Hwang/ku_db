<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>DB_KU</title>
  </head>
  <body>
      <main>
         <?php
            if(!isset($_COOKIE['user_id'])) {
	        echo "no cookie";
            }
            $user_id = $_COOKIE['user_id'];
            echo "<h1>Welcome ".$user_id."!</h1>";
         ?>
         
         <a href="./newqna.php">Wanna write new qna?</a>
         <a href="./qnasearch.php">Wanna see past qna's? If you are not the admin, you cannot see other members' qna!</a>
      </main>
  </body>
</html>