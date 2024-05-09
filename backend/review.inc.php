<?php

require_once 'dbh.inc.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("location: ../home.php");
    $reviewMsg = $_POST['review-msg'];
    $userid = $_SESSION['userid'];

    $sql2 = "SELECT users_name FROM `users` WHERE users_id = '$userid';";
    //print_r($sql2);

    $result2 = mysqli_query($conn, $sql2);

    if(!$result2){
        echo "User not found";
    }

    $sql3 = "SELECT author FROM `usersreview` WHERE users_id = '$userid';";

    $result3 = mysqli_query($conn, $sql3);

    while($row = mysqli_fetch_assoc($result2)){
        $name = $row['users_name'];
    }

    if(!$check = mysqli_fetch_assoc($result3)){

        $sql4  = "INSERT INTO `usersreview`(author, message, users_id) VALUES('$name', '$reviewMsg', '$userid')";

        $result4 = mysqli_query($conn, $sql4);

        if($result4){
            echo "Review inserted successfully";
        }
        else{
            echo "Table not inserted successfully";
        }

    }
    else{
        echo "Error: Cannot upload more than one review!";
    }


}
else{
    header("location: ../account.php");

}






?>
