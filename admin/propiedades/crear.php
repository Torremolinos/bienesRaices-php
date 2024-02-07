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
$vendedor = '';

// Ejecutar el código después de que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // $titulo = mysqli_real_escape_string($db, $_POST['titulo']); // Escapamos los caracteres especiales para evitar inyección de código
    // $precio = mysqli_real_escape_string($db, $_POST['precio']); // Escapamos los caracteres especiales para evitar inyección de código
    // $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']); // Escapamos los caracteres especiales para evitar inyección de código
    // $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']); // Escapamos los caracteres especiales para evitar inyección de código
    // $wc = mysqli_real_escape_string($db, $_POST['wc']); // Escapamos los caracteres especiales para evitar inyección de código
    // $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']); // Escapamos los caracteres especiales para evitar inyección de código
    // $vendedor = mysqli_real_escape_string($db, $_POST['vendedor']); // Escapamos los caracteres especiales para evitar inyección de código

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedores_Id = $_POST['vendedor_Id'];


    // Asignar files hacia una variable
    // $imagen = $_FILES['imagen'];

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

    if (!$vendedor) {
        $errores[] = "Debes añadir el vendedor";
    }

    // if (!$imagen['name'] || $imagen['error']) {
    //     $errores[] = "La imagen es obligatoria";
    // }

    // // Validar por tamaño (1mb máximo)
    // $medida = 1000 * 1000;

    //Revisar que el arreglo de errores esté vacío

    if (empty('errores')) {

        //insertar en la base de daatos
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_Id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_Id')";
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
<?php 
incluirTemplate('footer'); // Incluimos el header de la página $inicio = true es para que el header se muestre en la página de inicio
?>