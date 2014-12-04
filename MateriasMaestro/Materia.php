<?php

class Materia{

    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $status;

    public function createMateria(){



    }
    public function readMateriaG(){



    }
    public function readMateriaS(){



    }
    public function seleccionaMaestro(){

        echo "<div class='table-responsive'>";

        echo '<form action="ajax.php" method="POST" name="maestroFormulario">';

        echo "<table class='table table-hover'>";

        echo '<tr>';

        echo '<td align="right"><strong>Maestro:</strong></td><td align="center"><select name="id_maestro" id="id_maestro">';

        $sql="select * from usuario where Estatus='1' and Nivel='2';";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos > 0){

            while($field = mysql_fetch_array($consulta)){

                $option = " ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']." ";
                echo '<option value="'.$field["Id"].'">'.$option.'</option>';

            }

        }else{

            echo "<option value=''>No hay maestros</option>";

        }

        echo '</select></td>';

        echo '</tr>';

        echo '<tr>';

        echo '<td colspan="2" align="center"><input type="submit" value="Submit"></td>';

        echo '</tr>';

        echo '</table>';

        echo '</form>';

        echo "</div>";
    }

    public function datosMaestro($maestroId){
        if($maestroId > 0){
            $sql="select * from usuario where Id = $maestroId;";
            $consulta = mysql_query($sql) or die (mysql_error());
            $existe = mysql_num_rows($consulta);
            if ($existe > 0){
                $nombre = $maestroId.") ";
                $nombre .= "". mysql_result($consulta,0,'ApellidoPaterno');
                $nombre .= " ".mysql_result($consulta,0,'ApellidoMaterno');
                $nombre .= " ".mysql_result($consulta,0,'Nombre');
                echo "<br> Maestro seleccionado: <strong>".$nombre."</strong>";
            }
        }
    }

    public function materiasAsignadas($maestroId){
        if($maestroId > 0){
            echo "<div class='table-responsive'>";

            echo "<table class='table table-hover'>";

			echo '<tr>';

            echo '<td colspan="2" align="center"><strong>Materias asignadas</strong></td>';

            echo '</tr>';
			
            echo '<tr>';

            echo '<td><strong>Materia</strong></td><td><strong>Acci&oacute;n</strong></td>';

            echo '</tr>';

            $sql="select * from materia_maestro where id_maestro = $maestroId;";
            $consulta = mysql_query($sql) or die (mysql_error());

            while($field = mysql_fetch_array($consulta)){

                $sql2 = "select * from materia where id =".$field['id_materia'].";";
                $consulta2 = mysql_query($sql2) or die (mysql_error());

                $nombreM = mysql_result($consulta2,0,'nombre');

                echo '<tr>';

                echo "<td>".$nombreM."</td><td><a href='ajax.php?id_maestro=$maestroId&action_materia=Eliminar&id_regitro_materia_mestro=".$field['id']."'>Eliminar</a></td>";

                echo '</tr>';

            }

            echo '</table>';

            echo "</div>";
        }
    }

    public function asignarMateriaMaestro($maestroId){
        if($maestroId > 0){
            echo "<div class='table-responsive'>";

            echo '<form action="ajax.php" method="POST" name="materiaFormulario">';

            echo "<table class='table table-hover'>";

			echo '<tr>';

            echo '<td colspan="2" align="center"><strong>Asignar materias</strong></td>';

            echo '</tr>';
			
            echo '<tr>';

            echo '<td>seleccione una materia:</td><td><select name="id_materia" id="id_materia">';

            $sql="select * from materia where estatus='1';";
            $consulta = mysql_query($sql) or die (mysql_error());
            $cuantos = mysql_num_rows($consulta);

            if($cuantos == 0){

                echo "<option value='0'>No disponible</option>";

            }else{

                $x = 0;
                for($y=0;$y < $cuantos;$y++){

                    $idMateria = mysql_result($consulta,$y,'id');
                    $nomMateria = mysql_result($consulta,$y,'nombre');

                    $sql2 = "select * from materia_maestro where id_materia =".$idMateria." and id_maestro=".$maestroId.";";
                    $consulta2 = mysql_query($sql2) or die (mysql_error());
                    $cuantos2 = mysql_num_rows($consulta2);
                    if($cuantos2 == 0){

                        echo '<option value="'.$idMateria.'">'.$nomMateria.'</option>';

                    }else{

                        $x = $x+1;

                    }
                    if($x == $cuantos){

                        echo "<option value='0'>No disponible</option>";

                    }

                }

            }

            echo '</select></td>';

            echo '</tr>';

            echo '<tr>';

            echo "<input type='hidden' name='id_maestro' value='$maestroId'>";

            echo '<td colspan="2"><input type="submit" name="action_materia" value="Agregar"></td>';

            echo '</tr>';

            echo '</table>';

            echo '</form>';

            echo "</div>";
        }
    }

    public function createMateriaMaestro($maestroId,$materiaId){

        $sql = "select * from materia_maestro where id_maestro=$maestroId and id_materia=$materiaId";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos == 0 and $materiaId > 0){

            $sql2="insert into materia_maestro (id_maestro,id_materia) values ($maestroId,$materiaId);";
            $consulta2 = mysql_query($sql2) or die (mysql_error());

        }

    }

    public function deleteMateriaMaestro($materiaId){

        if($materiaId > 0){

            $sql = "delete from materia_maestro where id = $materiaId";
            $consulta = mysql_query($sql) or die (mysql_error());

        }

    }

}

?>