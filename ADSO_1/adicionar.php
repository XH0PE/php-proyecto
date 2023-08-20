<!-- Modal Adicionar -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-floppy-disk"></i> Ingresar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="inserir.php" method="post" class="form-signin">
        <input type="text" class="form-control" placeholder="Nombre" name="Nombre" required autofocus>
        <input type="email" class="form-control" placeholder="e-mail" name="email" required>
        <input type="number" class="form-control" placeholder="telefono" name="telefono" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa-solid fa-floppy-disk"></i> Ingresar Usuario</button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Adicionar -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body class="text-center">
    
<?php require 'config.php';

if(isset($_POST['Nombre']) && empty ($_POST['Nombre']) == false) {

    $Nombre = addslashes($_POST['Nombre']);
    $email = addslashes($_POST['email']);
    $telefono = addslashes($_POST['telefono']);

    $insertarusuario = "INSERT INTO usuarios SET Nombre = '$Nombre', email = '$email', telefono = '$telefono'";
    $pdo->query($insertarusuario);

    header("Location: index.php");
}
?>
<form method="post" class="form-signin">
        <input type="text" class="form-control" placeholder="Nombre" name="Nombre" required autofocus>
        <input type="email" class="form-control" placeholder="e-mail" name="email" required>
        <input type="number" class="form-control" placeholder="telefono" name="telefono" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa-solid fa-floppy-disk"></i> Registrar nuevo usuario</button>
        <p class="mt-5 mb-3 text-muted">&copy; </p>
        </form>

</body>
</html>