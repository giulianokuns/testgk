<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <h3><?= $titulo ?></h3>
        <input type="button" value="Volver" onclick="window.location.href='http://localhost/GK/test/index.php/personas'" 
        class="btn btn-primary">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento de identidad</th>
                    <th>Teléfono</th>
                    <th>Actividad</th>
                </tr>
            </thead> 
            <? foreach ($resultado as $row): ?>
            <tr>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['apellido'] ?></td>
                <td><?= $row['ci'] ?></td>
                <td><?= $row['tel'] ?></td>
                <td id="activity_td">
                    <? if ($row['activo']): ?>
                        <button class="activePerson btn btn-success" name="activar" id="activar" value="<?= $row['activo'] ?>" data-ci="<?= $row['ci'] ?>">Cambiar actividad</button>
                    <? else: ?>
                        <button class="activePerson btn btn-danger" name="desactivar" id="desactivar" value="<?= $row['activo'] ?>" data-ci="<?= $row['ci'] ?>">Cambiar actividad</button>
                    <? endif; ?>
                </td>
            </tr>
            <? endforeach ?>
        </table>
        <br>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script  src="../public/js/personas.js"></script>

</body>
</html>