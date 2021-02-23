<button onclick="document.location.href='home.php'">Back to Home</button><br>

<form method="post">

<input type="text" name="user_username" placeholder="Username"></input><br>
<input type="password" name="user_password" placeholder="Password"></input><br>
<button type="submit" name="submit" value="submit">Create Account</button><br>

</form>

<?php

if (isset($_POST["submit"])) {

      $user_username = hash('sha256', $_POST["user_username"]); // Hashing username with SHA 256 algorithm
      $user_password = hash('sha256', $_POST["user_password"]); // Hashing password with SHA 256 algorithm

      // Entering Database Credentials

      $servername = "localhost";
      $username = "u947421468_sha256example";
      $password = "sha256@Example";
      $dbname = "u947421468_sha256example";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO user_data (username, password) VALUES ('" . $user_username . "', '" . $user_password . "')";

      if ($conn->query($sql) === TRUE) {
        echo "Account created successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
  
  }

?>