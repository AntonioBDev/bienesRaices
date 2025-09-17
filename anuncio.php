<?php 
      require 'includes/funciones.php';
      incluirTemplate('header');
    ?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Casa en venta frente al bosque</h1>
      <picture>
        <source srcset="build/img/anuncio1.webp" type="image/webp">
        <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
        <img src="build/img/anuncio1.jpg" alt="anuncio 1">
      </picture>
      <div class="resumen-texto">
          <p class="precio">$3,000,00</p>
           <ul class="iconos-caracteristicas">
                  <li>
                    <img
                      loading="lazy"
                      src="build/img/icono_wc.svg"
                      alt="Icono wc"
                    />
                    <p>3</p>
                  </li>
                  <li>
                    <img
                      loading="lazy"
                      src="build/img/icono_estacionamiento.svg"
                      alt="Icono estacionamiento"
                    />
                    <p>3</p>
                  </li>
                  <li>
                    <img
                      loading="lazy"
                      src="build/img/icono_dormitorio.svg"
                      alt="Icono dormitorio"
                    />
                    <p>4</p>
                  </li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum repellat similique fugit voluptatibus! Impedit, mollitia! Ea similique accusamus, culpa aliquam quos, eveniet maiores repudiandae nihil vel non laboriosam dicta optio.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rerum exercitationem aliquam soluta quis dolores voluptatibus voluptatem ad, in praesentium magnam illo, nostrum quos culpa. Placeat quaerat omnis esse in! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis eligendi sed voluptatibus. Dolores libero maiores deleniti deserunt eligendi explicabo ad. Exercitationem, debitis quidem perferendis quis eaque nesciunt? Corporis, in perspiciatis.</p>
      </div>
    </main>

     <?php 
      incluirTemplate('footer');
    ?>
    