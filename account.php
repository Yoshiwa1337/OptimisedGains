<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../OptimisedGains/css/account.css">
    <link rel="stylesheet" href="../OptimisedGains/css/navbar.css">
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once 'navbar.php' ?>

    <div class="container">
        <h1 class="text-center">Welcome to the accounts page!</h1>
        <p class="text-center"><a href="../OptimisedGains/backend/logout.inc.php" class="logout">Log out</a></p>

        <form action="../OptimisedGains/backend/dbh.inc.php" method="POST">
            <label for="message">Enter your review</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <!-- <input type="message" name="message" id="message"> -->
            <input type="submit" name="submit" value="submit">


        </form>

    </div>


   
</body>
</html>
