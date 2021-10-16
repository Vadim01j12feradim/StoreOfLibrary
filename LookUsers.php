<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>
<style>
</style>
<title></title>
</head>
<body>
    <form action="" method="POST">
  <nav id="menuvarra">
    <ul>
      <li><input type="image" name = "home" src="amazon.png" width="52px" height="52px"></li>
      <li><a href="#"><img src="libros.png" class="icon">
        Categorias</a>
      <ul>
        <li><a href="#">
          <img src="pistola.png" class="icon">
            <br></br>Accion</a></li>
        <li><a href="#"><br>
          <img src="me-gusta.png" class="icon"></br>
          <br></br>Romance</a></li>
      </ul>
      </li>

    </ul>
    </nav><div class="line">
      <input name="searched" type="text" placeholder="Nombre del libro" class="der">
      <a href="index.php">
        <input type="image" class="icon" src="search.png">
        </a>
        <a href="compras.php">
        <img src="comp.png" width="52px" height="52px">
      </a>
      </div>
      

      <?php
      include("conection.php");
      if(($_POST["searched"])){
        $busqueda = $_POST["searched"];      
        $registros = $base->query("SELECT *FROM Cliente WHERE username = '$busqueda'")->fetchAll(PDO::FETCH_OBJ);      
        $busqueda =  "Resultados para " . $busqueda;  
      }
      else{
        $registros = $base->query("SELECT *FROM Cliente")->fetchAll(PDO::FETCH_OBJ);   
        $busqueda =  "Usuarios"; 
      }
      ?>
      <br>
      <p class="cat">
        <?php echo $busqueda?>  
      </p>
    <br>
      <div>     
          <?php
              foreach($registros as $users):
              echo "<p class='libro'>";
              echo "<a href='#'>";
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($users->Contenido) . "'>";
          ?>
          <br>
            <?php
              echo $users->nombre."<br>";
            ?>
        </a>
          <?php
          echo $users->ape1."<br>";
          echo $users->ape2."<br>";
          echo $users->$username."<br>";
          ?>
          <input type="submit" class="comprar" value="Editar" >
          <input type="submit" class="comprar" value="Borrar" >
          <input type="submit" class="comprar" value="Inspeccionar">
          <?php                           
          endforeach;
          ?>
      </div>
    </form>
<?php

?>
    </body>

</html>



