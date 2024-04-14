<?php
    include 'connection.php';

    $reviewNewCount = $_POST['reviewNewCount'];
    $sql = "SELECT * FROM comments LIMIT $reviewNewCount";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<div class='review'>";
            echo "<blockquote class='review-text'>";
            echo $row['message'];
            echo "</blockquote>";
            echo "<footer class='reviewer-name'>";
            echo $row['author'];
            echo "</footer>";
            echo "</div>";
        }

    }
    else{
        echo "There are no comments!";
    }
?>