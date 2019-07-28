<?php
    require_once('autoload.php');

    $preguntas = Consulta::listar('faqs', $pdo);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer_css.css">

  <link href="header.html" rel="import" />
  <title>Preguntas Frecuentes</title>
</head>

<body>
  <?php require("header.php"); ?>
  <div class="container">
    <h1 style="margin-top:65px;">Preguntas Frecuentes</h1>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <ul>
          <h5 class="mb-0">
            <?php foreach($preguntas as $pregunta): ?>
            <li>
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
              aria-controls="collapseOne">
              <?= $pregunta['question']?>
            </button>
            </li>
            <?php endforeach;?>
          </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            Comprar en Deco House 860 es muy fácil y seguro. A continuación te brindamos algunos datos importantes que
            pueden ayudarte al momento de realizar tu compra.
            <br>
            <br>
             En primer lugar, tenés que registrarte en nuestro sitio.
            <br>
             Elegí tu producto y hacé click en Comprar.
            <br>
             Luego de agregar un producto al carrito de compras podés continuar comprando y sumar otros productos.
            <br>
             Por útimo, seleccioná el método de pago y envio y hace click en Finalizar compra.
          </div>
        </div>
      </div>
      </ul>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
              aria-expanded="false" aria-controls="collapseTwo">
              ¿Cómo creo una cuenta en Deco Home 860?
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            Para registrarte en Deco Home seguí los siguientes pasos:
            <br>

             Crea tu cuenta haciendo click aquí
            <br>
             Hacé click en Ingresá.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
              aria-expanded="false" aria-controls="collapseThree">
              ¿Necesito consultar el stock de un producto?
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            Te informamos que cada producto publicado en Deco Home 869 cuenta con su stock actualizado. Si tu
            producto hoy no tiene stock disponible, te recomendamos que verifiques nuevamente en unos días, ya que
            nuestro stock depende de los proveedores, las marcas y las temporadas, por lo cual no podemos confirmar
            un plazo especifico de reposición.

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFour">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
              aria-expanded="false" aria-controls="collapseFour">
              ¿Es seguro comprar en Deco Home 860?
            </button>
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body">
            SITIO SEGURO
            <br>
            Comprar en Dafiti es cómodo, fácil y seguro. Trabajamos con los más altos estándares de seguridad y toda la
            información ingresada en nuestro sitio se mantiene de forma estrictamente confidencial.
            <br>
            <br>
            ¿QUÉ DATOS SOLICITAMOS?
            <br>
            Sólo te pedimos que ingreses información necesaria para el pago y envío de tu compra.
            <br>
            <br>
            ¿ES SEGURO COMPRAR EN DECO HOME?

            <br>
            Para garantizar la seguridad en los pagos usamos la tecnología SPS de DECIDIR, perteneciente a Equifax Veraz
            y Mercadopago.
            <br>
            <br>
            Importante: Deco Home 860 NO conserva la información de tu tarjeta de crédito.
          </div>
        </div>
      </div>


    </div>
  </div>

  <?php require("footer.php"); ?>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>
