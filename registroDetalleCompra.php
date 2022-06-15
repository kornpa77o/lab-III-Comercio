<!doctype html>
<html lang="en">
  <head>
    <title>Seleccion de Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="JS\jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="JS\comercio.js"></script>
  </head>
  <body>
    <?php
     include ("conexion.php");
     $sql = "SELECT MAX(cod_compra) FROM compra";
     $res = mysqli_query ($con, $sql);
     $vec = mysqli_fetch_array ($res);

     $sql2 = "SELECT P.cod_producto, P.nombre FROM producto P";
     $res2 = mysqli_query ($con, $sql2);
    ?>
  <form action="" method="POST">
          <table border="5" style="margin: 0 auto;">
          <tr>
                  <td colspan="2" style="text-align: center;"><h2>SELECCION DE PRODUCTO</h2></td>
              </tr>  
              <tr>          
                  <td><label>Producto</label></td><td><select name="cod_producto" id="cod_producto">
                  <?php
                        while ($vec2 = mysqli_fetch_array($res2)){
                            echo "<option value=$vec2[0]>$vec2[1]</option>";

                        }
                      ?>
                  </select></td>
              </tr>
              <tr>
                  <td><label>Cantidad a comprar: </label></td><td><input type="number" name="cantidad" id="cantidad"></td>
              </tr>
              <tr>
                  <td colspan="2" style="text-align: center;"><input name="crear" class="btn btn-primary" type="submit" id="registrodetallecompra" value="REGISTRAR"></td>
              </tr>
          </table>
      </form>

      <?php
        if (isset($_POST["crear"])){
            include ("conexion.php");
            $codcomp = $vec[0];
            $codprod = $_POST ["cod_producto"];
            $cant = $_POST["cantidad"];

            $sql5 = "SELECT P.punitario, P.stock FROM producto P WHERE P.cod_producto = $codprod";
            $res5 = mysqli_query ($con, $sql5);
            $vec5 = mysqli_fetch_array ($res5);
            $punit = $vec5[0];
            $stock = $vec5[1];

            if ($stock<$cant){
                echo"<p>No hay stock suficiente";
            }
            else {
    
                $sql3 = "INSERT INTO detallecompra (cod_compra, cod_producto, cantidad) VALUES ($codcomp, $codprod, $cant)";
                $res3 = mysqli_query ($con,$sql3);
                
                $sql4 = "SELECT C.total, C.formapago FROM compra C, detallecompra D WHERE C.cod_compra = $codcomp AND D.cod_compra = $codcomp";
                $res4 = mysqli_query($con,$sql4);
                $vec4 = mysqli_fetch_array ($res4);
                $total = $vec4[0];
                $forma = $vec4[1];
                if ($forma == "tarjeta"){
                    $subtotal = $cant*$punit;
                    $subtotal = $subtotal+($subtotal*0.05);
                    $total = $total + $subtotal;
                }
                else {
                    $subtotal = $cant*$punit;
                    $subtotal = $subtotal-($subtotal*0.10);
                    $total = $total + $subtotal;
                }

                $sql7 = "UPDATE compra SET total = $total WHERE cod_compra = $codcomp";
                $res7 = mysqli_query ($con,$sql7);

                $resto = $stock - $cant;

                $sql6 = "UPDATE producto SET stock = $resto WHERE cod_producto = $codprod";
                $res6 = mysqli_query ($con,$sql6);

                if ($res6){
                    echo "<p> REGISTRO EXITOSO </p>
                          <p> TOTAL: $total </p>
                          <p><a href= 'registroDetalleCompra.php'>Agregar otro producto</a></p>'";
                    echo "<p><a href=menuprincipal.php>VOLVER</a></p>";
                }
            }

        }
      ?>
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>