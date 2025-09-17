<?php 
      require 'includes/funciones.php';
      incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
      <h1>Contacto</h1>
      <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="destacado 3">
      </picture>
      <h2>Llene el fomrulario de contacto</h2>

      <form action="" class="formulario">
        <fieldset>
          <legend>Informacion personal</legend>
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Tu nombre" id="nombre">

          <label for="email">E-mail</label>
          <input type="email" placeholder="Tu correo electronico" id="email">
          
          <label for="tel">Telefono</label>
          <input type="tel" placeholder="Tu telefono" id="tel">

          <label for="mensaje">Mensaje</label>
          <textarea name="" id="mensaje"></textarea>
        </fieldset>

        <fieldset>
          <legend>Informacion sobre propiedad</legend>
          <label for="opciones">Vende o compra</label>
          <select name="" id="opciones">
            <option value="" disabled selected>--seleccione--</option>
            <option value="vende">Vende</option>
            <option value="compra">Compra</option>
          </select>

          <label for="">Cantidad</label>
          <input type="number">
        </fieldset>

        <fieldset>
          <legend>Contacto</legend>
          <p>Como desea ser contactado</p>
          <div class="forma-contacto">
            <label for="contactar-telefono">Telefono</label>
            <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

            <label for="contactar-email">E-mail</label>
            <input name="contacto" type="radio" value="email" id="contactar-email">
          </div>

          <p>Si eligio telefono, elija la fecha y hora</p>
          <label for="fecha">Fecha</label>
          <input type="date" id="fecha">
          <label for="hora">Hora</label>
          <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
      </form>
    </main>
     <?php 
      incluirTemplate('footer');
    ?>

