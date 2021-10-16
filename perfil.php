<!DOCTYPE html>
<html>
    <LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form action="" method="GET">
      <?php
      include("menu.php");
      session_start();
      $user = $_SESSION["sesion_user"];
      include("conection.php");
        $registros = $base->query("SELECT *FROM Cliente WHERE username = '$user'")->fetchAll(PDO::FETCH_OBJ);   
      ?>
      <br>
      <p class="cat">
          Mis compras  
      </p>
    <br>
      <div>
          
          <?php
              foreach($registros as $user):
              echo "<p class='libro'>";
              echo "<img class='imglibro' src='data:image/jpeg; base64,". base64_encode($user->Contenido) . "'>";
          ?>
          <br>
          <?php
          echo $user->nombre."<br>";
          echo $user->ape1."<br>";
          echo $user->ape2."<br><br>";
          echo $user->username."<br>";
          endforeach;
          ?>
      <p class="cat">
          Sin entregar 
      </p>

      <?php     
          session_start();
          $user = $_SESSION["sesion_user"];
          include("conection.php");
           $registros = $base->query("SELECT *FROM Compra WHERE cliente = '$user' AND estatus!='Entregado'")->fetchAll(PDO::FETCH_OBJ);
              foreach($registros as $Compras):
                echo "<p class='libro'>";
              //include("conection.php");
              $Libro = $base->query("SELECT *FROM Libro WHERE id = '$Compras->id_libro'")->fetchAll(PDO::FETCH_OBJ);
              foreach($Libro as $Pendiente):
              
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
          if($Compras->estatus == "Entregado")
                $conf = "Entregado";
          else 
                $conf = "Confirmar entrega";
                $con = "Entregado";
          ?>
        <a href="nextEstatus.php?id=<?php echo $Compras->id;?> &
                                 con=<?php echo $con;?>">
          <input type="button" value="<?php echo $conf; ?>" id="comprar">
        </a>
          <?php    
          endforeach;
          echo "</p>";                 
          endforeach;
          ?>   
      </div>
      <p class="cat">
          Historial de compras
      </p>
      <?php     
          session_start();
          $user = $_SESSION["sesion_user"];
          include("conection.php");
           $registros = $base->query("SELECT *FROM Compra WHERE cliente = '$user' AND estatus='Entregado'")->fetchAll(PDO::FETCH_OBJ);
              foreach($registros as $Compras):
                echo "<p class='libro'>";
              //include("conection.php");
              $Libro = $base->query("SELECT *FROM Libro WHERE id = '$Compras->id_libro'")->fetchAll(PDO::FETCH_OBJ);
              foreach($Libro as $Pendiente):
              
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
          if($Compras->estatus == "Entregado")
                $conf = "Entregado";
          else 
                $conf = "Confirmar entrega";
                $con = "Entregado";
          ?>
        <a href="nextEstatus.php?id=<?php echo $Compras->id;?> &
                                 con=<?php echo $con;?>">
          <input type="button" value="<?php echo $conf; ?>" id="comprar">
        </a>
          <?php    
          endforeach;
          echo "</p>";                 
          endforeach;
          ?>   
    </form>
    </body>
</html>