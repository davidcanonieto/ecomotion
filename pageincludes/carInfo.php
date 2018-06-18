<?php


$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



    $id = $_SESSION['id'];

    $sql = "SELECT * FROM possessions WHERE id = '$id'";

    if ($result = mysqli_query($conn,$sql)) {

        $row = mysqli_fetch_assoc($result);
        
        $plate = $row['license_plate'];
        
        $sql1 = "SELECT * FROM cars WHERE license_plate = '$plate'";


        if ($result1 = mysqli_query($conn, $sql1)) {

            $row1 = mysqli_fetch_assoc($result1);

            $maker = $row1['maker'];
            $model = $row1['model'];
            $year = $row1['year'];
            $seats = $row1['seats'];
            $picture = $row1['picture'];

            switch ($row1['cat_code']) {
                case 1:
                $cat = 'Eléctrico';
                    break;
                case 2:
                $cat = 'Híbrido';
                    break;
                case 3:
                $cat = 'Gasolina';
                    break;
                case 4:
                $cat = 'Diesel';
            }


        } else {
            echo $conn->error;
        }

    }
    else {
        echo  $conn->error;
    }
    
    
?>

<div>
    <h3>Tu coche</h3>
    <img src="./images/carPictures/<?php echo $picture;?>" class="img-car-info mb-3">
    <table class="table table-width">
        <tbody>
            <tr>
                <th scope="row">Marca</th>
                <td><?php echo $maker;?></td>
            </tr>
            <tr>
                <th scope="row">Modelo</th>
                <td><?php echo $model;?></td>

            </tr>
            <tr>
                <th scope="row">Categoría</th>
                <td><?php echo $cat;?></td>
            </tr>
            <tr>
                <th scope="row">Año</th>
                <td><?php echo $year;?></td>
            </tr>
            <tr>
                <th scope="row">Asientos</th>
                <td><?php echo intval($seats) + 1;?></td>
            </tr>
        </tbody>
    </table>
</div>

<a href="./database/deleteCar.php" class="btn btn-danger mb-4">Borrar coche</a>