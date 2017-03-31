<?php
include 'connection.php';
include 'query.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log In - Verkefni 7</title>
  </head>
  <body>
    <?php
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];
      $upplysingar = logIn($conn, $email, $password);
      sessionStart($upplysingar['email']);
    }
    ?>
    <h1>Log In</h1>
    <form method="post" action="index.php">
        <label>E-Mail:</label>
        <input name="email" type="email" required><br>
        <label>Password:</label>
        <input name="password" type="password" required><br>
        <input type="submit" value="Log In">
    </form>
    <a href="signup.php">Sign Up</a>
  </body>
</html>
