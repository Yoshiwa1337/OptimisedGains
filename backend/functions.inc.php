<?php
    function uidExists($conn, $email){
        $sql = "SELECT * FROM users WHERE users_email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    function nameLong($conn, $name){
        $length = strlen($name);
        $result;

        if($length > 18){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;



    }


    function createUser($conn, $name, $email, $password){
        $sql = "INSERT INTO users (users_name, users_email, users_pwd) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT); 

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);



        header("location: ../login.php?error=none");
        exit();


    }

    function loginUser($conn, $email, $password){
        $uidExists = uidExists($conn, $email);

        if($uidExists === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidExists["users_pwd"];
        $checkPassword = password_verify($password, $pwdHashed);

        if($checkPassword === false){
            header("location: ../login.php?error=wronglogin");
            exit();

        }
        else if($checkPassword === true){
            session_start();
            $_SESSION["userid"] = $uidExists["users_id"];
            $_SESSION["useremail"] = $uidExists["users_email"];
            $userID = $_SESSION["userid"];
            header("location: ../home.php");
            exit();
        }
    }


?>
