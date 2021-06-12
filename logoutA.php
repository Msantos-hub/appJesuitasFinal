<?php
    session_start();//inicia la sesion
    session_destroy(); //destruye la sesion
    header('location:loginAdmin.php'); //redirige
?>
