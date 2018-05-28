
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="./home.php">Home</a>
    <a href="./topup.php">Recargar saldo</a>
    <a href="./newCar.php">Nuevo coche</a>
    <a href="#" data-toggle="modal" data-target="#exampleModal">Cerrar sesión</a>
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