
<?php

    require 'database/config.ini.php';

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    

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

    $active = 0;

    $sql = "SELECT * FROM trip_details WHERE status = 'active'";

  if ($result = mysqli_query($conn, $sql)) {

      $active = mysqli_num_rows($result);

      // while ($row = mysqli_fetch_assoc($result)) {
      //     $wallet += $row['wallet'];
      // }
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $finished = 0;

    $sql = "SELECT * FROM trip_details WHERE status = 'finished'";

  if ($result = mysqli_query($conn, $sql)) {

      $finished = mysqli_num_rows($result);

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
      <td><?php echo $finished ?></td>
    </tr>
     <tr>
      <th scope="row">Viajes planificados</th>
      <td><?php echo $active ?></td>
    </tr>
    <tr>
      <th scope="row">Cartera total</th>
      <td><?php echo $wallet ?> €</td>
    </tr>
  </tbody>
</table>