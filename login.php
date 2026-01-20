    <?php
    // Conexion a la base de datos
    require 'includes/app.php';
    $db = conectarDB();

    $errores = [];
    //Autenticar el usuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
      $password = mysqli_real_escape_string($db, $_POST['password']);

      if (!$email) {
        $errores[] = 'El email es obligatorio o no es válido';
      }
      if (!$password) {
        $errores[] = 'El password es obligatorio';
      }

      if (empty($errores)) {
        //Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '{$email}';";
        $resultado = mysqli_query($db, $query);

        // var_dump($resultado);
        //Resultados nos arroga un objeto para ello 
        //Verificamos que num_rows no este vacio(0)
        if ($resultado->num_rows) {
          //Revisar si el password es correcto 
          $usuario = mysqli_fetch_assoc($resultado);
          //Verificar si el password es correcto o no.
          $auth = password_verify($password, $usuario["password"]);
          // var_dump($auth);

          if ($auth) {
            //El usuario esta autenticado
            session_start();

            //llenar el arreglo de la seccion
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['login'] = true;

            // redireccionar 
            header('location: /admin');
          } else {
            $errores[] = 'La contraseña es incorrecta';
          }
        } else {
          //Si esta vacio 
          $errores[] = 'El usuario no existe';
        }
      }
    }


    // Incluye header
    incluirTemplate('header');
    ?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Iniciar Sesión</h1>
      <?php foreach ($errores as $error): ?>
        <div class="alerta error">
          <?php echo $error; ?>
        </div>
      <?php endforeach; ?>
      <form method="POST" class="formulario">
        <fieldset>
          <legend>Ingresa tu Correo y contraseña</legend>
          <label for="email">E-mail</label>
          <input type="email" name="email" placeholder="Tu correo electronico" id="email">

          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Tu contraseña" id="password">
        </fieldset>
        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
      </form>
    </main>