<?php
require_once("helpers.php");
require_once("controladores/funciones.php");
require_once("autoload.php");
$usuarioRegistrado = false;

$tipoDoc = Array(
    Array( 'id' => 1, 'type' => 'DNI'),
    Array( 'id' => 2, 'type' => 'Pasaporte'),
    Array( 'id' => 3, 'type' => 'Libreta Civica')
);
///Consulta::listar('doctype', $pdo);

if($_POST){
  $errores = validar($_POST, $_FILES);



    if(count($errores)== 0){

    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $avatar = armarAvatar($_FILES);
    $doctype_id = isset($_POST['doctype_id']) ? $_POST['doctype_id'] : null;
    $nroDoc = isset($_POST['nroDoc']) ? $_POST['nroDoc'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $address = isset($_POST['address']) ? $_POST['address'] : null;

    // Role: user
    $role_id = 2;

    $usuario = new Usuario($name, $lastname, $email, $password, $avatar, $doctype_id, $nroDoc, $phone, $address, $role_id);
    Consulta::guardarUsuario($usuario, $pdo);
    $usuarioRegistrado = true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer_css.css">
    <title>Registrate</title>
</head>
<body>
    <?php require("header.php"); ?>
    <br><br><br><br>
    <div class="container min-height" >


            <h1>Registro</h1>
<?php if ($usuarioRegistrado) :?>
  <div class="mt-5 pt-5 pb-5 mb-5 text-center fondo-mensaje" role="alert">
    <strong>Felicidades!</strong> Tu cuenta se ha registrado con éxito.
    <br>

    Para comenzar, <a href="login.php">inicia sesión</a>
  </div>
<?php else: ?>
    <form action="" method="POST" enctype= "multipart/form-data">
        <div class="form-group">
            <label for="exampleInputName">Nombre</label>

            <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="name"
            placeholder="Escribe tu nombre" value="<?= isset($errores["name"])? "": persistir("name") ?>">
            <small class="form-text text-danger"><?= isset($errores["name"])? $errores["name"] : "";?></small>
            <small id="name" class="form-text text-muted"></small>

        </div>
        <div class="form-group">
            <label for="exampleInputName">Apellido</label>

            <input name="lastname" type="text" class="form-control" id="exampleInputName" aria-describedby="lastname"
            placeholder="Escribe tu apellido" value="<?= isset($errores["lastname"])? "": persistir("lastname") ?>">
            <small class="form-text text-danger"><?= isset($errores["lastname"])? $errores["lastname"] : "";?></small>
            <small id="lastname" class="form-text text-muted"></small>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Correo Electronico</label>
            <input name="email" type="email" value="<?= isset($errores["email"])? "": persistir("email") ?>" class="form-control" id="exampleInputEmail1" aria-describedby="email"
            placeholder="Escribe tu email">
            <small class="form-text text-danger"><?= isset($errores["email"])? $errores["email"] : "";?></small>
            <small id="email" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
                        <label for="nombre">Tipo Documento</label>
                        <select class="form-control" name="doctype_id" id="doctype_id">
                            <option value="" selected>Seleccione Categoria</option>
                            <?php foreach($tipoDoc as $documento): ?>
                            <option value="<?= $documento['id']?>"><?= $documento['type']?></option>
                            <?php endforeach;?>
                        </select>
                        <small class="form-text text-danger"><?= isset($errores["doctype_id"])? $errores["doctype_id"] : "";?></small>
            <small id="doctype_id" class="form-text text-muted"></small>
                    </div>

        <div class="form-group">
            <label for="exampleInputName">Número de Documento</label>

            <input name="nroDoc" type="text" class="form-control" id="exampleInputName" aria-describedby="nroDoc"
            placeholder="Escribe tu Numero de Documento" value="<?= isset($errores["nroDoc"])? "": persistir("nroDoc") ?>">
            <small class="form-text text-danger"><?= isset($errores["nroDoc"])? $errores["nroDoc"] : "";?></small>
            <small id="nroDoc" class="form-text text-muted"></small>

        </div>

        <div class="form-group">
            <label for="exampleInputName">Telefono</label>

            <input name="phone" type="text" class="form-control" id="exampleInputName" aria-describedby="phone"
            placeholder="Escribe tu Telefono anteponiendo código de área y sin guiones" value="<?= isset($errores["phone"])? "": persistir("phone") ?>">
            <small class="form-text text-danger"><?= isset($errores["phone"])? $errores["phone"] : "";?></small>
            <small id="phone" class="form-text text-muted"></small>

        </div>

        <div class="form-group">
            <label for="exampleInputName">Direccion</label>

            <input name="address" type="text" class="form-control" id="exampleInputName" aria-describedby="address"
            placeholder="Escribe tu direccion" value="<?= isset($errores["address"])? "": persistir("address") ?>">
            <small class="form-text text-danger"><?= isset($errores["address"])? $errores["address"] : "";?></small>
            <small id="address" class="form-text text-muted"></small>

        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input name="password" type="password"  class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
            <small class="form-text text-danger"><?= isset($errores["password"])? $errores["password"] : "";?></small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Repetir Contraseña</label>
            <input name="repassword" type="password"  class="form-control" id="exampleInputPassword1" placeholder="Reescriba su contraseña">
            <small class="form-text text-danger"><?= isset($errores["repassword"])? $errores["repassword"] : "";?></small>
        </div>

        <div class="form-group">
            <label for="exampleInputName">Imagen</label>

            <input name="avatar" type="file" class="form-control" id="exampleInputName" aria-describedby="avatar"
            placeholder="Selecciona una imagen" value="<?= isset($errores["avatar"])? "": persistir("avatar") ?>">
            <small class="form-text text-danger"><?= isset($errores["avatar"])? $errores["avatar"] : "";?></small>
            <small id="avatar" class="form-text text-muted"></small>

        </div>

            <button type="submit" class="btn btn-primary">Registrar</button>

    </form>
<?php endif; ?>


</div>
<br>
<br>
<br>

<?php require("footer.php"); ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
