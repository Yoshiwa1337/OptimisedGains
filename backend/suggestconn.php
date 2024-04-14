<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "test";

    $connect = mysqli_connect($host, $username, $password, $database);
    $sql = "SELECT * FROM exercises";
    $results = mysqli_query($connect, $sql);
    $json_array = array();

    while($data = mysqli_fetch_assoc($results)){
        $json_array[] = $data;
    }

    echo json_encode($json_array);


?>