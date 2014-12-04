<?php
require ('Grupo.php');
require ('../BD.php');
require ('../Login/Login.php');

$seguridad = new Login();
$seguridad->seguridadYmenu();

$grupo = new Grupo();

if(isset($_REQUEST['id_grupo']) and $_REQUEST['id_grupo'] != ""){

    $id_grupo = $_REQUEST['id_grupo'];

}else{

    $id_grupo = 0;

}

if(isset($_REQUEST['id_registro_alumno_grupo']) and $_REQUEST['id_registro_alumno_grupo'] != ""){

    $id_registro_alumno_grupo = $_REQUEST['id_registro_alumno_grupo'];

}else{

    $id_registro_alumno_grupo = 0;

}

if(isset($_REQUEST['alumnos'])){

    $bandera = 1;

}else{

    $bandera = 0;

}

if(isset($_REQUEST['action_grupo'])){

    switch($_REQUEST['action_grupo']){

        case "Asignar":
            if($bandera == 1){

                $alumnos = $_REQUEST['alumnos'];

                for($a = 0;$a < count($_REQUEST['alumnos']);$a++){

                    $grupo->createGrupoAlumno($alumnos[$a],$id_grupo);

                }

            }
            break;
        case "Designar":
            $grupo->deleteGrupoAlumno($id_registro_alumno_grupo);
            break;

    }

}

$grupo->asignarAlumnosGrupos();
require ('../footer.php');
?>