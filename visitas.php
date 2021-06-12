<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Realizar visitas</title>
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
        <h3>Jesuitas Viajeros</h3>
        <form method="post" id="formvisita">
                <?php
                    session_start();
                    include 'Operaciones.php';
                    $objeto=new operaciones();
                    $usuario = $_SESSION['usuario'];

                        $sql1="SELECT idJesuita FROM maquina WHERE usuario='$usuario'";
                        $objeto->realizarConsultas($sql1);
                        if($objeto->comprobarSelect()>0){
                            $fila=$objeto->extraerFilas();
                            $idJesuita=$fila['idJesuita'];
                        }else{
                            echo 'Consulta no se a realizado correctamente1';
                        }
                        echo '<label>Jesuita</label>';
                        echo '<p>'.$idJesuita.'</p><br>';
                        echo '<label>Lugares</label>';
                        echo '<select name="nLugares">';
                        $sql2="SELECT * FROM Lugar";
                        $objeto->realizarConsultas($sql2);
                        if($objeto->comprobarSelect()>0){
                            while($fila=$objeto->extraerFilas()) {
                                echo '<option value="'.$fila['idLugar'].'">'.$fila['nombre'].'</option>';
                            }
                        }else{
                            echo 'Consulta no se a realizado correctamente2';
                        }
                        echo '</select><br>';
                        echo '<input type="submit" value="Realizar Visita" name="enviar">';
                        echo '</form>';

                    if (isset($_POST['enviar'])){
                        $idLugar = $_POST['nLugares'];
                        $sql3="SELECT * FROM maquina WHERE idlugar='$idLugar'";
                        $objeto->realizarConsultas($sql3);

                        if($objeto->comprobarSelect()>0){
                            $fila=$objeto->extraerFilas();
                            $idJesuita2 = $fila['idJesuita'];

                            $sql3="INSERT INTO visita (ip,idJesuita,idLugar,fechaHora) VALUES ('".$idJesuita."','".$idJesuita2."','".$idLugar."', NOW())"; //consulta de insercion de datos
                            $objeto->realizarConsultas($sql3); //consulta de insercion de datos
                            if ($objeto->comprobar()>0) {
                                echo '<br>';
                                echo 'La Visita se realizo correctamente.';
                                echo '<br>';
                                echo 'Visita otro lugar.';
                            } else {
                                echo 'La visita no se a realizado correctamente';
                            }
                        }else{
                            echo 'El lugar seleccionado no esta disponible para visitar en este momento o no esta asignado a un jesuita.';
                        }


                    }
                    echo '<a href="paginaInicio.php">Volver</a>';
                ?>
    </div>
</body>
</html>
