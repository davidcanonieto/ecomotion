

<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <?php include "pageincludes/bootstrap-head.php";?>
    <?php include("database/find_trips.php"); ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./js/maps-return-api.js"></script>
</head>

<body>

    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="mdl-layout__header dark-primary-color">
            <div class="mdl-layout__header-row dark-primary-color">
                <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button dark-primary-color text-white">
                    <i class="material-icons"></i>
                </div>
                <a href="./home.php" class="back-home-button">
					<i class="material-icons text-white">home</i>
				</a>
            </div>
        </header>
        <div class="demo-drawer mdl-layout__drawer default-primary-color">
            <header class=" default-primary-color pt-5">
                <div class=" default-primary-color">
                    <div 
                        class="profile-picture-background" 
                        style="background-image: url(./images/profilePictures/<?php echo $_SESSION['profileImage']?>)">
                    </div>
                </div>
                <p class="mt-4 text-center text-white font-weight-bold" default-primary-color>
                    <?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?>
                </p>
            </header>
            <nav class="demo-navigation mdl-navigation bg-primary-color">
                <?php include "pageincludes/sidenav.php";?>
            </nav>
        </div>
        <main class="mdl-layout__content ">
            <div class="mdl-grid demo-content">
                <div class="mdl-cell mdl-cell--12-col">
                    <h1 class="text-center logo-title mt-2 ">EcoMotion</h1>
                </div>
                <div class="mdl-cell mdl-cell--12-col ">
                    <div id="main" class="container">
                        <div id="trips" class="row">

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        var data =  <?php echo $tripsJson; ?>;
        getData(data);
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA&callback=initMap">
    </script>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>

</html>