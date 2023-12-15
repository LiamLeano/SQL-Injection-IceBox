<?php

    // database credentials (XAMPP);
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "dummy_database";

    // check connection
    $conn = new mysqli($server, $user, $password, $database);
    if ($conn->connect_error) {
        die("login.php = Connection failed: " . $conn->connect_error);
    }

    // receive and review user input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM login WHERE username = '$user'";
        $sql = "SELECT * FROM login WHERE password = '$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $message = "Login successful";
        } else {
            $message = "Wrong username or password";
        }
    }

    $conn->close();

    // outcomes after submitting  form
    if ($message === "Login successful") {
        header("Location: success.html"); 
    } else {
        echo $message;
    }

?>
