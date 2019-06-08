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

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="#"><img src="images/logoDH860-01.png" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav nav-contenido ml-auto"><!-- ml-auto genera margen izquierdo HASTA DONDE PUEDA -->
                    <li class="nav-item active">
                      <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Registro</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="frecuentes.php">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="frecuentes.php" tabindex="-1" aria-disabled="true">FAQ</a>
                    </li>
                  </ul>
                </div>
              </nav>
          
            </header>
            <br>
            <br>
            <br>
            <br>
    <div class="container">
            <h1>Registro</h1>

    <form>
        <div class="form-group">
            <label for="exampleInputName">Nombre y Apellido</label>
            <input type="name" class="form-control" id="exampleInputName" aria-describedby="NombreyApellido" 
            placeholder="Escribe tu nombre y apellido" required>
            <small id="NombreyApellido" class="form-text text-muted"></small> 
        </div>   
        <div class="form-group">
            <label for="exampleInputEmail1">Correo Electronico</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
            placeholder="Escribe tu email"required>
            <small id="emailHelp" class="form-text text-muted"></small> 
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required> 
        </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        
    </form>
</div>
<br>
<br>
<br>

<footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
        <div class="padre">
            <div class=""><span class="Mensaje">La mejor solución para tu diseño interior DecoHome860.</span></div>
            <div class="col"><a class="social-inner" href="#"><img src="images/facebook.png"><span>@DecoHome860</span></a></div>
            <div class="col"><a class="social-inner" href="#"><img src="images/instagram.png"><span>@DecoHome860</span></a></div>
            <div class="col"><a class="social-inner" href="#"><img src="images/twitter.png"><span>@DecoHome860</span></a></div>
        </div>
</footer>
</body>
</html>