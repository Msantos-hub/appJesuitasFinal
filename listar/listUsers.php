<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar usuarios</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav>
    <div id="menu">
        <div id="link-1"><a href="../crud.html">Inicio</a></div>
    </div>
</nav>
    <div id="general">
        <table>
            <thead>
                <tr>
                    <th>ip</th>
                    <th>nombre Alumno</th>
                    <th>Usuario</th>
                    <th>idJesuita</th>
                    <th>idLugar</th>
                    <th>tipo</th>
                    <th>idUsuario</th>
                    <th>password</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                require '../Operaciones.php';
                $objeto=new operaciones();
                $sql="SELECT * FROM maquina";
                $objeto->realizarConsultas($sql);
                while($fila=$objeto->extraerFilas())
                {
                    echo '<tr>';
                    echo '<td>'.$fila['ip'].'</td>';
                    echo '<td>'.$fila['nombreAlumno'].'</td>';
                    echo '<td>'.$fila['usuario'].'</td>';
                    echo '<td>'.$fila['idJesuita'].'</td>';
                    echo '<td>'.$fila['idLugar'].'</td>';
                    echo '<td>'.$fila['tipo'].'</td>';
                    echo '<td>'.$fila['idUsuario'].'</td>';
                    echo '<td>'.$fila['password'].'</td>';
                    echo '<td><a href="../editar/editUser.php?ip='.$fila['ip'].'"> Editar </a> || <a href="../eliminar/deleteUser.php?ip='.$fila['ip'].'"> Eliminar </a></td>';

                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>