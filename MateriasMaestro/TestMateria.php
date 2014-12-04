<?php
require ('../BD.php');
require ('Materia.php');
require ('../Login/Login.php');

$seguridad = new Login();
$seguridad->seguridadYmenu();

$materia = new Materia();
$materia->seleccionaMaestro();
require ('../footer.php');
?>