<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("location: ../login.php");
        $review = $_POST['message'];


        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        // if(uidExists($conn, $email) !== false){
        //     header("location: ../signup.php?error=existingemail");
        //     exit();
        // }

        // if(nameLong($conn, $name) !== false){
        //     header("location: ../signup.php?error=nametoolong");
        //     exit();
        // }

        insertUserReview($conn, $authorId, $review);

    }
    else{
        header("location: ../account.php?error");
    }
?>