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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passConfirm = $_POST['passComfirm'];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(uidExists($conn, $email) !== false){
            header("location: ../signup.php?error=existingemail");
            exit();
        }

        if(nameLong($conn, $name) !== false){
            header("location: ../signup.php?error=nametoolongemail");
            exit();
        }

        createUser($conn, $name, $email, $password);

    }
    else{
        header("location: ../login.php");
    }
?>