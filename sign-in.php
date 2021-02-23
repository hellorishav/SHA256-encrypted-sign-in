<link rel="stylesheet" href="https://rishavkumar.io/styles.css">

<button class="button" onclick="document.location.href='home.php'">Back to Home</button><br>

<form method="post">

<input class="input" type="text" name="user_username" placeholder="Username"></input><br>
<input class="input" type="password" name="user_password" placeholder="Password"></input><br>
<button class="button" type="submit" name="submit" value="submit">Sign In</button><br>

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

      $sql = "select *from user_data where username = '$user_username' and password = '$user_password'";  
      $result = mysqli_query($conn, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);  
        
      if($count == 1){  
          echo "<h1>Login successful.</h1>";  
      }  
      else{  
          echo "<h1>Login failed.</h1>";  
      }     

      $conn->close();
  
  }

?>