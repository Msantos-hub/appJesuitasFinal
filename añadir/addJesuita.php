<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Jesuita</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="general">
        <div>
            <h3>Añadir Jesuitas</h3>
            <form method="post">
                <label>idJesuita</label>
                <input type="text" name="idJesuita"><br><br>
                <label>nombreAlumno</label>
                <input type="text" name="nombre"><br><br>
                <label>Firma</label>
                <input type="text" name="Firma"><br><hr/>
                <input type="submit" value="Agregar Jesuita" name="enviar">
                <a href="../crud.html">Volver</a>
            </form>
            <?php
                require '../Operaciones.php';
                if (isset($_POST['enviar']))
                {
                    $idJesuita=$_POST["idJesuita"]; //recoge los datos del formulario
                    $nombre=$_POST["nombre"];
                    $firma=$_POST["Firma"];
                    if($idJesuita != NULL && $nombre != NULL && $firma != NULL)
                    { //si los valores son distintos a null entra en el bucle
                        $objeto=new operaciones(); //instancia la clase
                        $sql="INSERT INTO jesuita(idJesuita,Nombre,Firma) VALUES ('".$idJesuita."','".$nombre."','".$firma."')"; //consulta de insercion de datos
                        $objeto->realizarConsultas($sql);
                        if($idJesuita =1)
                        {
                            echo 'Jesuita añadido correctamente.';
                           header('location:../listar/listJesuita.php'); //si hay un jesuita vuelve a la pagina anterior

                        }
                    }echo 'Datos incorrectos';
                }
            ?>
        </div>
    </div>
</body>
</html>
