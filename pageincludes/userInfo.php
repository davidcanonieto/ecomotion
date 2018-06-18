<?php

function getAge($then)
{
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if (strtotime('+' . $age . ' years', $then_ts) > time()) {
        $age--;
    }

    return $age;
}

require 'database/config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = '$id'";

if ($result = mysqli_query($conn, $sql)) {

    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $years = getAge($row['birthdate']);
    $wallet = $row['wallet'];

} else {
    echo $conn->error;
}

?>

<h3>Tu perfil</h3>
<!-- <div class="mt-5">
    <div class="image-cropper">
        <img src="./images/profilePictures/<?php echo $_SESSION['profileImage']?>" class="rounded user-image" />
    </div>
</div> -->

<div 
    class="profile-picture-background" 
    style="background-image: url(./images/profilePictures/<?php echo $_SESSION['profileImage']?>)">
</div>

<p class="mt-2">
    <?php echo $name; ?>
    <?php echo $lastname; ?>,
    <?php echo $years; ?>
</p>

<a class="mb-5 pb-5" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Ver detalles
    <br>
    <i class="material-icons">
        keyboard_arrow_down
    </i>
</a>

<div class="collapse pb-5" id="collapseExample">
    <div>
        <table class="table table-width">
            <tbody>
                <tr>
                    <th scope="row">Nombre:</th>
                    <td>
                        <?php echo $name; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Apellidos:</th>
                    <td>
                        <?php echo $lastname; ?>
                    </td>

                </tr>
                <tr>
                    <th scope="row">Email:</th>
                    <td>
                        <?php echo $email; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Nacimiento:</th>
                    <td>
                        <?php echo $years; ?> años</td>
                </tr>
                <tr>
                    <th scope="row">Saldo:</th>
                    <td>
                        <?php echo $wallet; ?> €</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newPicture">
        Cambiar foto de perfil
    </button>
</div>