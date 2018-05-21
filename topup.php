<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "pageincludes/bootstrap-head.php";?>
    <script src="./js/sidenav.js"></script>
    <link rel="stylesheet" href="./css/custom-sidenav.css">

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $id = $_SESSION['id'];

        $sql = "SELECT * FROM ecomove.users WHERE id = '$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $row = $result->fetch_array(MYSQLI_ASSOC);

            $_SESSION['credit'] = $row['wallet'];
            $_SESSION['email'] = $row['email'];

        }

        $conn->close();
    ?>

    <script>

    </script>
</head>

<body>

    <!-- <?php include "pageincludes/nav.php";?> -->


    <?php include "pageincludes/sidenav.php";?>

    <div id="main">
        <h1 class="text-center logo-title mt-1 mb-5">EcoMotion</h1>

    <img src="./images/appPictures/paypal.png" class="img-paypal">
    <p class="text-center mb-0">Saldo actual: <?php echo $_SESSION['credit'] ?> €</p>

    </div>
    <div class="login-form mt-3">
        <form action="database/top-up.php" method="post">
        <?php
            if (isset($_GET["success"]) && $_GET["success"] == 'false') {
                echo '<div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        Contraseña erronea
                                    </div>';
            }
        ?>

            <div class="form-group text-center">
                <label for="recarga" class="text-center">Recarga</label>
                <input type="number" step="any" min="0" max="100" class="form-control text-center" name="recarga" placeholder="10.00€" required>
            </div>
            <hr>
            <div class="form-group">
                <p class="text-center"><?php echo $_SESSION['email'] ?></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control text-center" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Recargar Saldo</button>
        </form>
    </div>

    <p class="text-center">(*)Se realizará un cargo a la cuenta PayPal que tienes asociada a EcoMotion</p>


    <?php include "pageincludes/footer.php";?>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>

</html>