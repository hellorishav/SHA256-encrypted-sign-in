<?php

if (isset($_POST["submit"])) {

      $user_username = $_POST["username"]; // Hashing username with SHA 256 algorithm
      $user_password = $_POST["password"]; // Hashing password with SHA 256 algorithm

      // Entering Database Credentials

      $servername = "localhost";
      $username = "u947421468_sha256example";
      $password = "sha256@Example";
      $dbname = "u947421468_sha256example";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO user_data (username, password) VALUES (" . $user_username . ", " . $user_password . ")";

      if ($conn->query($sql) === TRUE) {
        echo "Account created successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
  
  }

?>

<form method="post">

<input type="text" id="username">Username</input><br>
<input type="password" id="password">Password</input><br>
<button type="submit" name="submit" value="submit">Create Account</button><br>

</form>