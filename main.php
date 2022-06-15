<!doctype html>
<html lang="en">
  <head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <h1 style="text-align: center;">INGRESAR</h1>
      <form action="" method="POST">
      <table border="5" style="text-align: center; margin: 0 auto;">
          <tbody>
              <tr>
                  <td colspan="2" style="text-align: center;"><h2>Iniciar sesion</h2></td>
              </tr>  
              <tr>          
                  <td><label>Usuario</label></td><td><input type="text" name="usuario"></td>
              </tr>
              <tr>
                  <td><label>Contraseña</label></td><td><input type="password" name="password"></td>
              </tr>
              <tr>
                  <td colspan="2"><input name="ingresar" class="btn btn-primary" type="submit" value="Ingresar"></td>
              </tr>
              <tr>
                  <td colspan="2">Si no cuenta con usuario ingrese <a href="crearusuario.php">aqui</a></td>
              </tr>
          </tbody>
      </table>
      </form>
      <?php
        if (isset($_POST ["ingresar"])){
            include ("conexion.php");
            $us = $_POST ["usuario"];
            $pass = $_POST ["password"];
            $sql = "SELECT U.* FROM usuario U WHERE U.user = '$us' AND U.pass = '$pass'";
            $res = mysqli_query($con, $sql);
            $can = mysqli_num_rows($res);

            if ($can>0){
                header ("Location: menuprincipal.php");
            }

            else {
                echo "<p style=text-align:center;> Contraseña incorrecta </p>";
            }
        }


      ?>
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>