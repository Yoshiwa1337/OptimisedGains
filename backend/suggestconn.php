<?php
    include 'dbh.inc.php';
    global $conn;
    $sql = "SELECT * FROM exercises";
    $results = mysqli_query($conn, $sql);
    $json_array = array();

    while($data = mysqli_fetch_assoc($results)){
        $json_array[] = $data;
    }

    echo json_encode($json_array);


?>