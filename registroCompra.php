<!doctype html>
<html lang="en">
  <head>
    <title>Alta de compra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="JS\jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="JS\comercio.js"></script>
  </head>
  <body>
  <?php
      include("conexion.php");
      $sql = "SELECT C.cod_cliente, C.nomyape FROM cliente C";
      $res = mysqli_query ($con,$sql);
      ?>
  <form action="" method="POST">
          <table border="5" style="margin: 0 auto;">
          <tr>
                  <td colspan="2" style="text-align: center;"><h2>ALTA DE COMPRA</h2></td>
              </tr>  
              <tr>          
                  <td><label>Fecha de compra</label></td><td><input type="date" name="fecha" id="fecha"></td>
              </tr>
              <tr>
                  <td><label>Forma de pago</label></td><td><select name="formapago" id="formapago">
                      <option value="tarjeta">Tarjeta</option>
                      <option value="efectivo">Efectivo</option>
                  </select></td>
              </tr>
              <tr>
                  <td><label>Cliente</label></td><td><select name="cod_cliente" id="cod_cliente">
                      <?php
                        while ($vec = mysqli_fetch_array($res)){
                            echo "<option value=$vec[0]>$vec[1]</option>";

                        }
                      ?>
                  </select></td>
              </tr>
              <tr>
                  <td colspan="2" style="text-align: center;"><input name="crear" class="btn btn-primary" type="submit" id="registrocompra" value="REGISTRAR"></td>
              </tr>
          </table>
      </form>

      <?php
      if (isset($_POST["crear"])){
        $fecha = $_POST["fecha"];
        $forma = $_POST["formapago"];
        $codcliente = $_POST ["cod_cliente"];
        include("conexion.php");

        $sql = "INSERT INTO compra (fecha, formapago, cod_cliente) VALUES ('$fecha', '$forma', $codcliente)";
        $res = mysqli_query ($con, $sql);

        if ($res){
            echo "<p> REGISTRO EXITOSO </p>
                  <p><a href='registroDetalleCompra.php'>Seleccion de producto</a></p>";
        }

      }
      ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>