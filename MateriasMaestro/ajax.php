<?php

require ('../BD.php');
require ('Materia.php');
require ('../Login/Login.php');

$seguridad = new Login();
$seguridad->seguridadYmenu();

$materia = new Materia();
if(isset($_REQUEST['id_regitro_materia_mestro'])){

    $id_registro_materia_mestro=$_REQUEST['id_regitro_materia_mestro'];

}else{

    $id_registro_materia_mestro=0;

}

if(isset($_REQUEST['id_materia'])){

    $id_materia=$_REQUEST['id_materia'];

}else{

    $id_materia=0;

}

if(isset($_REQUEST['id_maestro']) and ($_REQUEST['id_maestro'] != "")){

    $id_maestro=$_REQUEST['id_maestro'];

}else{

    $id_maestro=0;
    $materia->seleccionaMaestro();

}

if(isset($_REQUEST['action_materia'])){

    switch($_REQUEST['action_materia']){

        case "Agregar":
            $materia->createMateriaMaestro($id_maestro,$id_materia);
            break;
        case"Eliminar":
            $materia->deleteMateriaMaestro($id_registro_materia_mestro);
            break;

    }

}

$materia->datosMaestro($id_maestro);
$materia->materiasAsignadas($id_maestro);
$materia->asignarMateriaMaestro($id_maestro);


require ('../footer.php');
?>