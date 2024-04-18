<?php
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
        $userid = $_SESSION['userid'];

        move_uploaded_file($temp_name,"vidsuser/".$name);

        $video_name = "viduser/".$name;
        $sql = "INSERT INTO `usersvids`(vid_name, vid_exercise, users_id) VALUES('$video_name', '$exercise', '$userid')";

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
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once 'navbar.php' ?>

    <div class="container">
        <h1 class="text-center">Welcome to the accounts page!</h1>
        <p class="text-center"><a href="../OptimisedGains/backend/logout.inc.php" class="logout">Log out</a></p>

        <form action="<?php $_SERVER['PHP_SELF']  ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="video" id="video">
            <input type="text" name="exercise" id="exercise">
            <input type="submit" name="submit" value="submit">
    
        </form>

        <table>
            <tr>
                <th>userid</th>
                <th>exercise</th>
                <th>video</th>
            </tr>

            <?php
                $sql1 = "SELECT * FROM `usersvids`";

                $result1 = mysqli_query($conn, $sql1);

                while($row = mysqli_fetch_assoc($result1)){
                    $vid_name=$row['vid_name'];
                    ?>
                    <tr>
                        <td> <?php echo $row['vid_id'] ?></td>
                        <td> <?php echo $row['vid_exercise'] ?></td>
                        <td><video src="<?php echo $vid_name ;?>" height="200px" width="300px" controls></video></td>
                        <td><video src="../OptimisedGains/viduser/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" height="200px" width="300px" controls></video></td>
                        <td><video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" height="200px" width="300px" controls></video></td>
                    </tr>

            <?php }
            ?>



        </table>

    </div>


   
</body>
</html>
