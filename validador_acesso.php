<?php
session_start();

if(!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] != 'SIM'){
    header('Location: index.php?login=erro2');
}
?>