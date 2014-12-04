<?php

    $db_name="usuario";
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_connection=mysql_connect($db_server,$db_user,$db_pass) or die ("Error al conectar= ".mysql_error());
    mysql_select_db($db_name,$db_connection) or die ("Error de base= ".mysql_error());
    mysql_query("SET NAMES utf8");

?>