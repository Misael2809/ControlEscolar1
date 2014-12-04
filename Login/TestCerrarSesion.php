<?php

require ('../BD.php');
require ('../Login/Login.php');

$seguridad = new Login();
$seguridad->seguridadYmenu();
$seguridad->cerrarSesion();

?>