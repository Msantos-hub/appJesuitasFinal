<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>inicio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div id="menu">
            <div id="link-1"><a href="paginaInicio.php">Inicio</a></div>
            <div id="link-2"><a href="visitas.php">Visitas</a></div>
            <div id="link-3"><a href="rankingvisitas.php">Rankings</a></div>
            <div id="link-4"><a href="jesuitas.php">Jesuitas</a></div>
            <div id="link-5"><a href="logout.php">Cerrar Sesion</a></div>
        </div>
    </nav>
    <div id="general">
        <?php
        session_start();
        echo '<h1>Bienvenido '.$_SESSION['usuario'].'</h1><br/>';
        echo '<h3>Navega por la aplición usuando el menu de la parte superior</h3>';
        $usuario=$_SESSION['usuario'];
        include 'Operaciones.php';
        $objeto= new Operaciones();

        $sql="SELECT * FROM maquina WHERE usuario='$usuario'";

        $objeto->realizarConsultas($sql);
        if($objeto->comprobarSelect()>0){
            $fila=$objeto->extraerFilas();
            $idJesuita=$fila['idJesuita'];
            $idlugar=$fila['idLugar'];
        }else{
            echo 'Consulta no se a realizado correctamente1';
        }
        $sql="SELECT * FROM lugar WHERE idLugar='$idlugar'";
        $objeto->realizarConsultas($sql);
        if($objeto->comprobarSelect()>0){
            $fila=$objeto->extraerFilas();
            $nombreLugar=$fila['nombre'];
        }else{
            echo 'Consulta no se a realizado correctamente1';
        }
        echo 'Esta es tu idJesuita: '.$idJesuita.'<br/>';
        echo 'Esta es tu Ciudad asignada: '.$nombreLugar;

        ?>
    </div>
</body>
</html>

