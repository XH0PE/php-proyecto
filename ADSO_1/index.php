<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ususarios</title>
</head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<body>
    
    <?php require 'config.php'; ?>

    <div class="container-fluid">
        <div class="col-md-12 mb-2 mt-2">
            <div class="row justify-content-center">
            <i class="fa-solid fa-floppy-disk"></i>
                <button class="btn btn-primary " data-toggle='modal' data-target='#exampleModal'><i class="fa-solid fa-circle-plus"></i>Adicionar nuevo usuario</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table mt -10" id='tabla'>
                    <thead>
                        <tr>
                        <i class="fa-solid fa-floppy-disk"></i>
                            <th scope='col'>Nombre</th>
                            <i class="fa-solid fa-floppy-disk"></i>
                            <th scope='col'>E-mail</th>
                            <i class="fa-solid fa-floppy-disk"></i>
                            <th scope='col'>Telefono</th>
                            <i class="fa-solid fa-floppy-disk"></i>
                            <th scope='col'>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php 
    $listarusuarios = 'SELECT * FROM usuarios ORDER BY id DESC';
    $listarusuarios = $pdo->query($listarusuarios);

    if ($listarusuarios->rowCont() > 0) {
        foreach ($listarusuarios->fetchAll() as $usuario){
            echo '<tr>';
            echo '<td>'.$usuario['Nombre'].'</td>';
            echo '<td>'.$usuario['email'].'</td>';
            echo '<td>'.$usuario['telefono'].'</td>';
            echo '<td><button class="btn btn-primary" data-toggle="modal" data-target="#modal2'.$usuario['id']>'"> <i class="fa-solid fa-pen-to-square"></i> Editar</button></td>
            <a href="excluir.php?id='.$usuario['id'].'"><button onclick="return confirm(\'Esta seguro que desea eliminar?\);" type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Eliminar</button></a>';
            echo '<tr>';

            echo '<!-- Modal Editar -->

<!-- Modal Editar -->
<div class="modal fade" id="modal2'.$usuario['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Editar usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="editar.php" method="post" class="form-signin">
        <input id="id" class="form-control" value="'.$usuario['id'].'" name="id" type="hidden">
        <input type="text" class="form-control" placeholder="Nombre" name="Nombre" value="'.$usuario['Nombre'].'" required autofocus>
        <input type="email" class="form-control" placeholder="e-mail" name="email" value="'.$usuario['email'].'" required>
        <input type="number" class="form-control" placeholder="telefono" name="telefono" value="'.$usuario['telefono'].'" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar datos</button>
        </form>
      </div>
    </div>
  </div>
</div>';

        }
    }
    
    ?>

    <script>
        var tabla = document.querySelector("#tabla")
        var datatable = new DataTable(tabla)
    </script>
    
</body>
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a38bca9d9c.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</html>