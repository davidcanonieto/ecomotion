
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="./home.php"><i class="material-icons">home</i> Home</a>
    <a href="./topup.php"><i class="material-icons">payment</i> Recargar saldo</a>
    <a href="./withdraw.php"><i class="material-icons">attach_money</i> Retirar saldo</a>
    <a href="./myTrips.php"><i class="material-icons">directions_car</i> Mis viajes</a>
    <a href="./preferences.php"><i class="material-icons">settings</i> Ajustes</a>
    <!-- <a href="./newCar.php"><i class="material-icons">directions_car</i> Nuevo coche</a> -->
    <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">close</i> Cerrar sesión</a>
</div>

<span onclick="openNav()" class="menu-button">&#9776;</span>
<div id="overlay"></div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Ya te vas?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Te vamos a echar de menos :(
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeNav()">Cancelar</button>
        <a href="./database/close-session.php" class="btn btn-primary">Cerrar sesión</a>
      </div>
    </div>
  </div>
</div>