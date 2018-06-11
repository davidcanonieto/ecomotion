

<!doctype html>
<html lang="en">

<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
	<?php include("database/find_trips.php"); ?>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./js/maps-return-api.js"></script>

    
</head>

<body>

    <?php include "pageincludes/sidenav.php";?>

	<div id="main" class="container">
        <div id="trips" class="row">
             
        </div>
	</div>

    <?php include("pageincludes/bootstrap-body.php"); ?>

    <script>
        var data =  <?php echo $tripsJson ?>;
        getData(data);
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA&callback=initMap">
    </script>

    <?php include "pageincludes/footer.php";?>



</body>

</html>
