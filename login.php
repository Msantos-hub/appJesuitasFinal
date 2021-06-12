<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilologin.css">
</head>
<body>
<form method="post" action="login.php" name="signin-form">
    <div class="form-element">
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="Usuario" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Contraseña" required />
    </div>
    <button type="submit" name="enviar" value="login">Iniciar sesion</button>
    <?php
        include 'procesosApp.php';
        session_start(); //inicia la sesion
        if(isset($_POST['enviar'])){ // si se a pulsado el boton enviar entra en el if
            $usuario= $_POST['usuario']; //recoger variable
            $password=$_POST['password'];
            $tipo='u';

            $_SESSION['usuario']=$_POST['usuario'];
            $_SESSION['tipo']=$tipo;

            $objeto= new procesosApp(); //instancia el objeto
            $resultado=$objeto->iniciosession($usuario,$password,$tipo); // ejecuta la funcion inicio sesion

            if($resultado == 'true')
            { //si el resultado  es true entre en el bucle
                echo '<p class="success">inicio correcto</p>';
                $_SESSION['usuario'] = $usuario; // guarda el correo en la sesion
                header('location:paginaInicio.php');
            }else{
                echo '<p class="error">Error el usuario o la contraseña son incorrectos.</p>';
            }
        }
    ?>
</form>
</body>
</html>
