<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Jesuitas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    require_once '../Operaciones.php';
    $objeto=new operaciones();
    $sql="SELECT * FROM jesuita";
    $objeto->realizarConsultas($sql);
    ?>
    <nav>
        <div id="menu">
            <div id="link-1"><a href="../crud.html">Inicio</a></div>
        </div>
    </nav>
    <div id="general">
        <table>
            <thead>
            <tr>
                <th>idJesuita</th>
                <th>nombre</th>
                <th>Firma</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($fila=$objeto->extraerFilas())
            {
                ?>
                <tr>
                    <td><?php echo $fila['idJesuita'] ?></td>
                    <td><?php echo $fila['Nombre'] ?></td>
                    <td><?php echo $fila['Firma'] ?></td>
                    <td><a href="../editar/editJesuita.php?idJesuita=<?php echo $fila['idJesuita']?>">Editar</a></td>
                    <td><a href="../eliminar/deleteJesuita.php?idJesuita=<?php echo $fila['idJesuita']?>">Eliminar</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
