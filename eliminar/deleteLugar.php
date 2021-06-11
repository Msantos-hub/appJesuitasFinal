<?php
    require '../Operaciones.php';
    $idLugar=$_GET['idLugar'];//recoge del formulario el idLugar
    $objeto=new operaciones();//instancia la clase
    $sql="DELETE FROM lugar WHERE idLugar='".$idLugar."'"; //borra si los dos idLugar son iguales
    $objeto->realizarConsultas($sql);//realiza la consulta
    //confirmacion de borrado
    header('location:../listar/listLugar.php');//Vuelve a la pagina de que lista los lugares
?>
