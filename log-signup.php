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
    <link rel="stylesheet" href="../OptimisedGains/css/log-signup.css">
    <link rel="stylesheet" href="../OptimisedGains/css/navbar.css">
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $("form").submit(function(event){
                event.preventDefault();
                var email = $("#style-email").val();
                var password = $("#style-password").val();
                var passConfirm = $("#style-passConfirm").val();
                var submit = $("#style-submit").val();
                $(".form-message").load("../OptimisedGains/backend/uservalidation.php", {
                    email: email,
                    password: password,
                    passConfirm: passConfirm,
                    submit: submit,
                });

            });

        });

    </script>



</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="signup">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="style-email" placeholder="Enter Email">
            <i class="icon"></i>

            <label for="password">Password</label>
            <input type="password" name="password" id="style-password" placeholder="Enter Password">
            <i class="icon"></i>

            <label for="password-rpt">Repeat Password</label>
            <input type="password" name="passCnfrm" id="style-passConfirm" placeholder="Confirm Password">
            <i class="icon"></i>

            <!-- note: add code showing criteria for password ? if it doesnt involve js -->

            <!-- <input type="submit" value="signup"> -->
            <button type="submit" name="submit" id="style-submit" class="signupbtn">Sign up</button>

            <button type="button" class="cancelbtn">Cancel</button>
            <p class="form-message"></p>


        </form>
        

    </div>
   
</body>
</html>
