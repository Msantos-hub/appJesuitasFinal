<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Lugar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="general">
    <div>
        <h3>Añadir Lugares</h3>
        <form method="post">
            <label>Nombre</label>
            <input type="text" name="nombre"><br><hr/>
            <input type="submit" value="Agregar Lugar" name="enviar">
            <a href="../crud.html">Volver</a>
        </form>
        <?php
            require '../Operaciones.php';
            if (isset($_POST['enviar']))
            {
                $objeto=new operaciones();//instancia la clase
                $nombre=$_POST["nombre"];
                if($nombre != NULL)
                {//si los valores son distintos a null entra en el bucle
                    $sql="INSERT INTO lugar(nombre) VALUES ('".$nombre."')";//consulta de insercion de datos
                    $objeto->realizarConsultas($sql);
                    if($idLugar =1)
                    {
                        echo 'Lugar añadido correctamente.';
                        header("location:../listar/listLugar.php");//si hay un lugar vuelve a la pagina anterior
                    }
                }echo 'Datos incorrectos';
            }
        ?>
    </div>
</div>
</body>
</html>
