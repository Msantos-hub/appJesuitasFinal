<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit Jesuita</title>
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
        <h3>Modifcacion Jesuitas</h3>
        <form method="post">
            <?php
                include '../Operaciones.php';
                $idJesuita=$_GET['idJesuita'];
                $objeto=new operaciones();
                $sql="SELECT * FROM jesuita WHERE idJesuita='".$idJesuita."'";
                $objeto->realizarConsultas($sql);
                while($fila=$objeto->extraerFilas())
                {
                    echo '<label>idJesuita </label>';
                    echo '<input type="text" name="ip" value="'.$fila['idJesuita'].'"><br><br>';
                    echo '<label>nombreAlumno </label>';
                    echo '<input type="text" name="nombre" value="'.$fila['Nombre'].'"><br><br>';
                    echo '<label>Nombre </label>';
                    echo '<input type="text" name="Firma" value="'.$fila['Firma'].'"><br><hr>';
                    echo '<input type="submit" value="Agregar Jesuita" name="enviar">';
                    echo '<a href="../listar/listJesuita.php">Volver</a>';
                }
                echo '</form>';
                echo '</div>';
                if (isset($_POST['enviar']))
                {
                    $idJesuita2 = $_POST["ip"];
                    $nombre = $_POST["nombre"];
                    $firma = $_POST["Firma"];

                    if ($idJesuita2 != NULL && $nombre != NULL && $firma != NULL)
                    {
                        $sql2 = "UPDATE jesuita set idJesuita='".$idJesuita2."', Nombre='".$nombre."',Firma='".$firma."' WHERE idJesuita='".$idJesuita."'";
                        $objeto->realizarConsultas($sql2);
                        if ($idJesuita2 = 1) {
                            header('location:../listar/listJesuita.php');
                        }
                    }
                }
            ?>
    </div>
</body>
</html>
