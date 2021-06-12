<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit Lugar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav>
    <div id="menu">
        <div id="link-1"><a href="../crud.html">Inicio</a></div>
    </div>
</nav>
<div id="general">
    <div>
        <h3>Modifcacion Lugares</h3>
        <form method="post">
            <?php
                include '../Operaciones.php';
                $idLugar=$_GET['idLugar'];
                $objeto=new operaciones();
                $sql="SELECT * FROM Lugar WHERE idLugar='".$idLugar."'";
                $objeto->realizarConsultas($sql);
                while($fila=$objeto->extraerFilas())
                {
                    echo '<label>nombreAlumno </label>';
                    echo '<input type="text" name="nombre" value="'.$fila['nombre'].'"><br><hr>';
                    echo '<input type="submit" value="Agregar usuario" name="enviar">';
                    echo '<a href="../listar/listLugar.php"> Volver </a>';
                }
                echo '</form>';
                echo '</div>';
                if (isset($_POST['enviar']))
                {
                    $nombre = $_POST["nombre"];
                    if ($nombre != NULL)
                    { //si los datos no son null entra en el bucle y realiza la consulta
                        $sql2 = "UPDATE lugar SET nombre='".$nombre."' WHERE idLugar='".$idLugar."'";//realiza la consulta
                        $objeto->realizarConsultas($sql2);
                        if ($idLugar2 = 1)
                        {
                            echo 'Datos actualizados correctamente';
                           header("location:../listar/listLugar.php"); //si se a añadido un luagr vuevle a la pagina de listado
                        }
                    } echo 'Datos erroneos';
                }
            ?>
    </div>
</body>
</html>


