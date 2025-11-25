<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Blog</h1>
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
        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> Por: <span>Admin</span></p>
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
        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> Por: <span>Admin</span></p>
        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida tu espacio.</p>
      </a>
    </div><!--texto-blog-->
  </article><!--entrada-blog-->
  <article class="entrada-blog">
    <div class="image">
      <picture>
        <source srcset="build/img/blog3.webp" type="imagen/webp">
        <source srcset="build/img/blog3.jpg" type="imagen/jpeg">
        <img src="build/img/blog3.jpg" alt="Blog 3">
      </picture>
    </div><!--imagen-->
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Terraza en el techo de tu casa</h4>
        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> Por: <span>Admin</span></p>
        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida tu espacio.</p>
      </a>
    </div><!--texto-blog-->
  </article><!--entrada-blog-->
  <article class="entrada-blog">
    <div class="image">
      <picture>
        <source srcset="build/img/blog4.webp" type="imagen/webp">
        <source srcset="build/img/blog4.jpg" type="imagen/jpeg">
        <img src="build/img/blog4.jpg" alt="Blog 4">
      </picture>
    </div><!--imagen-->
    <div class="texto-entrada">
      <a href="entrada.php">
        <h4>Guía para la decoración de tu hogar</h4>
        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> Por: <span>Admin</span></p>
        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida tu espacio.</p>
      </a>
    </div><!--texto-blog-->
  </article><!--entrada-blog-->
</main>

<?php
incluirTemplate('footer');
?>