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
    <meta charset="UTF-8">
    <title>ToDo</title>
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
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
    </div>
  </body>
</html>
