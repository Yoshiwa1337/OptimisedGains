
<?php
    // $emailPattern=;
    // $passPattern="/^[a-zA-Z0-9\_]{3,10}$/";
    // if(isset($_POST['submit'])){
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     $passCnfrm = $_POST['passCnfrm'];
        
    //     if(preg_match($passPattern,$name,$array)){
    //         print_r($array);
    //     }
    //     else{
    //         echo "Invalid password";
    //     }

    //     if($password == $passCnfrm){

    //     }


    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../OptimisedGains/css/login.css">
    <link rel="stylesheet" href="../OptimisedGains/css/navbar.css">
    <link rel="stylesheet" href="../OptimisedGains/css/footer.css">
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        // $(document).ready(function(){
        //     $("form").submit(function(event){
        //         event.preventDefault();
        //         var email = $("#style-email").val();
        //         var password = $("#style-password").val();
        //         var passConfirm = $("#style-passConfirm").val();
        //         var submit = $("#style-submit").val();
        //         $(".form-message").load("../OptimisedGains/backend/uservalidation.php", {
        //             email: email,
        //             password: password,
        //             passConfirm: passConfirm,
        //             submit: submit,
        //         });

        //     });

        // });

    </script>



</head>
<body>
    <?php include_once 'navbar.php' ?>

    <div class="container">

        <div class="login">
            <form action="../OptimisedGains/backend/login.inc.php" method="post" id="mainForm" name="mainForm">
                <h1>Login</h1>
                <div class="form-row">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email">
                    <i class="icon"></i>
                </div>

                <div class="form-row">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" class="pass">
                    <i class="icon"></i>
                </div>

                <!-- <div class="form-row">
                    <label for="passConfirm">Repeat Password</label>
                    <input type="password" name="passConfrm" id="passConfirm" placeholder="Confirm Password" class="pass">
                    <i class="icon"></i>
                </div> -->
                <!-- note: add code showing criteria for password ? if it doesnt involve js -->

                <!-- <input type="submit" value="signup"> -->
                <button type="submit" name="btn-submit" id="btn-submit" class="signupbtn">Sign up</button>
                <p>Dont already have an account ?</p>
                <a href="../OptimisedGains/signup.php">Signup</a>

                <p class="form-message"></p>
                <!-- <button type="button" class="cancelbtn">Cancel</button> -->


            </form>

            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "wronglogin"){
                        echo "<p>Incorrect login information !</p>";
                    }
                    if($_GET['error'] == "none"){
                        echo "<p>Now you can login !</p>";
                    }
                }

            ?>
                

            

        </div>
    </div>

    <?php include_once 'footer.php' ?>
    <script src="../OptimisedGains/js/login.js"></script>
   
</body>
</html>
