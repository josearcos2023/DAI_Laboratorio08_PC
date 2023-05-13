<?php
include ('../conexion.php');

$conexion=conectar();

$prodBusc=$_POST['prodBusc'];

$query = $conexion->prepare("SELECT * FROM producto WHERE Nombre LIKE '%$prodBusc%'");
// $query->bind_param('s',$prodBusc);
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
    <title>Productos</title>
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
                    <div>
                    <form class="d-flex" role="search" action="productos_busqueda.php" method="post">
                            <input class="form-control me-2" type="search" placeholder="Buscar" name="prodBusc" id="prodBusc" >
                            <button class="btn btn-light" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
            <h1>Productos</h1>
            <a href="agregar_producto.html">Nuevo Producto</a>
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th colspan="3">ACCIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($producto = $resultado->fetch_assoc())
                        {
                            $IdProducto=$producto['IdProducto'];
                            $nombre=$producto['Nombre'];
                            $descripcion=$producto['Descripcion'];
                            $stock=$producto['Stock'];
                            $precioVenta=$producto['PrecioVenta'];

                            echo '<tr>';
                            echo '<td>'.$IdProducto.'</td>';
                            echo '<td>'.$nombre.'</td>';
                            echo '<td>'.$descripcion.'</td>';
                            echo '<td>'.$stock.'</td>';
                            echo '<td>'.$precioVenta.'</td>';
                            echo '<form action="eliminar_producto.php" method="post">';
                            echo '<input type="hidden" name="IdProducto" value="'.$IdProducto.'">';
                            echo '<td><button class="btn btn-danger" type="submit">Eliminar</button></td>';
                            echo '</form>';
                            echo '<form action="editar_producto.php" method="post">';
                            echo '<input type="hidden" name="IdProducto" value="'.$IdProducto.'">';
                            echo '<td><button class="btn btn-success" type="submit">Editar</button></td>';
                            echo '</form>';     
                            echo '</tr>';
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>