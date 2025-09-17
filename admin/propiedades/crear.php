  <?php
  require '../../includes/config/database.php';
  require '../../includes/funciones.php';
  $db = conectarDB();
  incluirTemplate('header');

  //Consulta para extraer vendedores 
  $consulta = "SELECT * FROM vendedores;";
  $resultadoTablaVendedores = mysqli_query($db, $consulta); 

  //Arreglo con mensaje de errores
  $errores = [];

  $titulo ='';
  $precio = '';
  // $imagen = $_POST['imagen'];
  $descripcion = '';
  $habitacion = '';
  $wc = '';
  $estacionamiento = '';
  $vendedorId = '';

  //Ejecutar el codigo despues de que el usuario envia el formulario
  // $_SERVER:  es una variable superglobal en PHP que contiene un array asociativo con información sobre el servidor. 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
      var_dump($_POST); 
    echo"</pre>";
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    // $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $habitacion = $_POST['habitacion'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];
    $creado = date('Y/m/d');


    if (!$titulo) {
      $errores[] = 'Debes añadir un titulo';
    }
    if (!$precio) {
      $errores[] = 'El precio es obligatorio';
    }
    if (strlen($descripcion) < 50) {
      $errores[] = 'La descripción es obligatorio y debe tener al menos 50 caracteres';
    }
    if (!$habitacion) {
      $errores[] = 'El número de habitaciones es obligatorio';
    }
    if (!$wc) {
      $errores[] = 'El número de Baños es obligatorio';
    }
    if (!$estacionamiento) {
      $errores[] = 'El número de lugares de estacionamiento es obligatorio';
    }
    if (!$vendedorId) {
      $errores[] = 'Elige un vendedor';
    }

    //Verificar que el arreglo de error no este vacio 
    if (empty($errores)) {
      //Insertar en la base de datos 
      $query = "INSERT INTO propiedades(titulo, precio, descripcion, habitacion, wc, estacionamiento, creado, vendedores_id) VALUE ('$titulo', '$precio', '$descripcion', '$habitacion', '$wc', '$estacionamiento', '$creado','$vendedorId');";
      $resultado = mysqli_query($db, $query);

      if ($resultado) {
        // echo "Enviado con exito";
        // Redireccionar al usuario
        header('Location:/admin');
      }
    }
  }
  ?>
  <main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin/" class="boton-verde">volver</a>
    <?php foreach ($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error; ?>
      </div>
    <?php endforeach ?>

    <form class="formulario" method="post" action="/admin/propiedades/crear.php">
      <fieldset>
        <legend>Informacion general</legend>

        <label for="titulo">Titulo</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo;?>">

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio;?>">

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png">

        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $descripcion?></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitacion">Habitacion</label>
        <input type="number" id="habitacion" name="habitacion" placeholder="Ej: 3" min="1" max="8" value="<?php echo $habitacion;?>">

        <label for="wc">Baños</label>
        <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="8" value="<?php echo $wc;?>">

        <label for="estacionamiento">Estacionamiento</label>
        <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="8" value="<?php echo $estacionamiento;?>">
      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select name="vendedor">
          <option value="">--Seleccione--</option>
          <?php while($row = mysqli_fetch_assoc($resultadoTablaVendedores)) :?>
            <option <?php echo $vendedorId === $row['id']? 'selected':''; ?> value="<?php echo $row['id']?>"><?php echo $row['nombre']." ".$row['apellido'] ?></option>
          <?php endwhile?>
        </select>
      </fieldset>

      <input type="submit" value="Crear propiedad" class="boton-verde">

    </form>
  </main>
  <?php
  incluirTemplate('footer');
  ?>