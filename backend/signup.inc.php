<?php
    // if(isset($_POST['submit'])){
    //     // echo "It works";
    //     header("location: ../account.php");
    // }
    // else{
    //     header("location: ../signup.php");
    // }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        header("location: ../login.php");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passConfirm = $_POST['passConfirm'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(uidExists($conn, $email) !== false){
            header("location: ../signup.php?error=existingemail");
            exit();
        }

        if(nameLong($conn, $name) !== false){
            header("location: ../signup.php?error=nametoolong");
            exit();
        }

        createUser($conn, $name, $email, $password);

        header("location: ../login.php");
    }
    else{
        header("location: ../signup.php");
    }
?>