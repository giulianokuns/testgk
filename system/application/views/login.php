<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<body>
    <? if (isset($error_pass)) :?>
        <div class='alert alert-danger'>Usuario y/o contraseña incorrectos</div>
    <? endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                 <form class="form-group" action="http://localhost/GK/test/index.php/personas/login" method="POST">
                    <h3>Login</h3>
                    <input type="text" name="username" placeholder="Nombre" class="form-control" >
                    <input type="password" name="pass_log"  placeholder="Contraseña" class="form-control">
                    <button name="ingresar" id="ingresar" type="submit" class="btn btn-primary" >Ingresar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>