  <?php 
    //Importar la conexion 
    require 'includes/config/database.php';
    $db = conectarDB();

    //Consultar
    $query = "SELECT * FROM propiedades LIMIT {$limite}";

    //Obtener consulta
    $resultado = mysqli_query($db, $query);


  ?>
  <div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
        <div class="anuncio">
            <img loading="lazy" src="<?php echo "imagenes/".$propiedad['imagen']?>" alt="Anuncio 1">
          <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']?></h3>
            <p><?php echo $propiedad['descripcion']?></p>
            <p class="precio">$<?php echo $propiedad['precio']?></p>
            <ul class="iconos-caracteristicas">
              <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                <p><?php echo $propiedad['wc']?></p>
              </li>
              <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                <p><?php echo $propiedad['estacionamiento']?></p>
              </li>
              <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio">
                <p><?php echo $propiedad['habitacion']?></p>
              </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Ver propiedad</a>
          </div>
        </div><!--anuncio--> 
        <?php endwhile;?>
      </div><!--contenedor-anuncios-->

      <?php 
      //Cerrar Sesion 
      mysqli_close($db);
      ?>