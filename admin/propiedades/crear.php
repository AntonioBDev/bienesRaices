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
    
    // echo "<pre>";
    //   var_dump($_POST); 
    // echo"</pre>";

    // echo "<pre>";
    //   var_dump($_FILES); 
    // echo"</pre>";

    $titulo =mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitacion =mysqli_real_escape_string($db, $_POST['habitacion']);
    $wc =mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento =mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId =mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');
    //Asignar files hacia una variable 
    $imagen = $_FILES['imagen'];


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
    if(!$imagen["name"] || $imagen['error']){
      $errores[] = 'La imagen es obligatoria';
    }

    $medida = 1000 * 1000;
    if($imagen["size"] >= $medida){
      $errores[] ='La imagen es muy pesada';
    }

    //Verificar que el arreglo de error no este vacio 
    if (empty($errores)) {
      /** SUBIDA DE ARCHIVOS **/
      
      //Crear Carpeta 
      // indicar en que ubicacion se creara 
      $carpetaImagenes = '../../imagenes';
      // Crear sentencia para saber si no exite la carpeta 
      if(!is_dir($carpetaImagenes)){
        //Propiedad para crear directorio
        mkdir($carpetaImagenes);
      }
      //Generar  un nombre unico 
      $nombreImagen = md5(uniqid(rand(),true)).".jpg";

      //Subir la imagen 
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes."/".$nombreImagen);

      // exit;

      //Insertar en la base de datos 
      $query = "INSERT INTO propiedades(titulo, precio, imagen, descripcion, habitacion, wc, estacionamiento, creado, vendedores_id) VALUE ('$titulo', '$precio','$nombreImagen', '$descripcion', '$habitacion', '$wc', '$estacionamiento', '$creado','$vendedorId');";
      $resultado = mysqli_query($db, $query);

      if ($resultado) {
        // echo "Enviado con exito";
        // Redireccionar al usuario
        header('Location:/admin?resultado=1');
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

    <form class="formulario" method="post" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
      <fieldset>
        <legend>Informacion general</legend>

        <label for="titulo">Titulo</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo;?>">

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio;?>">

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

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