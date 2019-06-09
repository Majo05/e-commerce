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
  		<?php require("header.php"); ?>
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
