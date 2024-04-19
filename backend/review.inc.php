<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("location: ../login.php");
        $review = $_POST['message'];
        $authorId = $_SESSION['userid'];


        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        // $query = "SELECT `name` FROM users WHERE users_id='$authorId'";

        // $result = mysql_query("SELECT `name` FROM users WHERE users_id = '$authorId'");
        // while ($row = mysql_fetch_array($result)) {
        //     echo $row['name'] . "<br />";
        // }

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