<?php
    include '../OptimisedGains/backend/connection.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../OptimisedGains/css/home.css">
    <link rel="stylesheet" href="../OptimisedGains/css/navbar.css">
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>


<script>
    //Jquery code
    $(document).ready(function(){
        var reviewCount = 1;
        $("#more-btn").click(function(){
            reviewCount += 1;
            $("#more").load("../OptimisedGains/backend/review.php", {
                reviewNewCount: reviewCount,


            });

        });
    });
</script>

<style>

</style>
<body>

    <?php include_once 'navbar.php' ?>

    <!-- landing page -->
    <div class="text">
        <h1>Welcome to Optimized Gains!</h1>
        <p>Discover the strength within you and embark on your fitness journey with us.</p>
    </div>


    <section class="landingp1">
        <div class="content">
            <div class="hook">
                <h2>Sound familiar ?</h2>
                <ul>
                    <li>"I dont have time to workout"</li>
                    <li>"I dont know where to start"</li>
                    <li>"I struggle staying committed"</li>
                    <li>"Ah my back is aching again"</li>
                    <li>"I want to get into hybrid training"</li>
                    <li>"I want to be a top athelete"</li>
                </ul>
                <h2>Optimized Gains may be just what you need !</h2>
            </div>
            <div class="image">
                <!-- Image or illustration placeholder -->
                <img src="../OptimisedGains/img/atgsplitsquat.png" alt="">

            </div>
        </div>

    </section>
        <div class="quote">“It is a shame to grow old without seeing the true beauty and strength of which the body is capable” - Socrates</div>

    <section class="landingp2">
        <div class="content">
            <h2>Our Community</h2>
            <p>Join a vibrant community of fitness enthusiasts supporting each other.</p>
        </div>
        <div class="reviews-container">
        <h1>Customer Reviews</h1>
        
        <div class="review">
            <blockquote class="review-text">"Before I came across this site i'd always struggle to find what fitness and dietary plan was for me. most plans on the internet involve a great deal of expenses and a plan that doesn't take into account variables such as height, weight, and even the amount of time an individual would have. With this site I've managed to achieve my dream of losing 30lbs, all while being able to excel at my job and in my college work. I'd urge anyone struggling to find a plan suited to their needs to give the Optimized Gains services a try."</blockquote>
            <footer class="reviewer-name">- Liam Cogley</footer>
        </div>

        <div class="review">
            <blockquote class="review-text">"A great source for workouts and nutritional advice, really helped me in my progress on bouldering and just getting stronger. With advice that is super applicable to anyone's routine and cross over to other fitness or sporting goals. Can't give it enough praise, Really recommend it."</blockquote>
            <footer class="reviewer-name">- Uros lee</footer>
        </div>

        <div class="review">
            <blockquote class="review-text">"OG helped me out a lot during my weight lose journey, gave me really good advice and good mentoring. Completely turned my life around !"</blockquote>
            <footer class="reviewer-name">- Jonathan Rivera</footer>
        </div>
        
        <!-- You can continue to add more review blocks here -->

        <div id="more">
            <?php 
                $sql = "SELECT * FROM comments LIMIT 1";
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
            
        </div>
        <button id="more-btn">Show more</button>
            
    </div>

    <!-- Additional content and footer -->
        <div class="quote">“The only bad workout is the one that didn't happen.”</div>
    </section>

    <section class="landingp3">
            <div class="services-container">
        <h1>Our Services</h1>
        <div class="service-table">
            <div class="service fitness-plan">
                <h2>Fitness Plan</h2>
                <ul>
                    <li>Weekly schedules</li>
                    <li>Understand the Science/logic behind the lifts</li>
                    <li>Form check</li>
                    <li>Videos showcasing the workouts</li>
                    <li>Data to track progress</li>
                </ul>
            </div>
            <div class="service nutrition-plan">
                <h2>Nutrition Plan</h2>
                <ul>
                    <li>Monthly Meal plans</li>
                    <li>Upload your own meals</li>
                    <li>Data to track your progress</li>
                    <li>Diving into the scientific literature</li>
                    <li>Detailed information regarding meal prep, fasting, how eating affects sleep and much more</li>
                </ul>
            </div>
            <div class="service lifestyle-plan">
                <h2>Lifestyle Plan</h2>
                <ul>
                    <li>Designed to promote big changes towards your physique, general physical and mental health and well being</li>
                    <li>Includes both fitness and nutrition plan + more</li>
                </ul>
            </div>
        </div>
        <a href="../OptimisedGains/log-signup.php" class="join-now-btn">JOIN NOW!</a>
    </div>

    <!-- Additional content and footer -->
        <div class="quote">“Your body can stand almost anything. It's your mind that you have to convince.”</div>
    </section>

    <!-- Additional content and footer -->

   
</body>
</html>


