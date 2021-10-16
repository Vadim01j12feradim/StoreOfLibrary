<!DOCTYPE html>
<html>
    <LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form action="" method="POST">
      
      <?php
      include("menu.php");
      session_start();
      $user = $_SESSION["sesion_user"];
      include("conection.php");
        $registros = $base->query("SELECT *FROM Cliente WHERE username = '$user'")->fetchAll(PDO::FETCH_OBJ);   
      ?>
      <div>
          <div class="center">
          <?php
              foreach($registros as $user):
              echo "<p class='perl'>";
              echo "<img class='imgp' src='data:image/jpeg; base64,". base64_encode($user->Contenido) . "'>";
          ?>
          <br>
             
          <?php
          echo $user->nombre."<br>";
          echo $user->ape1."<br>";
          echo $user->ape2."<br><br>";
          echo $user->username."<br>";
          endforeach;
          ?> </div>
      <p class="cat">
          Mis libros
      </p>
          <div class="center">
      <?php     
          session_start();
          $user = $_SESSION["sesion_user"];
          include("conection.php");
          $activ = "Activo";
          $registros = $base->query("SELECT *FROM Libro WHERE propietario = '$user' and estatus = '$activ'")->fetchAll(PDO::FETCH_OBJ);
          foreach($registros as $Mio):
              echo "<p class='libro'>";
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($Mio->Contenido) . "'>";
              echo  "<br>" . $Mio->nombre."<br>";  
              echo  $Mio->autor."<br>";    
              echo  $Mio->editorial."<br>";  
              echo  $Mio->precio." $<br>";      
          ?>
          <a href="DropBook.php?id=<?php echo $Mio->id;?>">
            <input type="button" class="comprar" value="Borrar">
          </a>
          <?php
          endforeach;
          ?>
          <p class='libro'>
          <a href="register.php">
          <img class='libro' src="addl.png">

          </a>
          <br>
          </p>
      </div>
        </div>
    </form>
    </body>
</html>