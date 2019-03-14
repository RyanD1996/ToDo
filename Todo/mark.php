<?php

require_once 'app/init.php';

if(isset($_GET["as"], $_GET['item'])){
  $as = $_GET['as'];
  $item = $_GET['item'];
  $username = $_SESSION["user_id"];
  switch($as){
    case 'done':
        $sql = "UPDATE items
                SET done = 1
                WHERE id = $item
                AND user = $username";
                if ($db->query($sql) === TRUE) {
                      echo "Record has been marked as done!";
                } else {
                      echo "Error: " . $sql . "<br>" . $db->error;
                }

                break;
    default:
    $sql = "UPDATE items
            SET done = 0
            WHERE id = $item
            AND user = $username";
            if ($db->query($sql) === TRUE) {
                  echo "Record has been marked as not done!";
            } else {
                  echo "Error: " . $sql . "<br>" . $db->error;
            }

            break;
  }
}

header('Location: index.php');
