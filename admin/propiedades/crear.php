<?php

require '../../includes/config/database.php'; // Incluimos el archivo de configuración de la base de datos para poder utilizar la función de la conexión a la base de datos

$db = conectarDB(); // Creamos una nueva conexión a la base de datos

var_dump($db); // Imprimimos la conexión a la base de datos