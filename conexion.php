<?php
function conectar()
    {
        $conexion = mysqli_connect("localhost","root","usbw","eval02");
        return $conexion;
        die();
    }
function desconectar($conn)
    {
        mysqli_close($conn);
    }
?>