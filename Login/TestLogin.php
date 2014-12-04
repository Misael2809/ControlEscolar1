<?php

require ("../BD.php");
require ("../headerLogin.php");
require ("../Login/Login.php");

$login = new Login();

if(isset($_REQUEST['login'])){

    switch($_REQUEST['login']){

        case "Entrar":
            $login->validar($_REQUEST['user'],$_REQUEST['pass']);
            break;

    }

}

$login->formularioLogin();

require ("../footer.php");
?>