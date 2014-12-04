<?php

class Login{

    public function validar($usuario,$contrasena){

        $sql = "SELECT * FROM usuario WHERE Usuario = '".$usuario."' AND Contrasena = '".$contrasena."' AND Nivel != 3;";
        $consulta = mysql_query($sql) or die (mysql_error());
        $cuantos = mysql_num_rows($consulta);
        if($cuantos == 0){

            echo "<div class='alert alert-danger' role='alert'>";
            echo "<br>";
            echo "<center><strong>Los datos son incorrectos</strong></center>";
            echo "<br>";
            echo "</div>";

        }else{

            @session_start();
            $claveUsuario = mysql_result($consulta,0,'Id');
            $_SESSION['usuarioRegistrado'] = $claveUsuario;
            print "<meta http-equiv='refresh'content='0;url=../inicio/index.php'>";
            exit;

        }

    }

    public function formularioLogin(){

        echo "<div class='table-responsive'>";

        echo '<form action="TestLogin.php" method="POST" name="loginFormulario">';

        echo "<table class='table table-hover'>";

        echo "<tr>";

        echo "<td align='right'><strong>Usuario</strong></td>";

        echo "<td><input type='text' name='user'></td>";

        echo '</tr>';

        echo "<tr>";

        echo "<td align='right'><strong>Contraseña</strong></td>";

        echo "<td><input type='password' name='pass'></td>";

        echo '</tr>';

        echo "<tr>";

        echo "<td colspan='2' style='padding-left: 500px;'><input type='submit' name='login' value='Entrar'></td>";

        echo '</tr>';

        echo '</table>';

        echo '</form>';

        echo "</div>";

    }

    public function seguridadYmenu(){

        @session_start();
        @$claveUs = $_SESSION['usuarioRegistrado'];
        if($claveUs == ""){

            print "<meta http-equiv='refresh'content='0;url=../Login/TestLogin.php'>";
            exit;

        }else{

            $sql = "SELECT * FROM usuario WHERE Id = ".$claveUs.";";
            $consulta = mysql_query($sql) or die (mysql_error());

            $nivelUs = mysql_result($consulta,0,'Nivel');
            if($nivelUs == 1){

                require ('../header.php');

            }else{

                if($nivelUs == 2){

                    require ('../headerProfesor.php');

                }

            }

        }

    }

    public function cerrarSesion(){

        @session_start();
        session_unset();
        session_destroy();

        print "<meta http-equiv='refresh'content='0;url=../Login/TestLogin.php'>";
        exit;

    }

}
?>