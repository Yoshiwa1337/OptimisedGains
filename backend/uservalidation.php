<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passConfirm = $_POST['passConfirm'];

        $errorEmpty = false;
        $errorEmail = false;

        if(empty($email) || empty($password) || empty($passConfirm)){
            echo "<span class='form-error'>Fill in all fields!</span>";
            $errorEmpty = true;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<span class='form-error'>Write a valid email!</span>";
            $errorEmpty = true;
        }
        else{
            echo "<span class='form.success'>Form successfully submitted!</span>";
        }




    }
    else{
        echo "There was an error!";
    }


?>

<script>
    $("#style-email, #style-password, #style-passConfirm").removeClass("input-error");



    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if (errorEmpty == true){
        $("#style-email, #style-password, #style-passConfirm").addClass("input-error");
    }

    if (errorEmail == true){
        $("#mail-email").addClass("input-error");
    }

    if (errorEmpty == false && errorEmail == false){
        $("#style-email, #style-password, #style-passConfirm").val("");
    }

</script>