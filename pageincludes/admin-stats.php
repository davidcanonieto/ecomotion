
<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecomove";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $users = 0;
    $wallet = 0;

    $sql = "SELECT * FROM users";

    if ($result = mysqli_query($conn, $sql)) {

        $users = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $wallet += $row['wallet'];
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $trips = 0;

    $sql = "SELECT * FROM trip_details";

    if ($result = mysqli_query($conn, $sql)) {

        $trips = mysqli_num_rows($result);

        // while ($row = mysqli_fetch_assoc($result)) {
        //     $wallet += $row['wallet'];
        // }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $cars = 0;

    $sql = "SELECT * FROM cars";

    if ($result = mysqli_query($conn, $sql)) {

        $cars = mysqli_num_rows($result);

        // while ($row = mysqli_fetch_assoc($result)) {
        //     $wallet += $row['wallet'];
        // }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>


<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th colspan="2" scope="col" class="text-center">Estadísticas</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Usuarios activos</th>
      <td><?php echo $users ?></td>
    </tr>
    <tr>
      <th scope="row">Pilotos</th>
      <td><?php echo $cars ?></td>
    </tr>
    <tr>
      <th scope="row">Viajes totales</th>
      <td><?php echo $trips ?></td>
    </tr>
     <tr>
      <th scope="row">Viajes realizados</th>
      <td></td>
    </tr>
     <tr>
      <th scope="row">Viajes planificados</th>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Cartera total</th>
      <td><?php echo $wallet ?> €</td>
    </tr>
  </tbody>
</table>