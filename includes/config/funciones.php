<?

require 'app.php'; // Incluimos el archivo de funciones para poder utilizar la función de la conexión a la base de datos

function incluirTemplate(string $nombre, bool $inicio = false){
   
    include TEMPLATES_URL . "/$nombre.php"; 

}