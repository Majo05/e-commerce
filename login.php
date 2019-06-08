  </<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="css/login_css.css">
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="css/footer_css.css">
  		<title>DECO HOUSE 860</title>
      <title></title>
    </head>
    <body>


  			<!-- header -->
  			<header>

        	 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        		  <a class="navbar-brand" href="#"><img src="images/logoDH860-01.png" class="logo"></a>
        		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        		    <span class="navbar-toggler-icon"></span>
        		  </button>
        		  <div class="collapse navbar-collapse" id="navbarNav">
        		    <ul class="navbar-nav nav-contenido ml-auto"><!-- ml-auto genera margen izquierdo HASTA DONDE PUEDA -->
        		      <li class="nav-item">
        		        <a class="nav-link" href="#">Home<span class="sr-only"></span></a>
        		      </li>
        		      <li class="nav-item">
        		        <a class="nav-link" href="register.php">Registro</a>
        		      </li>
        		      <li class="nav-item">
        		        <a class="nav-link" href="login.php">Login</a>
        		      </li>
        		      <li class="nav-item">
        		        <a class="nav-link" href="frecuentes.php">FAQ</a>
        		      </li>
        		    </ul>
        		  </div>
        		</nav>

  			</header>


        <div class="login-reg-panel">
        		<div class="register-info-box">
        			<h2 class="login-reg">No tienes una cuenta?</h2>
        			<p class="login-reg">Registrate aquí!</p>
        			<input class="login-botonReg" type="button" onclick="window.open('register.php')" value="Registrarse">
        		</div>

        		<div class="white-panel">
        			<div class="login-show">
        				<h2 class="login-title">LOGIN</h2>
        				<input class="login-campos" type="text" placeholder="Email">
        				<input class="login-campos" type="password" placeholder="Password">
        				<input class="login-boton" type="button" value="Login">
        				<a class= "login-msj" href="">¿Olvidaste tu contraseña?</a>
        			</div>
        		</div>
        	</div>
    </body>
  </html>
