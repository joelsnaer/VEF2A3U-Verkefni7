<?php
include 'connection.php';
include 'query.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up - Verkefni 7</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>Sign Up</h1>
    <?php
      if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        newUser($conn, $name, $email, $password);
        $id = getID($conn, $name, $email);
        addImage($conn, $id[0]);
        header('location: index.php');
      }
    ?>
    <form method="post" action="signup.php">
        <label>Name:</label>
        <input name="name" type="text" required><br>
        <label>E-Mail:</label>
        <input name="email" type="email" required><br>
        <label>Password:</label>
        <input name="password" type="password" required><br>
        <input type="submit" value="Sign up">
    </form>
  </body>
</html>
