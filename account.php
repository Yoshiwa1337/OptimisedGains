<?php
error_reporting(0);

require_once 'backend/dbh.inc.php';

session_start();

// $serverName="localhost";
// $userName="root";
// $password="";
// $dbName="project";

// $conn = mysqli_connect($serverName, $userName, $password, $dbName)

// if(!$conn){
//     die("Connection failed: " . mysqli_connect_error());
// }

/*$sql2 = "SELECT users_name FROM `users` WHERE users_id = '$userid'";

$query = mysqli_query($conn, $sql2);

while($val = mysqli_fetch_assoc($query)){
    $userName = $val['users_name'];
}
 */

if(isset($_FILES['video'])){
//   if(isset($_POST['submit'])){
//       echo "<pre>";
//       print_r($_FILES['video']);
//       echo "</pre>";
//   }

    $name = $_FILES['video']['name'];
    $temp_name = $_FILES['video']['tmp_name'];
    $size = $_FILES['video']['size'];
    $type = $_FILES['video']['type'];
    $exercise = $_POST['exercise'];
    $vidType = $_POST['vidType'];
    $vidGroup = $_POST['vidGroup'];
    $userid = $_SESSION['userid'];
    $reviewMsg = $_POST['review-msg'];


/*
    $sql2 = "SELECT users_name FROM users WHERE users_id = '$userid';";

    $result2 = mysqli_query($conn, $sql2);


    if(!$result2){
        echo "User not found";
    }

    $sql3  = "INSERT INTO `usersreview`(author, message) VALUES('$sql2', '$reviewMsg')";

    $result3 = mysqli_query($conn, $sql3);

    if($result3){
        echo "Review inserted successfully";
    }
    else{
        echo "Table not inserted successfully";
    }
*/
    move_uploaded_file($temp_name,"vidsuser/".$name);

    $video_name = "vidsuser/".$name;
    $sql = "INSERT INTO `usersvids`(vid_name, vid_exercise, vid_type, vid_group, users_id) VALUES('$video_name', '$exercise', '$vidType', '$vidGroup', '$userid')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Table inserted successfully";
    }
    else{
        echo "Table not inserted successfully";
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../OptimisedGains/css/account.css">
    <link rel="stylesheet" href="../OptimisedGains/css/navbar.css">
    <link rel="stylesheet" href="../OptimisedGains/css/footer.css">
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once 'navbar.php' ?>

    <div class="container">

        <?php

        $userid = $_SESSION['userid'];
        $sql2 = "SELECT users_name FROM `users` WHERE users_id = '$userid'";

        $query = mysqli_query($conn, $sql2);

        while($row = mysqli_fetch_assoc($query)){
            $userName = $row['users_name'];
        }

        ?>

        <h1 class="text-center">Welcome to the accounts page <?php echo $userName; ?> !</h1>
        <a href="../OptimisedGains/backend/logout.inc.php" class="logout" id="join-now-btn">Log out</a>

        <div class="user-field">

            <div class="upload">

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <input type="file" name="video" id="video">

                    </div>

                    <div class="form-row">

                        <label name="exercise">Exercise name</label>
                        <input type="text" name="exercise" id="exercise" placeholder="name of exercise">

                    </div>

                    <div class="form-row">

                        <label name="vidType">Exercise type</label>
                        <input type="text" name="vidType" id="vidType" placeholder="Type of exercise">

                    </div>

                    <div class="form-row">

                        <label name="vidGroup">Muscle Group</label>
                        <input type="text" name="vidGroup" id="vidGroup" placeholder="Muscle group">

                    </div>


                    <input type="submit" name="submit" value="submit">
                </form>

            </div>

            <div class="user-review">
                <form action="../OptimisedGains/backend/review.inc.php" method="post">
                    <h2> Leave a Review here !</h2>
                    <label>Enter review</label>
                    <textarea type="text" name="review-msg" id="review-msg"></textarea>
                    <input type="submit" name="submit" value="submit">
                </form>
                </form>
            </div>

        </div>

        <div class="user-content">

            <div class="user-data"></div>

            <div class="user-vids">
                <?php

                $userid = $_SESSION['userid'];
                $sql2 = "SELECT users_id FROM `usersvids`";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $sql1 = "SELECT * FROM `usersvids` WHERE users_id = '$userid'";
                $result1 = mysqli_query($conn, $sql1);


                while($row = mysqli_fetch_assoc($result1)){
                    $vid_name=$row['vid_name'];
                ?>
                <div class="box">
                    <h2> <?php echo $row['vid_exercise'] ?></h2>
                    <video src="<?php echo $vid_name ;?>" controls></video>
                    <div class="info">
                        <i class="star-icon icon"></i>
                        <i class="star-icon icon"></i>
                        <i class="star-icon icon"></i>
                        <a href="#"><i class="save-icon icon"></i></a>
                        <p><?php echo $row['vid_type'] ?></p>
                        <p><?php echo $row['vid_group'] ?></p>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>




        </div>






    </div>

    <?php include_once 'footer.php' ?>


   
</body>
</html>
