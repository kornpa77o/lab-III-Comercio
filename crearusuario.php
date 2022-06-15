<!doctype html>
<html lang="en">
  <head>
    <title>Crear usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="JS\jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="JS\comercio.js"></script>
  </head>
  <body>
      <form action="" method="POST">
          <table border="5" style="margin: 0 auto;">
          <tr>
                  <td colspan="2" style="text-align: center;"><h2>CREAR USUARIO</h2></td>
              </tr>  
              <tr>          
                  <td><label>Usuario</label></td><td><input type="text" name="usuario" id="usuario"></td>
              </tr>
              <tr>
                  <td><label>Contraseña</label></td><td><input type="password" id="password" name="password"></td>
              </tr>
              <tr>
                  <td><label>Repetir contraseña</label></td><td><input type="password" id="password2" name="password2"></td>
              </tr>
              <tr>
                  <td colspan="2" style="text-align: center;"><input name="crear" class="btn btn-primary" type="submit" id="crear" value="REGISTRAR"></td>
              </tr>
          </table>
      </form>
      
<?php
  if (isset($_POST["crear"])){
            include ("conexion.php");
            $usuario = $_POST ["usuario"];
            $pass = $_POST ["password"];

            if ($usuario != "" && $pass != ""){
                $sql1 = "SELECT U.user FROM usuario U WHERE U.user = '$usuario'";
                $res1 = mysqli_query ($con,$sql1);
                $can = mysqli_num_rows ($res1);
                
                if ($can>0){
                    echo " <p style=text-align:center;> Ya existe un usuario con ese nombre </p> ";
                }
                else {
                    $sql = "INSERT INTO usuario (user, pass) VALUES ('$usuario','$pass')";
                    $res = mysqli_query ($con,$sql);
                    if ($res){
                        echo "<p style=text-align:center;> Usuario creado </p>
                              <p style=text-align:center;> <a href='main.php'>Iniciar sesion</a></p>";
                    }
                }
            }

        }
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>