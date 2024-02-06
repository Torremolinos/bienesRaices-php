<?php

require 'includes/funciones.php'; // Incluimos el archivo de funciones para poder utilizar la función de la conexión a la base de datos 
incluirTemplate('header', $inicio = true); // Incluimos el header de la página 
//la diferencia entre require e include es que require detiene la ejecución del programa si no encuentra el archivo, mientras que include no lo hace y sigue ejecutando el programa 
?>
<main class="contenedor seccion">
    <h1>Titulo Página</h1>
</main>

<?php

incluirTemplate('footer'); // Incluimos el footer de la página

?>