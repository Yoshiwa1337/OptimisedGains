<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../OptimisedGains/css/gallery.css">
    <link rel="stylesheet" href="../OptimisedGains/css/navbar.css">
    <script src="https://kit.fontawesome.com/4ff0141430.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script>
        $(document).ready(function(){

            $("input").keyup(function(){
                var search = $("input").val();
                $.post("backend/suggestions.php", {
                    suggestion: search
                }, function(data, status){
                    $("#suggest").html(data)

                });
            });

        });
        

    </script>

</head>
<body>
    
    <?php include 'navbar.php' ?>


    <!-- gallery -->
    <div class="content">
        <div class="search-bar">
            <div class="bar">
                <input type="text" name="search" id="exercises" placeholder="Search">

            </div>
            <button class="search-icon"></button>
        </div>
        <p id="suggest"></p>

        <div class="gallery">
            <div class="exercise-box1 box">
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
            </div>

            <div class="exercise-box2 box">
                <h2>Heading2</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>

            <div class="exercise-box3 box">
                <h2>Heading3</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>
                </div>
            </div>


            <div class="exercise-box4 box">
                <h2>Heading4</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>

            <div class="exercise-box5 box">
                <h2>Heading5</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>


            <div class="exercise-box6 box">
                <h2>Heading6</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>


            <div class="exercise-box7 box">
                <h2>Heading7</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>

            <div class="exercise-box8 box">
                <h2>Heading8</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>

            <div class="exercise-box9 box">
                <h2>Heading9</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>

            <div class="exercise-box10 box">
                <h2>Heading10</h2>
                <video src="../OptimisedGains/vids/y2mate.is - RDL Progression-Q-f6YDyKHPc-720p-1702046605.mp4" controls></video>
                <div class="info">
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <i class="star-icon icon"></i>
                    <a href="#"><i class="save-icon icon"></i></a>
                    <p>Strength</p>
                    <p>Flexibility</p>

                </div>
            </div>

        </div>



    </div>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="../OptimisedGains/js/autocomplete.js"></script>
   
</body>
</html>
