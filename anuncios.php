<?php 
      require 'includes/funciones.php';
      incluirTemplate('header');
    ?>
    <main class="contenedor seccion">
      <h1>Casas y depas en venta</h1>
      <?php 
       $limite = 100;
       include 'includes/templates/anuncios.php'
       ?>
    </main>

     <?php 
      incluirTemplate('footer');
    ?>
  
