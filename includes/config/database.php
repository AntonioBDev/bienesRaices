<?php
function conectarDB(): mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud_db');
    if (!$db) {
        echo 'Error de conexión';
        exit;
    }
    return $db;
}
