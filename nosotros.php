   <?php 
      require 'includes/funciones.php';
      incluirTemplate('header');
    ?>
    <main class="contenedor seccion">
      <h1>Conoce sobre nosotros</h1>
      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp">
            <source srcset="build/img/nosotros.jpg" type="image/jpeg">
            <img src="build/img/nosotros.jpg" alt="Imagen de nosotros">
          </picture>  
        </div>
        <div class="texto-nosotros">
          <blockquote>25 años de experiencia</blockquote><!--Para sitar textos-->
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum eius recusandae quaerat? Dignissimos ex autem, veritatis hic ipsam mollitia sapiente porro distinctio impedit. Optio beatae ut quibusdam blanditiis velit. Magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam praesentium facilis cum id enim facere vero dignissimos? Id, suscipit ratione neque eveniet fuga ullam quam, soluta aspernatur quae perspiciatis eius!</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto rerum sunt ipsam pariatur molestias expedita quis neque esse? Aut hic quod, vel delectus non officia optio dolorem praesentium eos deleniti!</p>
        </div>
      </div>
    </main>

    <section class="contenedor seccion">
      <h2>Más sobre nosotros</h2>
      <div class="iconos-nosotros">
        <div class="icono">
          <img src="build/img/icono1.svg" alt="">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quidem ad iste natus quasi, sequi doloribus dolore rem exercitationem, officia eveniet enim, perspiciatis accusamus nostrum sunt. Quisquam commodi dolores earum?</p>
        </div>

        <div class="icono">
          <img src="build/img/icono2.svg" alt="">
            <h3>El mejor precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quidem ad iste natus quasi, sequi doloribus dolore rem exercitationem, officia eveniet enim, perspiciatis accusamus nostrum sunt. Quisquam commodi dolores earum?</p>
        </div>

        <div class="icono">
          <img src="build/img/icono3.svg" alt="">
            <h3>A tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quidem ad iste natus quasi, sequi doloribus dolore rem exercitationem, officia eveniet enim, perspiciatis accusamus nostrum sunt. Quisquam commodi dolores earum?</p>
        </div>
      </div>
    </section>
 <?php 
      incluirTemplate('footer');
    ?>

