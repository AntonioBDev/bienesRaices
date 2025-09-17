<?php
    function conectarDB() : mysqli{
        $db = mysqli_connect('localhost','root','root','bienesraices_crud_db');
        if(!$db){
            echo 'Error de conexión';
            exit;
        }
        return $db;
    }