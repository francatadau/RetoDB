<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Paises</title>
  </head>
  <body>
    <?php
    $conector = new mysqli("localhost", "root", "", "world");
    if ($conector->connect_errno) {
        echo "Fallo al conectar a MySQL: " .$conector->connect_error;
        }else {
          //Asignamos los $_POST a unas variables
          $continente=$_POST["continente"];
          $surfacearea=$_POST["superficie"];

          //hacemos la query
          $consulta="SELECT * FROM country WHERE SurfaceArea >= $surfacearea AND Continent='".$continente."' ORDER BY SurfaceArea ASC";
          ?>
          <h2>Continente</h2>
          <?php
          echo "<b>Continente:</b> ".$_POST["continente"]."<br>";
          echo "<b>Superficie:</b> ".$_POST["superficie"]."<br>";
          echo "<br>";
          echo "<hr>";
            ?>
          <h2>Paises</h2>
          <?php
          $consulta = $conector->query($consulta);
          foreach ($consulta as $fila) {
            echo "<b>El pais</b>: ".$fila['Name'];
            echo "<br>";
            echo "<b>Su superficie es:</b> ".$fila['SurfaceArea'];
            echo "<br>";
            echo "<br>";
            }
          }
    ?>
  </body>
</html>
