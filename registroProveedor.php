<!doctype html>
<html lang="en">
  <head>
    <title>Alta de proveedor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <form action="" method="POST">
          <table border="5" style="margin: 0 auto;">
          <tr>
                  <td colspan="2" style="text-align: center;"><h2>ALTA DE PROVEEDOR</h2></td>
              </tr>  
              <tr>          
                  <td><label>Razon social</label></td><td><input type="text" name="razonsocial" id="razonsocial"></td>
              </tr>
              <tr>
                  <td><label>Direccion</label></td><td><input type="text" id="direccion" name="direccion"></td>
              </tr>
              <tr>
                  <td><label>Calidad</label></td><td><select name="calidad" id="calidad">
                      <option value="alta">alta</option>
                      <option value="media">media</option>
                      <option value="baja">baja</option>
                  </select></td>
              </tr>
              <tr>
                  <td colspan="2" style="text-align: center;"><input name="crear" class="btn btn-primary" type="submit" id="crear" value="REGISTRAR"></td>
              </tr>
          </table>
      </form>

      <?php
        if (isset ($_POST ["crear"])){
            $raz = $_POST ["razonsocial"];
            $dir = $_POST["direccion"];
            $cal = $_POST ["calidad"];
            include ("conexion.php");

                $sql = "INSERT INTO proveedor (razonsocial, direccion, calidad) VALUES ('$raz', '$dir', '$cal')";
                $res = mysqli_query ($con, $sql);

                if ($res){
                    echo "<p>registro exitoso</p>";
                    echo "<p><a href=menuprincipal.php>VOLVER</a></p>";
                    
                }

        }
      ?>
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>