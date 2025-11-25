<?php
require 'includes/app.php';
// Obtener el ID 
$id = $_GET['id'];
// validar que sea un numero 
$id = filter_var($id, FILTER_VALIDATE_INT);
// Direccionar a inicio sino es un valor valido
if (!$id) {
  header('Location: /');
}

//Importar conexion BD 
// require 'includes/config/database.php';
$db = conectarDB();;

//Consulta 
$query = "SELECT * FROM propiedades WHERE id = {$id}";

//Obtener los datos
$resultado = mysqli_query($db, $query);
if (!$resultado->num_rows) {
  header('location: /');
}
$propiedad = mysqli_fetch_assoc($resultado);

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">

  <h1><?php echo $propiedad['titulo']; ?></h1>
  <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio 1">
  <div class="resumen-texto">
    <p class="precio">$<?php echo $propiedad['precio']; ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img
          loading="lazy"
          src="build/img/icono_wc.svg"
          alt="Icono wc" />
        <p><?php echo $propiedad['wc']; ?></p>
      </li>
      <li>
        <img
          loading="lazy"
          src="build/img/icono_estacionamiento.svg"
          alt="Icono estacionamiento" />
        <p><?php echo $propiedad['estacionamiento']; ?></p>
      </li>
      <li>
        <img
          loading="lazy"
          src="build/img/icono_dormitorio.svg"
          alt="Icono dormitorio" />
        <p><?php echo $propiedad['habitacion']; ?></p>
      </li>
    </ul>
    <p><?php echo $propiedad['descripcion']; ?></p>

</main>

<?php
mysqli_close($db);
incluirTemplate('footer');
?>