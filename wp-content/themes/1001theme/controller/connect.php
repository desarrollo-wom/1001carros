<?php

$host = 'localhost';
$usuario = 'root';
$password = '314156aA@';
$db = '1001db';

$link=new mysqli($host,$usuario,$password,$db);

if($link->connect_errno){
    echo "Error en la conexión a la base de datos";
}

mysqli_set_charset($link, 'utf8');


