<?php

require('../BD.php');
require('Maestro.php');
require ('../Login/Login.php');
$seguridad = new Login();
$seguridad->seguridadYmenu();

$maestroL = new Maestro();

$usuarioLog1 = $_SESSION['usuarioRegistrado'];

$maestroL->materiasAsignadas($usuarioLog1);

require('../footer.php');

?>