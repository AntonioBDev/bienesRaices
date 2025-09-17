<?php 
      require 'includes/funciones.php';
      incluirTemplate('header');
    ?>


    <main class="contenedor seccion contenido-centrado">
      <h1>Casa en venta frente al bosque</h1>
      <picture>
          <source srcset="build/img/destacada2.webp" type="image/webp">
          <source srcset="build/img/destacada2.jpg" type="image/jpeg">
          <img src="build/img/destacada2.jpg" alt="destacada 2">
        </picture>
    <p class="informacion-meta">Escrito el: <span>20/10/2025</span> Por: <span>Admin</span></p>
      <div class="resumen-texto">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum repellat similique fugit voluptatibus! Impedit, mollitia! Ea similique accusamus, culpa aliquam quos, eveniet maiores repudiandae nihil vel non laboriosam dicta optio.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rerum exercitationem aliquam soluta quis dolores voluptatibus voluptatem ad, in praesentium magnam illo, nostrum quos culpa. Placeat quaerat omnis esse in! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis eligendi sed voluptatibus. Dolores libero maiores deleniti deserunt eligendi explicabo ad. Exercitationem, debitis quidem perferendis quis eaque nesciunt? Corporis, in perspiciatis.</p>
      </div>
    </main>

   <?php 
      incluirTemplate('footer');
    ?>