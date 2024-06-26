<?php
    session_start();

?>
        <script>
            causeRepaintsOn = $("h1, h2, h3, p");

            $(window).resize(function() {
                causeRepaintsOn.css("z-index", 1);
            });

            $(document).ready(function() {
                $('#menu-btn').click(function() {
                    $('.links').toggleClass('show');
                });
            });

            
        </script>
    
        <nav class="navbar">

            <div class="logo">
                <a href="../OptimisedGains/home.php" id="desk-view">
                    <img src="../OptimisedGains/svg/svgexport-og.svg" alt="OG">
                </a>
                <a href="../OptimisedGains/home.php" id="mobile-view">
                    <img src="../OptimisedGains/svg/svgexport-og-pic.svg" alt="OG">
                </a>
                <button class="menu-icon icon" id="menu-btn"></button>
                <!-- <i class="menu-icon icon" id="menu-btn"></i> -->
            </div>

            <!-- Navigation -->
            <ul class="links" id="nav-links">
                <li class="main" id="m1"><a href="../OptimisedGains/gallery.php"><i class="gallery-icon icon"></i>Gallery</a></li>
                <li class="main" id="m2"><a href="../OptimisedGains/community.php"><i class="community-icon icon"></i>Community</a></li>
                <li class="main" id="m3"><a href="../OptimisedGains/services.php"><i class="service-icon icon"></i>Services</a>
                    <ul class="dd1">
                        <li class="service"><a href="../OptimisedGains/nutriplan.php">Nutrition</a></li>
                        <li class="service"><a href="../OptimisedGains/fitplan.php">Fitness</a></li>
                        <li class="service"><a href="../OptimisedGains/lifeplan.php">Lifestyle</a></li>
                    </ul>
                </li>
                <?php
                    if(isset($_SESSION["userid"])){
                        echo "<li class='main' id='m4'><a href='../OptimisedGains/account.php'><i class ='account-icon icon'></i>Account</a></li>";
                    }
                    else{
                        echo "<li class='main' id='m4'><a href='../OptimisedGains/signup.php'><i class='account-icon icon'></i>Sign/login</a></li>";
                    }

                ?>
                
                
                <li class="main" id="m5"><a href="../OptimisedGains/shop.php"><i class="shop-icon icon"></i>Shop</a></li>
            </ul>

        </nav>
    