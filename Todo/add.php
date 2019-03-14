<?php

require_once 'app/init.php';

if(isset($_POST["name"])){
  $name = trim($_POST["name"]);
  $username = $_SESSION["user_id"];
  if(!empty($name)){
    $sql = "INSERT INTO items (name, user, done, created)
            VALUES ('$name', '$username', 0, NOW())
            ";

    if ($db->query($sql) === TRUE) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . $db->error;
    }

  }
}

header('Location: index.php');
