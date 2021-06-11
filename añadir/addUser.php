<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add USER</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="general">
    <div>
        <h3>Añadir Usuarios</h3>
        <form method="post">
            <label>IP</label>
            <input type="text" name="ip"><br><br>
            <label>nombreAlumno</label>
            <input type="text" name="nombreAlumno"><br><br>
            <label>Usuario</label>
            <input type="text" name="usuario"><br><br>
            <label>idJesuita</label>
            <input type="text" name="idJesuita"><br><br>
            <label>idLugar</label>
            <input type="text" name="idLugar"><br><br>
            <label>tipo</label>
            <input type="text" name="tipo"><br><br>
            <label>idUsuario</label>
            <input type="text" name="idUsuario"><br><br>
            <label>password</label>
            <input type="text" name="password"><br/><hr>
            <input type="submit" value="Agregar usuario" name="enviar">
            <a href="../crud.html">Volver</a>
        </form>
        <?php
            require '../Operaciones.php';
            if (isset($_POST['enviar']))
            {
                //recoge los datos del formulario
                $ip=$_POST["ip"];
                $nAlumno=$_POST["nombreAlumno"];
                $usuario=$_POST["usuario"];
                $idJ=$_POST["idJesuita"];
                $idL=$_POST["idLugar"];
                $tipo=$_POST["tipo"];
                $idU=$_POST["idUsuario"];
                $pass = password_hash($_POST["password"],PASSWORD_DEFAULT); //encripta la contraseña

                if($ip != NULL && $nAlumno != NULL && $usuario != NULL && $idU != NULL && $tipo != NULL && $pass != NULL)
                {//si los valores son distintos a null entra en el bucle
                    $sql="INSERT INTO maquina(ip,nombreAlumno,usuario,idJesuita,idLugar,tipo,idUsuario,password) 
                            VALUES ('".$ip."','".$nAlumno."','".$usuario."','".$idJ."','".$idL."','".$tipo."','".$idU."','".$pass."')";//consulta de insercion de datos
                    $objeto=new operaciones();
                    $objeto->realizarConsultas($sql);//consulta de insercion de datos
                    if($ip =1)
                    {
                        echo 'Maquina añadido correctamente.';
                        //print_r($sql);
                        header("location:../listar/listUsers.php");//si hay un usuario vuelve a la pagina anterior
                    }echo 'Datos incorrectos';
                }
            }
        ?>
    </div>
</div>
</body>
</html>
