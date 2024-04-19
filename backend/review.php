<?php
    session_start();
    // include 'connection.php';
    include 'dbh.inc.php';
    $authorId = $_SESSION['userid'];

    $reviewNewCount = $_POST['reviewNewCount'];
    $sql = "SELECT * FROM reviews LIMIT $reviewNewCount";
    $sql1 = "SELECT `users_name` FROM users WHERE users_id='$authorId'";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0){
        while ($row = mysqli_fetch_assoc($result) || $row1 = mysqli_fetch_assoc($result1)){
            echo "<div class='review'>";
            echo "<blockquote class='review-text'>";
            echo $row['message'];
            echo "</blockquote>";
            echo "<footer class='reviewer-name'>";
            echo $row1['name'];
            echo "</footer>";
            echo "</div>";
        }

    }
    else{
        echo "There are no comments!";
    }

    // $reviewNewCount = $_POST['reviewNewCount'];
    // $sql = "SELECT * FROM comments LIMIT $reviewNewCount";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0){
    //     while ($row = mysqli_fetch_assoc($result)){
    //         echo "<div class='review'>";
    //         echo "<blockquote class='review-text'>";
    //         echo $row['message'];
    //         echo "</blockquote>";
    //         echo "<footer class='reviewer-name'>";
    //         echo $row['author'];
    //         echo "</footer>";
    //         echo "</div>";
    //     }

    // }
    // else{
    //     echo "There are no comments!";
    // }
?>