<?php
require '../includes/app.php';
estaAutenticado();

USE App\Propiedad;

//Implementar metodo para obtener todas las propiedades
$propiedades = Propiedad::all();

// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;
// Incluye Template
incluirTemplate('header');

//POST Form del boton de Eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  //Filtrar para validar que sea un numero.
  $id = filter_var($id, FILTER_VALIDATE_INT);

  // Condicion si es verdadero y pasa el filtro. 
  if ($id) {
    // Eliminar archivo(Imagen)
    $query = "SELECT imagen FROM propiedades WHERE id = {$id};";
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    // var_dump($propiedad['imagen']);
    unlink('../imagenes/' . $propiedad['imagen']);

    //Realizar query para eliminar la propiedad
    $query = "DELETE FROM propiedades WHERE id = {$id};";
    $resultado = mysqli_query($db, $query);

    // redireccionamiento 
    if ($resultado) {
      header('location: /admin?resultado=3');
    }
  }
}
?>
<main class="contenedor seccion">
  <h1>Administrador de Bienes Raices</h1>
  <?php if (intval($resultado) === 1): ?>
    <p class="alerta exito">Anuncio creado correctamente</p>
  <?php elseif (intval($resultado) === 2): ?>
    <p class="alerta exito">Anuncio actualizado correctamente</p>
  <?php elseif (intval($resultado) === 3): ?>
    <p class="alerta exito">Anuncio eliminado correctamente</p>
  <?php endif; ?>
  <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva propiedad</a>

  <!-- Mostrar tabla de propiedades -->
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- Moatrar los resultados de la base de datos -->
    <tbody>
      <?php foreach($propiedades as $propiedad): ?>
        <tr>
          <th><?php echo $propiedad->id; ?></th>
          <th><?php echo $propiedad->titulo; ?></th>
          <th><img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="" class="imagen-tabla"></th>
          <th><?php echo $propiedad->precio; ?></th>
          <th>
            <form action="" method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
              <input type="submit" value="Eliminar" class="boton-rojo-block">
            </form>
            <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">Actualizar</a>
          </th>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php
//cerrar la base de datos
mysqli_close($db);
incluirTemplate('footer');
?>