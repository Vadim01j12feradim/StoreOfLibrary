<meta charset = "utf-8">
<LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>
<style>
</style>
<title></title>
</head>
<body>
    <form action="" method="POST">
<div class="line">

    <a href="libros.php" >
          <img src="amazon.png" class="compd" ></li>
          </a>
          <a href="mislibros.php" >
          <img src="baul.png" class="compd"></li>

          <a href="perfil.php">
            <img src="comp.png" class="compi">
          </a>
          </a>
          <a href="MyVents.php">
            <img src="vent.png" class="compi">
          </a>
          <a href="index.php">
            <input type="image" class="compi"src="search.png">
            </a>
      <input name="searched" type="text" placeholder="Nombre del libro" class="compt">        
      </div>
      <?php
      include("conection.php");
      if(($_POST["searched"])){
        $busqueda = $_POST["searched"];      
        $registros = $base->query("SELECT *FROM Libro WHERE nombre = '$busqueda'")->fetchAll(PDO::FETCH_OBJ);      
        $busqueda =  "Estos son los resultados para la busqueda " . $busqueda;  
        echo "<p class='cat'>
        <?php echo $busqueda?>
      ";   
      echo $busqueda ."</p>";  
      }
      ?>
      <br>
    <br>
      <div>
          <?php
            foreach($registros as $Libros):
              session_start();
              $user = $_SESSION["sesion_user"];
              $error = $base->query("UPDATE Cliente SET ult_libro='$Libros->categoria' WHERE username ='$user'");
              echo "<p class='libro'>";
              echo "<a href='#'>";
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($Libros->Contenido) . "'>";
          ?>
          <br>
            <?php
              echo $Libros->nombre."<br>";
            ?>
        </a>
          <?php
          echo $Libros->autor."<br>";
          echo $Libros->editorial."<br>";
          echo $Libros->precio." $<br>";
          ?>
          <input type="submit" class="comprar" value="Comprar" id="comprar">
          <?php                           
          endforeach;
          ?>
      </div>
    </form>
</body>

</html>