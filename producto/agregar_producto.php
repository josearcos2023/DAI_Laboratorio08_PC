<?php
include('../conexion.php');

$nombre=$_POST['Nombre'];
$descripcion=$_POST['Descripcion'];
$stock=$_POST['Stock'];
$precioVenta=$_POST['PrecioVenta'];

$conexion=conectar();

$query = $conexion->prepare("INSERT INTO producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES (?, ?, ?, ?)");

$query->bind_param('ssid',$nombre,$descripcion,$stock,$precioVenta);
$msg = '';
if ($query->execute()){
    $msg = 'Producto Registrado!';
} else {
    $msg='No se pudo registrar el producto';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Nuevo Autor</title>
</head>
<body>
    <div class="m-0">
        <nav class="navbar navbar-expand-lg navbar-success bg-success">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Práctica Calificada</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link disabled">Quiénes somos</a>
                        <a href="productos.php" class="nav-item nav-link">Productos</a>
                        <a href="#" class="nav-item nav-link disabled">Proveedores</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <h1>Nuevo Producto</h1>
    <h3><?php echo $msg; ?></h3>
    <div>
        <button class="btn btn-danger" type="button" onclick="location.href='productos.php'">Regresar</button>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>
