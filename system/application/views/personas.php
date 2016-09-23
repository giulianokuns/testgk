<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div >
        <div class="row">
            <div class="col-md-5">
                <br>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <form class="form-group" action="http://localhost/GK/test/index.php/personas" method="POST"><br>
                    <button name="cerrar" id="cerrar" type="submit" class="btn btn-primary">Cerrar sesión</button><br>
                    <h3><?= $tituloAgr ?></h3>
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control" >
                    <input type="text" name="apellido" placeholder="Apellido" class="form-control">
                    <input type="text" name="ci" placeholder="Documento de identidad" maxlength="8" class="form-control"><!-- type text para poner los puntos y guiones-->
                    <input type="text" name="tel" placeholder="Teléfono" class="form-control">
                    <input type="password" name="pass" placeholder="Contraseña" class="form-control">
                    <div class="form-group">
                        <select name="actividad" class="form-control">
                            <!--<option value="select" >Seleccione un estado</option>-->
                            <optgroup label="Estado">
                                    <option value="activo" >Activo</option>
                                    <option value="no_activo">No activo</option>
                            </optgroup>
                        </select>
                    </div>
                    <button name="agregar" id="agregar" type="submit" class="btn btn-primary">Agregar</button>
                    <button name="listar" id="listar" type="submit" class="btn btn-primary">Listar personas</button>
                </form>    
            </div>            
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script  src="../public/js/personas.js"></script>
</body>
</html>