<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ranking visitas</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <<nav>
            <div id="menu">
                <div id="link-1"><a href="paginaInicio.php">Inicio</a></div>
                <div id="link-2"><a href="visitas.php">Visitas</a></div>
                <div id="link-3"><a href="rankingvisitas.php">Rankings</a></div>
                <div id="link-5"><a href="logout.php">Cerrar Sesion</a></div>
            </div>
        </nav>
    <div id="general">
        <?php
            require 'Operaciones.php';
            $objeto=new operaciones();

            /*Consulta para mostrar los 5 lugares con mas visitas*/
            $sql="select v.ip,lugar, count(v.ip) AS contador from Visita v INNER JOIN Lugar l ON l.ip=v.ip group by v.ip having contador ORDER by contador desc LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<div>';
                echo '<h2>Ranking 5 Lugares Mas Visitados</h2>';
                    if ($objeto->comprobar()>0){
                        echo '<table>';
                            echo '<tr>';
                                echo '<th>Ciudad</th><th>Numero de visitas</th>';
                                while($fila=$objeto->extraerFilas())
                                {
                                    echo '<tr><td>'.$fila["lugar"].'</td> <td class="centrarvisita">'.$fila["contador"].'</td></tr>';
                                }
                            echo '</tr>';
                        echo '</table>';
                    }
                    else{
                        echo' No hay visitas a ningun lugar';
                    }
            echo '</div>';

            /*Consulta para mostrar los 5 jesuitas con mas visitas*/
            $sql="SELECT v.idJesuita,j.nombre, COUNT(*) AS visitas FROM Visita v INNER JOIN Jesuita j ON v.idJesuita=j.idJesuita GROUP BY idJesuita ORDER BY COUNT(*) DESC LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<div>';
                echo '<h2>Ranking 5 Jesuitas Mas Viajeros</h2>';
                        if ($objeto->comprobar()>0){
                            echo '<table>';
                                echo '<tr>';
                                    echo '<th>Lugar</th> <th>Numero de visitas</th>';
                                    while($fila=$objeto->extraerFilas())
                                    {
                                        echo '<tr><td>'.$fila["nombre"].'</td> <td class="centrarvisita">'.$fila["visitas"].'</td></tr>';
                                    }
                                echo '</tr>';
                            echo '</table>';
                        }
                        else{
                            echo' No hay jesuitas viajando';
                        }
            echo '</div>';

            /*Consulta para mostrar los 5 visitas*/
            $sql="SELECT nombre, lugar, DATE_FORMAT(fechaHora, '%H:%I:%S' ) as hora   FROM Visita v INNER JOIN Jesuita j ON v.idJesuita=j.idJesuita INNER JOIN Lugar l ON v.ip=l.ip ORDER BY fechaHora DESC LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<div>';
                echo '<h2>Ultimas 5 Visitas</h2>';
                if ($objeto->comprobar()>0){
                    echo '<div id="ultimasVisitas">';
                    while($fila=$objeto->extraerFilas())
                    {
                        echo $fila["nombre"].' ha visitado '.$fila["lugar"].' a las '.$fila["hora"].'<br>';
                    }
                    echo '</div>';
                }
                else{
                    echo' No hay ultimas visitas';
                }
            echo '</div>';

            $sql="SELECT COUNT(*) FROM Visita";
            $objeto->realizarConsultas($sql);
            echo '<div>';
                echo '<h2>Total de visitas realizadas</h2>';
                if ($objeto->comprobar()>0){
                    echo '<div id="ultimasVisitas">';
                    while($fila=$objeto->extraerFilas())
                    {
                        echo $fila["idVisita"].'Visitas realizadas.<br>';
                    }
                    echo '</div>';
                }
                else{
                    echo' No hay ultimas visitas';
                }
            echo '</div>';

            $sql="select v.ip,lugar, count(v.ip) AS contador from Visita v INNER JOIN Lugar l ON l.ip=v.ip group by v.ip having contador ORDER by contador desc";
            $objeto->realizarConsultas($sql);
            echo '<div>';
            echo '<h2>Jesuitas sin viajar</h2>';
            if ($objeto->comprobar()==0){
                while($fila=$objeto->extraerFilas())
                {
                    echo 'Nombre: '.$fila["nombre"].'<br/>';
                }
            }
            else{
                echo' No hay jesuitas que no hayan viajado viajando';
            }
            echo '</div>';

        $sql="SELECT v.idJesuita,j.nombre, COUNT(*) AS visitas FROM visita v INNER JOIN Jesuita j ON v.idJesuita=j.idJesuita GROUP BY idJesuita ORDER BY COUNT(*) DESC LIMIT 5";
        $objeto->realizarConsultas($sql);
        echo '<h2>Lugares sin visitar</h2>';
        if ($objeto->comprobar()==0){
            while($fila=$objeto->extraerFilas())
            {
                echo 'Nombre:'.$fila["nombre"].'<br/>';
            }
        }
        else{
            echo' No hay lugares sin visitar';
        }
        echo '</div>';
        ?>

    </div>
    </body>
</html>
