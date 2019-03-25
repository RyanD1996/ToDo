<?php
session_start();
$_SESSION['user_id'] = 1;
$db = mysqli_connect('localhost', 'root');
mysqli_select_db($db, 'todo');
if($db->connect_error){
  die('Connection failed: '. $db->connect_error);
}
?>
