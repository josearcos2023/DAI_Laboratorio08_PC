<?php
include ('../conexion.php');

$conexion=conectar();

$idProducto=$_POST['IdProducto'];

$query = $conexion->prepare('SELECT IdProducto, Nombre, Descripcion, Stock, PrecioVenta FROM producto WHERE IdProducto = ?');
$query->bind_param('i',$idProducto);
$query->execute();

$resultado = $query->get_result();

desconectar($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Editar Producto</title>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
            <form method="post" action="editar_producto_registro.php">
                <input type="hidden" name="IdProducto" id="IdProducto" value="<?php echo $idProducto ?>">
                <table border=0>
                    <?php
                        $producto = $resultado->fetch_assoc();
                        $nombre=$producto['Nombre'];
                        $descripcion=$producto['Descripcion'];
                        $stock=$producto['Stock'];
                        $precioVenta=$producto['PrecioVenta'];
                    ?>
                    <tr>
                        <td>Nombre: </td><td><input type="text" name="Nombre" id="Nombre" size="40" value='<?php echo $nombre ?>'></td>
                    </tr>
                    <tr>
                        <td>Descripción: </td><td><input type="text" name="Descripcion" id="Descripcion" size="40" value='<?php echo $descripcion ?>'></td>
                    </tr>
                    <tr>
                        <td>Stock: </td><td><input type="number" name="Stock" id="Stock" size="40" value='<?php echo $stock ?>'></td>
                    </tr>
                    <tr>
                        <td>Precio: </td><td><input type="number" step="0.01" min="0" name="PrecioVenta" id="PrecioVenta" size="40" value='<?php echo $precioVenta ?>'></td>
                    </tr>
                </table>
                    <div class="mt-2">
                        <button class="btn btn-success" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="button" onclick="location.href='productos.php'">Regresar</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>