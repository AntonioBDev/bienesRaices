    <?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
    ?>

    <main class="contenedor seccion">
      <h2>Mas sobre nosotros</h2>
      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono seguridad"
            loading="lazy" />
          <h3>Seguridad</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur
            totam ipsam quia, quam quae vel aperiam nisi temporibus laboriosam
            tempora cupiditate similique inventore reprehenderit hic provident
            corporis exercitationem enim sint.
          </p>
        </div>
        <!--Icono-->
        <div class="icono">
          <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy" />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur
            totam ipsam quia, quam quae vel aperiam nisi temporibus laboriosam
            tempora cupiditate similique inventore reprehenderit hic provident
            corporis exercitationem enim sint.
          </p>
        </div>
        <!--Icono-->
        <div class="icono">
          <img
            src="build/img/icono3.svg"
            alt="Icono tiempo"
            loading="lazy" />
          <h3>A tiempo</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur
            totam ipsam quia, quam quae vel aperiam nisi temporibus laboriosam
            tempora cupiditate similique inventore reprehenderit hic provident
            corporis exercitationem enim sint.
          </p>
        </div>
        <!--Icono-->
      </div>
      <!--Iconos-->
    </main>

    <section class="seccion contenedor">
      <h2>Casa y depas en venta</h2>
      <!-- incluir seccion de anuncios  -->
       <?php 
       $limite = 3;
       include 'includes/templates/anuncios.php'
       ?>
      <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver todas</a>
      </div><!--Boton alinear-derecha-->
    </section><!--contenido-anuncios-->
    <section class="imagen-contacto">
      <h2>Encuentra la casa de tus sueños</h2>
      <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
      <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section><!--Contenido-contacto-->

    <div class="contenedor seccion seccion-inferior">
      <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
          <div class="image">
            <picture>
              <source srcset="build/img/blog1.webp" type="imagen/webp">
              <source srcset="build/img/blog1.jpg" type="imagen/jpeg">
              <img src="build/img/blog1.jpg" alt="Blog 1">
            </picture>
          </div><!--imagen-->
          <div class="texto-entrada">
            <a href="entrada.php">
              <h4>Terraza en el techo de tu casa</h4>
              <p>Escrito el: <span>20/10/2025</span> Por: <span>Admin</span></p>
              <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrar dinero</p>
            </a>
          </div><!--texto-blog-->
        </article><!--entrada-blog-->
        <article class="entrada-blog">
          <div class="image">
            <picture>
              <source srcset="build/img/blog2.webp" type="imagen/webp">
              <source srcset="build/img/blog2.jpg" type="imagen/jpeg">
              <img src="build/img/blog2.jpg" alt="Blog 2">
            </picture>
          </div><!--imagen-->
          <div class="texto-entrada">
            <a href="entrada.php">
              <h4>Guía para la decoración de tu hogar</h4>
              <p>Escrito el: <span>20/10/2025</span> Por: <span>Admin</span></p>
              <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida tu espacio.</p>
            </a>
          </div><!--texto-blog-->
        </article><!--entrada-blog-->
      </section><!--contenido-blog-->

      <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
          <blockquote>
            El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
          </blockquote>
          <p>-Moiis</p>
        </div>
      </section>
    </div>

    <?php
    incluirTemplate('footer');
    ?>