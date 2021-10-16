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
      <p class="cat">
          Mis Ventas
      </p>
      <div>
      <div class="center">
        <br>
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
          ?>
           </div>
      <p class="cat">
        En proceso
      </p>

      <?php     
          session_start();
          $user = $_SESSION["sesion_user"];
          include("conection.php");
           $registros = $base->query("SELECT *FROM Compra WHERE estatus!='Entregado'")->fetchAll(PDO::FETCH_OBJ);
              foreach($registros as $Compras):
                
              //include("conection.php");
              $Libro = $base->query("SELECT *FROM Libro WHERE id = '$Compras->id_libro' AND propietario = '$user'")->fetchAll(PDO::FETCH_OBJ);
              foreach($Libro as $Pendiente):
                echo "<p class='libro'>";
              echo  $Compras->estatus."<br>";  
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($Pendiente->Contenido) . "'>";
          ?>
          <br>
            <?php
              echo $Pendiente->nombre."<br>";
            ?>
        </a>
          <?php
          echo $Pendiente->autor."<br>";
          echo $Pendiente->editorial."<br>";
          echo $Compras->coste." $<br>"; 
          echo $Compras->cliente."<br>"; 
          ?>
          <?php     
          echo "</p>";    
          endforeach;             
          endforeach;
         // include("libros.php");
          ?>
              <p class="cat">
          Finalizadas
      </p>

      <?php     
          session_start();
          $user = $_SESSION["sesion_user"];
          include("conection.php");
           $registros = $base->query("SELECT *FROM Compra WHERE estatus='Entregado'")->fetchAll(PDO::FETCH_OBJ);
              foreach($registros as $Compras):
                
              //include("conection.php");
              $Libro = $base->query("SELECT *FROM Libro WHERE id = '$Compras->id_libro' AND propietario = '$user'")->fetchAll(PDO::FETCH_OBJ);
              foreach($Libro as $Pendiente):
                echo "<p class='libro'>";
              echo  $Compras->estatus."<br>";  
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($Pendiente->Contenido) . "'>";
          ?>
          <br>
            <?php
              echo $Pendiente->nombre."<br>";
            ?>
        </a>
          <?php
          echo $Pendiente->autor."<br>";
          echo $Pendiente->editorial."<br>";
          echo $Compras->coste." $<br>"; 
          echo $Compras->cliente."<br>"; 
          ?>
          <?php     
          echo "</p>";    
          endforeach;             
          endforeach;
         // include("libros.php");
          ?>
      </div>
    </form>
    </body>
</html>