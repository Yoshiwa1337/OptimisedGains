<?php
    // if(isset($_POST['submit'])){
    //     // echo "It works";
    //     header("location: ../account.php");
    // }
    // else{
    //     header("location: ../signup.php");
    // }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("location: ../account.php");
    }
    else{
        header("location: ../signup.php");
    }
?>