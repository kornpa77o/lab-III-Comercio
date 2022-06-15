<!doctype html>
<html lang="en">
  <head>
    <title>Alta de producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="JS\jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="JS\comercio.js"></script>
  </head>
  <body>
      <?php
      include("conexion.php");
      $sql = "SELECT P.cod_proveedor, P.razonsocial FROM proveedor P";
      $res = mysqli_query ($con,$sql);
      ?>
  <form action="" method="POST">
          <table border="5" style="margin: 0 auto;">
          <tr>
                  <td colspan="2" style="text-align: center;"><h2>ALTA DE PRODUCTO</h2></td>
              </tr>  
              <tr>          
                  <td><label>Nombre del producto</label></td><td><input type="text" name="nombre" id="nombre"></td>
              </tr>
              <tr>
                  <td><label>Precio Unitario</label></td><td><input type="number" id="punitario" name="punitario"></td>
              </tr>
              <tr>
                  <td><label>Categoria</label></td><td><select name="categoria" id="categoria">
                      <option value="computacion">Computacion</option>
                      <option value="deporte">deporte</option>
                      <option value="muebles">muebles</option>
                      <option value="libreria">libreria</option>
                  </select></td>
              </tr>
              <tr>
                  <td><label>Stock </label></td><td><input type="number" id="stock" name="stock"></td>
              </tr>
              <tr>
                  <td><label>Proveedor</label></td><td><select name="cod_proveedor" id="cod_proveedor">
                      <?php
                        while ($vec = mysqli_fetch_array($res)){
                            echo "<option value=$vec[0]>$vec[1]</option>";

                        }
                      ?>
                  </select></td>
              </tr>
              <tr>
                  <td colspan="2" style="text-align: center;"><input name="crear" class="btn btn-primary" type="submit" id="registroproducto" value="REGISTRAR"></td>
              </tr>
          </table>
      </form>

      <?php
        if (isset ($_POST ["crear"])){
            $nom = $_POST ["nombre"];
            $puni = $_POST["punitario"];
            $cat = $_POST["categoria"];
            $stock =$_POST ["stock"];
            $prov = $_POST["cod_proveedor"];
            if ($stock != ""){
                include ("conexion.php");
                    $sql = "INSERT INTO producto (nombre, punitario, categoria, stock, cod_proveedor) VALUES ('$nom', $puni, '$cat', $stock, $prov)";
                    $res = mysqli_query ($con, $sql);
                    if ($res){
                        echo "<p>registro exitoso</p>";
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