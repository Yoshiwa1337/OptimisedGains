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
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passConfirm = $_POST['passComfirm'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(emailExists($conn, $email) !== false){
            header("location: ../signup.php?error=existingemail");
            exit();
        }

        createUser($conn, $email, $password);

    }
    else{
        header("location: ../signup.php");
    }
?>