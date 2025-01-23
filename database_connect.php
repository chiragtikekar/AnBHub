<?php
    $server = "localhost:3308";
    $username = "root";
    $password = "";
    $database = "anb_hub";

    $conn = mysqli_connect ($server, $username, $password, $database);

    if (!$conn)
    {
        die ("Error: " . mysqli_connect_error());
    }
?>