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
        <div id="link-1"><a href="../crud.html">Inicio</a></div>
    </div>
</nav>
<div id="general">
    <h3>Asignacion de Lugares a Jesuitas</h3>
    <form method="post" id="formvisita">
        <?php
        include 'Operaciones.php';
        $objeto = new Operaciones();

        $sql="SELECT * FROM jesuita";
        echo '<label>Jesuita</label>';
        echo '<select name="nJesuita">';
        $objeto->realizarConsultas($sql);
        if($objeto->comprobarSelect()>0){
            while($fila=$objeto->extraerFilas()){
                echo '<option value="'.$fila['idJesuita'].'">'.$fila['nombre'].'</option>';
            }
        }else{
            echo 'Consulta no se a realizado correctamente1';
        }
        echo '</select><br>';
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
        echo '</select><br><hr>';
        echo '<input type="submit" value="Realizar Visita" name="enviar">  <a href="paginaInicio.php">Volver</a>';

        if (isset($_POST['enviar'])){
            $idjesuita=$_POST['nJesuita'];
            $idlugar=$_POST['nLugar'];
            $sql3="INSERT INTO maquina(idJesuita,idLugar) VALUES('".$idjesuita."',.$idlugar.)";
            $objeto->realizarConsultas($sql3); //consulta de insercion de datos
            if ($objeto->comprobar()>0) {
                echo '<br>';
                echo 'Asignacion relizada correctamente.';
                echo '<br>';
                echo 'Realice otra asignacion.';
            } else {
                echo 'La visita no se a realizado correctamente3';
            }
        }
    ?>
    </form>
</div>
</body>
</html>
