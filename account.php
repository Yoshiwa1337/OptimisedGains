<?php
    // $emailPattern=;
    $passPattern="/^[a-zA-Z0-9\_]{3,10}$/";
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passCnfrm = $_POST['passCnfrm'];
        
        if(preg_match($passPattern,$name,$array)){
            print_r($array);
        }
        else{
            echo "Invalid password";
        }

        if($password == $passCnfrm){

        }


    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../OptimisedGains/css/account.css">
    <link rel="stylesheet" href="../OptimisedGains/css/navbar.css">
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="signup">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Email">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" minlength="8" required>

            <label for="password-rpt">Repeat Password</label>
            <input type="password" name="passCnfrm" id="passCnfrm" placeholder="Confirm Password" minlength="8">

            <!-- note: add code showing criteria for password ? if it doesnt involve js -->

            <!-- <input type="submit" value="signup"> -->
            <button type="submit" name="submit" id="submit" class="signupbtn">Sign up</button>

            <button type="button" class="cancelbtn">Cancel</button>


        </form>
        

    </div>
   
</body>
</html>
