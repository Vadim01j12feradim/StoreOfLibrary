<!DOCTYPE html>
<html>
    <LINK REL=StyleSheet HREF="estilos1.css" TYPE="text/css" MEDIA=screen>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form action="" method="POST">
      <div>
      <p class="cat">
          Ventas
      </p>

      <?php 
          include("conection.php");
           $registros = $base->query("SELECT *FROM Compra")->fetchAll(PDO::FETCH_OBJ);
              foreach($registros as $Compras):
                
              //include("conection.php");
              $Libro = $base->query("SELECT *FROM Libro WHERE id = '$Compras->id_libro'")->fetchAll(PDO::FETCH_OBJ);
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
          $nextstatus = $Compras->estatus;
          switch($nextstatus){
                case 'Preparando tu paquete':
                  $nextstatus = "Paquete despachado";
                  break;
                case 'Paquete despachado':
                    $nextstatus = "En camino";
                    break;
                case 'En camino':
                    $nextstatus = "En el ultimo tramo";
                    break;
                case 'En camino':
                        $nextstatus = "En el ultimo tramo";
                        break;
                case 'En el ultimo tramo':
                          $nextstatus = "Esperando confirmacion";
                          break;
          }
          ?>         
           <a href="nextEstatus.php?id=<?php echo $Compras->id;?> &
                                    next=<?php echo $nextstatus?>">
          <input type="button" value="<?php echo $nextstatus?>" id="comprar">
        </a>
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