<?php
include 'conexion.php';
class procesosApp
{
    public $mysqli;
    function iniciosession($usuario, $password,$tipo)
    {
        // Establece la conexion
        $this->mysqli = new mysqli(servidor, usuario, password, basedatos);

        // Analizar Consulta
        $consulta = $this->mysqli->prepare("SELECT * FROM maquina WHERE usuario=? AND tipo=?");

        // Preparar Consulta
        $consulta->bind_param("ss", $usuario, $tipo);

        // Ejecutar consulta
        $consulta->execute();

        // Devuelve la fila
        $resultado = $consulta->get_result();

        // Si hay filas afectadas, es correcto.
        if($resultado->num_rows>0)
        {
            $fila = $resultado->fetch_array();

            echo '<br>'.$fila["password"].'';
            if (password_verify($password, $fila["password"]))
            {
                // Usuario correcto
                return 'true';
            }
            else
            {
                // password incorrecto
                return 'false';
            }
        }
        else
        {
            // usuario incorrecto
            return 'false';
        }

    }
}