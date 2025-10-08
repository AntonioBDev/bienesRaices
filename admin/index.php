<?php
    // Importar la BD
    require '../includes/config/database.php';
    $db = conectarDB();

    //Escribir el query
    $query = "SELECT * FROM propiedades";

    //Consultar a la BD
    $resultadoConsulta = mysqli_query($db, $query);

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    // Incluye Template
    require '../includes/funciones.php';
    incluirTemplate('header');
    ?>
    <main class="contenedor seccion">
      <h1>Administrador de Bienes Raices</h1>
      <?php if(intval($resultado) === 1): ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
      <?php elseif(intval($resultado) === 2):?>
        <p class="alerta exito">Anuncio actualizado correctamente</p>
       <?php endif;?> 
      <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva propiedad</a>

      <!-- Mostrar tabla de propiedades -->
       <table class="propiedades">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Imagen</th>
              <th>Precio</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <!-- Moatrar los resultados de la base de datos -->
          <tbody>
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)):?>
            <tr>
              <th><?php echo $propiedad['id'];?></th>
              <th><?php echo $propiedad['titulo'];?></th>
              <th><img src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="" class="imagen-tabla"></th>
              <th><?php echo $propiedad['precio'];?></th>
              <th>
                <a href="#" class="boton-rojo-block">Eliminar</a>
                <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']?>" class="boton-amarillo-block">Actualizar</a>
              </th>
            </tr>
            <?php endwhile; ?>
          </tbody>
       </table>
    </main>
  <?php
    //cerrar la base de datos
    mysqli_close($db);
    incluirTemplate('footer');
    ?>
   