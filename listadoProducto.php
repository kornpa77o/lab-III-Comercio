<!doctype html>
<html lang="en">
  <head>
    <title>Listsado de productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <h1 style="text-align: center;">LISTADO DE PRODUCTO</h1>
    <?php
    include ("conexion.php");
    $sql = "SELECT P.*, PR.razonsocial FROM producto P, proveedor PR WHERE P.cod_proveedor = PR.cod_proveedor";
    $res = mysqli_query ($con, $sql)
    ?>
    <table border="5">
        <tr>
            <th>CODIGO DE PRODUCTO</th>
            <th>NOMBRE</th>
            <th>PRECIO UNITARIO</th>
            <th>CATEGORIA</th>
            <th>STOCK</th>
            <th>PROVEEDOR</th>
            <th>MODIFICAR</th>
            <th>ELIMINAR</th>
        </tr>
        <tr>
            <?php while ($vec = mysqli_fetch_array ($res)) {
                echo "<tr>
                      <td>$vec[0]</td>
                      <td>$vec[1]</td> 
                      <td>$$vec[2]</td>
                      <td>$vec[3]</td>
                      <td>$vec[4]</td>   
                      <td>$vec[6]</td>   
                      <td><a href='modificarCliente.php?cod=$vec[0]'>Modificar</td>
                      <td><a href='eliminarCliente.php?cod=$vec[0]'>Eliminar</td>
                      </tr>";
                };
            ?>
        </tr>
    </table>  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>