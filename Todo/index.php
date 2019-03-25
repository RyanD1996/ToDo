<?php
require_once 'app/init.php';
$username = $_SESSION["user_id"];
$sql = "SELECT id, name, done
        FROM items
        WHERE user = $username";

$result = $db->query($sql);
$items = $result->num_rows ? $result : [];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="jquery.floating-messages.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="jquery.floating-messages.min.js"></script>
    <meta charset="UTF-8">
    <title>ToDo</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="list">
      <h1 class="header">To Do.</h1>
      <?php if(!empty($items)): ?>
      <ul class="items">
        <?php foreach($items as $item): ?>
        <li>
          <span class="item <?php echo $item['done'] ? ' done' : ''?>"><?php echo $item['name'] ?></span>
          <?php if(!$item['done']): ?>
          <a href="mark.php?as=done&item=<?php echo $item['id'];?>" class="done-button">Mark as done</a>
        <?php endif; ?>
        </li>
      <?php endforeach ?>

      </ul>
    <?php else: ?>
      <p>No items have been added yet.</p>
    <?php endif; ?>

      <form class="item-add" action="add.php" method="post">
        <input type="text" name="name" placeholder="Enter an item." class="input" autocomplete="off" required>
        <input type="submit" value="Add" class="submit">
      </form>
      <button onclick="nightmode()" class="submit">Night Mode</button>
    </div>
  </body>
</html>

<script>
    function nightmode(){
      // Get elements, creates an array of elements.
      elements = document.getElementsByClassName("list");
      items = document.getElementsByClassName("item");
      header = document.getElementsByClassName("header");
      buttons = document.getElementsByClassName("submit");
      header[0].style.color="#fff";
      // Ammend CSS by looping through the arrays
      for (var i = 0; i < elements.length; i++) {
          elements[i].style.backgroundColor="#141d26";
      }
      for (var i = 0; i < items.length; i++) {
          items[i].style.color="#ffffff";
      }
      for (var i = 0; i < buttons.length; i++) {
          buttons[i].style.backgroundColor="#c51f5d";
          buttons[i].style.boxShadow = "3px 3px 0 black"
          buttons[i].style.color = "white"
      }
    }
</script>
