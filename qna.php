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
         <h1>Welcome!</h1>
         <?php
            if(!isset($_COOKIE['user_id'])) {
	        echo "no cookie";
            }
            $user_id = $_COOKIE['user_id'];
            echo "<p>Welcome ".$user_id."!</p>";
         ?>
      </main>
  </body>
</html>