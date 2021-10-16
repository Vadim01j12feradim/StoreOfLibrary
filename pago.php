<!DOCTYPE html>
<html>
    <LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form action="comprar.php" method="GET">
      <div class="center">
      <?php
      include("menu.php");
      
      $coste = $_GET["id"];
      include("conection.php");
      $Libro = $base->query("SELECT *FROM Libro WHERE id = '$coste'")->fetchAll(PDO::FETCH_OBJ);
      foreach($Libro as $Pendiente): 
      session_start();
      $user = $_SESSION["sesion_user"]; echo "<div class='infoped'>Tu pedido " . $user; ?>
      <br>
      Envio estandar <?php echo $Pendiente->precio. " $";?>
      <br>
      Envio express  <?php echo $Pendiente->precio + 100 . " $"."<div>";?>
          </div>
      <?php    
          echo "<p class='libro'>";
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
          echo $Pendiente->precio." $<br>";
          ?>
      </div>

      <br>
      <br>
      <div class="card">
        <div class="white">Paga con targeta</div>
      
      <br>
      <img src="chip.png"  class="chip" alt="targeta">
      <br>
      <div class="target">
        Propietario
        <input type="text"class="inta"  required >
        <br>
        Numero de targeta
        <input type="number"class="inta" required>
        <br> 
        Fecha de expiracion
        <input type="date"class="inta" required>
        <br>    
        CCV
        <input type="number"class="inta"  required>
        <input type="hidden" name="id" value=<?php echo $Pendiente->id?>  >
        
        <br>    
        <br>    

            <div class="target">
            <input type="submit" class="buttoncard" name="tipo" value="Envio estandar">          
            <input type="submit" class="buttoncard" name="tipo" value="Envio express">
          </div>
          </div>
          <div class="left"><img class="iconcard" src="mastercard.png" alt="">
          <img class="iconcard" src="visa.png" alt=""></div>
          </div>
       <br>
       <br>
       <divc class="center"></div>
       <div class="check">
       Paga en efectivo

       <img src="dinner.png" alt="El dinero es dinero" class="dinero">
       <br>
       <br>
       1._ Ve a tu OXXO mas cercano.
       <br>
       2._ Menciona al empleado que deseas hacer un pago de Vadim
       <br>
       3._ Dictale el siguiente codigo:
       <?php
       echo rand(0, 9999)." ".
       rand(0, 9999)." ".rand(0, 9999)." ".rand(0, 9999);
       ?>
       <br>
       <a href="comprar.php?id=<?php echo $Pendiente->id;?>&
                            tipo=Envio estandar">
            <input type="button" class="buttoncard" value="Envio estandar">
          </a>        
       <a href="comprar.php?id=<?php echo $Pendiente->id;?>&
                            tipo=Envio express">
            <input type="button" class="buttoncard" value="Envio express">
          </a>
        <?php                    
          endforeach;?>
        </div>
    </form>
    </body>
</html>