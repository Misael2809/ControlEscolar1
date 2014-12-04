<?php

class Grupo{

    private $id;
    private $nombre;
    private $status;

    public function createGrupo(){



    }
    public function readGrupoG(){



    }
    public function readGrupoS(){



    }

    public function seleccionarGrupo(){

        echo '<select name="id_grupo" id="id_grupo">';

        $sql="select * from grupo where estatus='1';";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos > 0){

            while($field = mysql_fetch_array($consulta)){

                echo '<option value="'.$field["id"].'">'.$field['nombre'].'</option>';

            }

        }else{

            echo "<option value=''>No hay grupos</option>";

        }

        echo '</select>';

    }

    public function asignarAlumnosGrupos(){

        echo "<div class='table-responsive'>";

        echo '<form action="TestGrupo.php" method="POST" name="alumnoFormulario">';

        echo "<table class='table table-hover'>";

        $sql="select * from usuario where Estatus='1' and Nivel='3';";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos > 0){

            while($field = mysql_fetch_array($consulta)){

                $sql2 = "SELECT * FROM grupo_alumno WHERE id_alumno = ".$field['Id'].";";
                $consulta2 = mysql_query($sql2) or die (mysql_error());
                $cuantos2 = mysql_num_rows($consulta2);
                if($cuantos2 == 0){

                    $option = " ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']." ";

                    echo '<tr>';

                    echo "<td colspan='2' align='center'>";

                    echo "<input type='checkbox' name='alumnos[]' value='".$field['Id']."'> ".$option."<br>";

                    echo "</td>";

                    echo '</tr>';

                }else{

                    $idGrupo = mysql_result($consulta2,0,'id_grupo');
                    $idRegistroGrupoAlumno = mysql_result($consulta2,0,'id');

                    $sql3 = "SELECT * FROM grupo WHERE id = ".$idGrupo.";";
                    $consulta3 = mysql_query($sql3) or die (mysql_error());

                    $nombreGrupo = mysql_result($consulta3,0,'nombre');

                    echo '<tr>';

                    echo "<td colspan='2' align='center'>";

                    echo " ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre'].", ya tiene grupo asignado. ($nombreGrupo) <a href='TestGrupo.php?action_grupo=Designar&id_registro_alumno_grupo=$idRegistroGrupoAlumno'>Designar</a><br>";

                    echo "</td>";

                    echo '</tr>';

                }

            }

            echo '<tr>';

            echo "<td colspan='2' align='center'>";

            $grupo = new Grupo();
            $grupo->seleccionarGrupo();

            echo "</td>";

            echo "</tr>";

            echo "<tr>";

            echo "<td colspan='2' align='center'>";

            echo "<input type='submit' name='action_grupo' value='Asignar'>";

            echo "</td>";

            echo '</tr>';

        }else{

            echo "<div class='alert alert-danger' role='alert'>";
            echo "<br>";
            echo "<center><strong>No hay Alumnos</strong></center>";
            echo "<br>";
            echo "</div>";

        }

        echo '</tr>';

        echo '</table>';

        echo '</form>';

        echo "</div>";

    }

    public function createGrupoAlumno($alumnoId,$grupoId){

        $sql = "select * from grupo_alumno where id_alumno=$alumnoId and id_grupo=$grupoId";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos == 0 and $grupoId > 0){

            $sql2="insert into grupo_alumno (id_alumno,id_grupo) values ($alumnoId,$grupoId);";
            $consulta2 = mysql_query($sql2) or die (mysql_error());

        }

    }

    public function deleteGrupoAlumno($grupoId){

        if($grupoId > 0){

            $sql = "delete from grupo_alumno where id = $grupoId";
            $consulta = mysql_query($sql) or die (mysql_error());

        }

    }

}

?>