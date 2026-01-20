  <?php
  require '../../includes/app.php';
  //Importar la clase Propiedad mediante el namespace App utilizando la sentencia use utilizando el autoloader
  use App\Propiedad;
  use Intervention\Image\Drivers\Gd\Driver;
  use Intervention\Image\ImageManager as Image;

  estaAutenticado();

  //Conexion a la BD
  $db = conectarDB();
  incluirTemplate('header');

  //Consulta para extraer vendedores 
  $consulta = "SELECT * FROM vendedores;";
  $resultadoTablaVendedores = mysqli_query($db, $consulta);

  //Arreglo con mensaje de errores
  $errores = Propiedad::getErrores();

  $titulo = '';
  $precio = '';
  $descripcion = '';
  $habitacion = '';
  $wc = '';
  $estacionamiento = '';
  $vendedorId = '';
  // $imagen = $_POST['imagen'];

  //Ejecutar el codigo despues de que el usuario envia el formulario
  // $_SERVER:  es una variable superglobal en PHP que contiene un array asociativo con información sobre el servidor. 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST);

    //Generar  un nombre unico 
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    if ($_FILES['imagen']['tmp_name']) {
      $manager = new Image(Driver::class);
      $imagen = $manager->read($_FILES['imagen']['tmp_name'])->cover(800, 600);
      $propiedad->setImagen($nombreImagen);
    }

    $errores = $propiedad->validar();

    //Verificar que el arreglo de error no este vacio 
    if (empty($errores)) {
      /** SUBIDA DE ARCHIVOS **/
      // Crear sentencia para saber si no exite la carpeta 
      if (!is_dir(CARPETA_IMAGENES)) {
        //Propiedad para crear directorio
        mkdir(CARPETA_IMAGENES);
      }

      //Guardar la imagen en el servidor
      $imagen->save(CARPETA_IMAGENES . $nombreImagen);

      //Insertar en la base de datos 
      $resultado = $propiedad->guardar();
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
        <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio; ?>">

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitacion">Habitacion</label>
        <input type="number" id="habitacion" name="habitacion" placeholder="Ej: 3" min="1" max="8" value="<?php echo $habitacion; ?>">

        <label for="wc">Baños</label>
        <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="8" value="<?php echo $wc; ?>">

        <label for="estacionamiento">Estacionamiento</label>
        <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="8" value="<?php echo $estacionamiento; ?>">
      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        <select name="vendedores_id">
          <option value="">--Seleccione--</option>
          <?php while ($row = mysqli_fetch_assoc($resultadoTablaVendedores)) : ?>
            <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] . " " . $row['apellido'] ?></option>
          <?php endwhile ?>
        </select>
      </fieldset>

      <input type="submit" value="Crear propiedad" class="boton-verde">

    </form>
  </main>
  <?php
  incluirTemplate('footer');
  ?>