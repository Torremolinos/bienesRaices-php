<?php

require '../../includes/config/database.php'; // Incluimos el archivo de configuración de la base de datos para poder utilizar la función de la conexión a la base de datos

$db = conectarDB(); // Creamos una nueva conexión a la base de datos

// var_dump($db); // Imprimimos la conexión a la base de datos

$consulta = "SELECT * FROM vendedores"; // Consulta a la base de datos para obtener todos los vendedores
$resultado = mysqli_query($db, $consulta); // Realizamos la consulta a la base de datos

// Arreglo con mensajes de errores

$errores = [];
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

// Ejecutar el código después de que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";


    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedores_id = $_POST['vendedor_id'];


    // Asignar files hacia una variable

    if (!$titulo) {
        $errores[] = "Debes añadir un título";
    }

    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "Debes añadir una descripción y debe tener al menos 50 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "Debes añadir el número de habitaciones";
    }

    if (!$wc) {
        $errores[] = "Debes añadir el número de baños";
    }

    if (!$estacionamiento) {
        $errores[] = "Debes añadir el número de estacionamientos";
    }

    if (!$vendedores_id) {
        $errores[] = "Debes añadir el vendedor";
    }


    //Revisar que el arreglo de errores esté vacío

    if (empty($errores)) {

        //insertar en la base de daatos
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedor_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_id')";
        echo $query; // Imprimimos la consulta a la base de datos

        $resultado = mysqli_query($db, $query); // Realizamos la consulta a la base de datos para insertar la propiedad en la base de datos.

        if ($resultado) {
            echo "Insertado correctamente"; // Imprimimos un mensaje si la propiedad se insertó correctamente en la base de datos 
        }
    }
}

require '../../includes/funciones.php'; // Incluimos el archivo de funciones para poder utilizar la función de la conexión a la base de datos
incluirTemplate('header'); // Incluimos el header de la página $inicio = true es para que el header se muestre en la página de inicio



?>
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/bienesraices/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div>
            <?php echo '' . $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="post" action="/bienesraices/admin/propiedades/crear.php">
        <fieldset>

            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

        </fieldset>

        <fieldset>

            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">
            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor_id">
                <option value="">-- Seleccione --</option>
                <?php while ($vendedor =  mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellidos']; ?> </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>

</main>

<?php
incluirTemplate('footer'); // Incluimos el header de la página $inicio = true es para que el header se muestre en la página de inicio
?>