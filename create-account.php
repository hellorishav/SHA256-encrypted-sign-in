<?php

    if (isset($_POST["password"])) {

        $username = hash('sha256', $_POST["username"]); // Hashing username with SHA 256 algorithm
        $password = hash('sha256', $_POST["password"]); // Hashing password with SHA 256 algorithm

        $servername = "127.0.0.1:3306";
        $username = "u947421468_SHA256_SignIn";
        $password = "SHA256@encrypt";
        $dbname = "u947421468_SHA256_SignIn";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `user_data`(`username`, `password`) VALUES ($username, $password)";

        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        /*

        // Entering Database Credentials

        $localname = "localhost";
        $database_username = "u947421468_SHA256_SignIn";
        $database_password = "SHA256@encrypt";
        $db_name = "u947421468_SHA256_SignIn";

        $connection_to_database = new mysqli($localname, $database_username, $database_password, $db_name); // Connect to Database

        if ($connection_to_database->connect_error) {

          die("Connection failed: " . $connection_to_database->connect_error); // If Database Connection Error, die with Error Reason

        }

        // Connection Succesful to Database at this point, start recording the hashed values in database

        $sql_query = "INSERT INTO user_data (username, password)
                VALUES ($username, $password)"; // Recording username and password using SQL query

        if ($connection_to_database->query($sql_query) === TRUE) { // Execute on Account Creation being succesful
          echo "Account Creation Succesful.";
        } else {
          echo "Error: " . $sql_query . "<br>" . $connection_to_database->error;
        }

        $connection_to_database->close();
        */
    } 

?>

<form method="post">

<input type="text" id="username">Username</input>
<input type="password" id="password">Password</input>
<button type="submit" value="submit">Create Account</button>

</form>