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
            $sql="select count(visita.idlugar) AS contador, lugar.nombre as nombre
                    from visita
                    INNER JOIN lugar ON lugar.idlugar=visita.idlugar 
                    group by visita.idlugar 
                    ORDER by contador desc LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<div>';
                echo '<h2>Ranking 5 Lugares Mas Visitados</h2>';
                    if ($objeto->comprobar()>0){
                        echo '<table>';
                            echo '<tr>';
                                echo '<th>Ciudad</th><th>Numero de visitas</th>';
                                while($fila=$objeto->extraerFilas())
                                {
                                    echo '<tr><td>'.$fila["nombre"].'</td> <td class="centrarvisita">'.$fila["contador"].'</td></tr>';
                                }
                            echo '</tr>';
                        echo '</table>';
                    }
                    else{
                        echo' No hay visitas a ningun lugar';
                    }
            echo '</div>';

            /*Consulta para mostrar los 5 jesuitas con mas visitas*/
            $sql="SELECT COUNT(visita.idJesuita) AS visita, jesuita.nombre AS nombre 
                    FROM visita 
                    INNER JOIN Jesuita ON jesuita.idJesuita=visita.idJesuita 
                    GROUP BY visita.idJesuita ORDER BY visita DESC LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<div>';
                echo '<h2>Ranking 5 Jesuitas Mas Viajeros</h2>';
                        if ($objeto->comprobar()>0){
                            echo '<table>';
                                echo '<tr>';
                                    echo '<th>Lugar</th> <th>Numero de visitas</th>';
                                    while($fila=$objeto->extraerFilas())
                                    {
                                        echo '<tr><td>'.$fila["nombre"].'</td> <td class="centrarvisita">'.$fila["visita"].'</td></tr>';
                                    }
                                echo '</tr>';
                            echo '</table>';
                        }
                        else{
                            echo' No hay jesuitas viajando';
                        }
            echo '</div>';

            /*Consulta para mostrar los 5 visitas*/
            $sql="SELECT jesuita.nombre as nombre, lugar.nombre as lugar, DATE_FORMAT(fechaHora, '%H:%I:%S' ) as hora 
                    FROM Visita  
                    INNER JOIN Jesuita  ON visita.idJesuita=jesuita.idJesuita 
                    INNER JOIN Lugar  ON visita.idlugar=lugar.idlugar 
                    ORDER BY hora DESC LIMIT 5";
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


            //total de visitas
            $sql="SELECT COUNT(numVisita) as total FROM Visita";
            $objeto->realizarConsultas($sql);
            echo '<div>';
                echo '<h2>Total de visitas realizadas</h2>';
                if ($objeto->comprobar()>0){
                    echo '<div id="ultimasVisitas">';
                    while($fila=$objeto->extraerFilas())
                    {
                        echo 'total de visitas realizadas '.$fila["total"].'<br>';
                    }
                    echo '</div>';
                }
                else{
                    echo' No hay ultimas visitas';
                }
            echo '</div>';

            $sql="select COUNT(visita.idlugar) as contador, lugar.nombre as nombre
                    from Visita  
                    INNER JOIN lugar ON lugar.idlugar=visita.idlugar 
                    group by visita.idlugar ORDER by contador desc";
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

        $sql="SELECT COUNT(visita.idJesuita) AS contador ,jesuita.nombre as nombre 
                FROM visita  
                INNER JOIN Jesuita  ON visita.idJesuita=jesuita.idJesuita 
                GROUP BY visita.idJesuita ORDER BY contador DESC LIMIT 5";
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

//        if (!isset($_COOKIE["visita"])){
//            setcookie("visita[]", "No hay visitas aun", time() + 0);
//        }
//        if (isset($_COOKIE["visita"])){
//            $_COOKIE["visita"][2]=$_COOKIE["visita"][1];
//            $_COOKIE["visita"][1]=$_COOKIE["visita"][0];
//            $_COOKIE["visita"][0]=$nombrelugar;
//        }
//        echo 'Estas son los tres ultimos lugares visitados: '.$_COOKIE["visita"][0].' --- '.$_COOKIE["visita"][1].' --- '.$_COOKIE["visita"][2];
        ?>
    </div>
    </body>
</html>
