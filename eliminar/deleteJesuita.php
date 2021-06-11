<?php
    require '../Operaciones.php';
    $idJesuita=$_GET['idJesuita'];//recoge del formulario el idLugar
    $objeto=new operaciones();//instancia la clase
    $sql="DELETE FROM jesuita WHERE idJesuita='".$idJesuita."'";//borra si los dos idLugar son iguales
    $objeto->realizarConsultas($sql);//realiza la consulta
    //confirmacion de borrado
    header('location:../listar/listJesuita.php');//Vuelve a la pagina de que lista los lugares
?>
