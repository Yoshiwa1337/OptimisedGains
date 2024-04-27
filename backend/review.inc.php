<?php

require_once 'dbh.inc.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("location: ../home.php");
    $reviewMsg = $_POST['review-msg'];
    $userid = $_SESSION['userid'];

    $sql2 = "SELECT users_name FROM `users` WHERE users_id = '$userid';";
    print_r($sql2);

    $result2 = mysqli_query($conn, $sql2);


    if(!$result2){
        echo "User not found";
    }

    while($row = mysqli_fetch_assoc($result2)){
        $name = $row['users_name'];
    }

    $sql3  = "INSERT INTO `usersreview`(author, message) VALUES('$name', '$reviewMsg')";

    $result3 = mysqli_query($conn, $sql3);

    if($result3){
        echo "Review inserted successfully";
    }
    else{
        echo "Table not inserted successfully";
    }

}
else{
    header("location: ../account.php");

}






?>
