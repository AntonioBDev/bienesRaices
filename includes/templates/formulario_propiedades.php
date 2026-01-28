      <fieldset>
        <legend>Informacion general</legend>

        <label for="titulo">Titulo</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo);?>">

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo s($propiedad->precio); ?>">

        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" name="descripcion"><?php echo s($propiedad->descripcion)?></textarea>
      </fieldset>

      <fieldset>
        <legend>Informacion de la propiedad</legend>
        <label for="habitacion">Habitacion</label>
        <input type="number" id="habitacion" name="habitacion" placeholder="Ej: 3" min="1" max="8" value="<?php echo s($propiedad->habitacion); ?>">

        <label for="wc">Baños</label>
        <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="8" value="<?php echo s($propiedad->wc); ?>">

        <label for="estacionamiento">Estacionamiento</label>
        <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="8" value="<?php echo s($propiedad->estacionamiento); ?>">
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