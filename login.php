    <?php   
        require 'includes/funciones.php';
        incluirTemplate('header');
    ?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Iniciar Sesión</h1>
      <form action="" class="formulario">
         <fieldset >
            <legend>Ingresa tu Correo y contraseña</legend>
          <label for="email">E-mail</label>
          <input type="email" placeholder="Tu correo electronico" id="email">
          
          <label for="password">Password</label>
          <input type="password" placeholder="Tu contraseña" id="password">
        </fieldset>
        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
      </form>
    </main>
    <?php
        incluirTemplate('footer'); 
    ?>
   