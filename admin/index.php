<?php

require '../includes/funciones.php'; // Incluimos el archivo de funciones para poder utilizar la función de la conexión a la base de datos
incluirTemplate('header', $inicio = true); // Incluimos el header de la página $inicio = true es para que el header se muestre en la página de inicio

?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
</main>

<?php

incluirTemplate('footer'); // Incluimos el footer de la página

?>