<?php

class Maestro{

    public function materiasAsignadas($maestroId){

        $sql = "SELECT materia.`nombre` as n FROM materia,materia_maestro WHERE materia_maestro.id_maestro = $maestroId AND materia_maestro.id_materia = materia.`id`;";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos == 0){

            echo "<div class='alert alert-danger' role='alert'>";
            echo "<br>";
            echo "<center><strong>No hay materias asignadas</strong></center>";
            echo "<br>";
            echo "</div>";

        }else{

            echo "<table class='table table-hover'>";

            echo "<tr>";

            echo "<td align='left'><strong>Materias:</strong></td>";

            echo '</tr>';

            for($m = 0;$m < $cuantos;$m ++){

                $nombreMateria = mysql_result($consulta,$m,'n');

                echo "<tr>";

                echo "<td align='center'>$nombreMateria</td>";

                echo '</tr>';

            }

            echo '</table>';

        }

    }

}

?>