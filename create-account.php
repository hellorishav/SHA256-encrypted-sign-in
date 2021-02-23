<?php

if (isset($_POST["username"])) { // Check if Username entered

    if (isset($_POST["password"])) { // Check if Password entered

        $username = hash('sha256', $_POST["username"]); // Hashing username with SHA 256 algorithm
        $password = hash('sha256', $_POST["password"]); // Hashing password with SHA 256 algorithm

        // Entering Database Credentials

        $localname = "localhost";
        $database_username = "u947421468_SHA256_SignIn";
        $database_password = "SHA256_SignIn";

        $connection_to_database = new mysqli($localname, $database_username, $database_password); // Connect to Database

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

        } else {

            echo "Please enter password."; // If password not entered, return error message

        }

        } else {

            echo "Please enter username."; // If username not entered, return error message

        }

?>

<form method="post">

<input type="text" id="username">Username</input>
<input type="password" id="password">Password</input>
<button type="submit" value="submit">Create Account</button>

</form>