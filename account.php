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

    if(isset($_FILES['video'])){
        if(isset($_POST['submit'])){
            echo "<pre>";
            print_r($_FILES['video']);
            echo "</pre>";
        }

        $name = $_FILES['video']['name'];
        $temp_name = $_FILES['video']['tmp_name'];
        $size = $_FILES['video']['size'];
        $type = $_FILES['video']['type'];
        $exercise = $_POST['exercise'];
        $vidType = $_POST['vidType'];
        $vidGroup = $_POST['vidGroup'];
        $userid = $_SESSION['userid'];

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
        <h1 class="text-center">Welcome to the accounts page!</h1>
        <a href="../OptimisedGains/backend/logout.inc.php" class="logout" id="join-now-btn">Log out</a>

        <div class="upload">

            <form action="<?php $_SERVER['PHP_SELF']  ?>" method="POST" enctype="multipart/form-data">
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



        <!--<div class="exercise-box1 box">
            <h2>Heading</h2>
            <video src="../OptimisedGains/vids/y2mate.is - ATG Split Squat Progression-Gx7i66uftV4-720p-1701901818.mp4" controls></video>
            <div class="info">
                <i class="star-icon icon"></i>
                <i class="star-icon icon"></i>
                <i class="star-icon icon"></i>
                <a href="#"><i class="save-icon icon"></i></a>
                <p>Strength</p>
                <p>Hypertrophy</p>
            </div>
        </div>-->



        <?php
            
            $sql2 = "SELECT users_id FROM `usersvids`";

            $result2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($result2);

            $sql1 = "SELECT * FROM `usersvids`";

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
        <?php }
        ?>




    </div>

    <?php include_once 'footer.php' ?>


   
</body>
</html>
