<?php
include 'connection.php';
include 'query.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Svæði - Verkefni 7</title>
  </head>
  <body>
    <?php
    session_unset();
    session_start();
    if ($_SESSION['email']) {
    $email = $_SESSION['email'];
    }
    else {
      header('Location: index.php');
    }
    $name = saekjaNafn($conn, $email);
    echo "Velkomin " . $name["name"] . "<br>";
    echo "Email þitt er: " . $email . "<br>";

  if (!empty($_POST["nafn"])) {
      $nafn = $_POST["nafn"];
      breytaNafni($conn, $nafn, $email);
      header("Refresh:0");
    }
     ?>
     <form method="post" action="admin.php">
       <input type="text" name="nafn" required>
       <input type="submit" value="Breyta nafni">
     </form>
     <a href="logout.php">Ýttu hér til að logga út</a><br>
     <?php
      $id = getID($conn, $name["name"], $email);
      $images = getImage($conn, $id[0]);
      foreach ($images as $image => $value) {
        echo '<img src="' . $value['link'] . '"><br>';
        echo '<a href="delete.php?link=' . $value['link'] . '&id=' . $id[0] . '"> Eyða</a><br>';
      }
      ?>
  </body>
</html>
