<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos para Mantenimiento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <div class="top-bar">
        <!-- Agregar aquí el icono de búsqueda -->
        <i class="fas fa-search"></i>
        <div class="user-info">
            <img class="avatar" src="./img/lugo.jpeg" alt="Foto de Usuario">
            <span class="span">Carlos Andres Lugo</span>
            <!-- Agregar aquí el icono de cerrar sesión -->
            <i class="fas fa-sign-out-alt" id="logoutBtn"></i>
        </div>
    </div>
    <div class="container-main">
        <div class="sidebar">
            <img src="./img/coffee.webp" width="100" alt="Imagen del sistema">
            <div class="dropdown">
                <button>Menu</button>
                <div class="dropdown-content">
                    <!-- Add the ID to the link here -->
                    <a href="./product/productWithMoreStock.php" id="updatePasswordLink">Producto con más stock</a>
                    <a href="./product/product_bestseller.php" id="updatePasswordLink">Producto más vendido</a>
                    <a href="./sales/makeSale.php" id="updatePasswordLink">Realizar ventas</a>
                </div>
            </div>
        </div>
        <div class="main-container">
            <main>
                <br>
            <a href="./product/addProduct.php" class="btn btn-primary">Agregar</a>
                <?php
                require_once 'db_connection.php';

                try {
                    $stmt = $conn->query("SELECT * FROM productos");
                    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    die("Error al obtener los productos: " . $e->getMessage());
                }
                ?>
                    <h2>Listado de Productos</h2>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Fecha de Creación</th>
                        </tr>
                        <?php foreach ($productos as $producto) { ?>
                            <tr>
                                <td><?php echo $producto['id']; ?></td>
                                <td><?php echo $producto['nombre_producto']; ?></td>
                                <td><?php echo $producto['referencia']; ?></td>
                                <td><?php echo $producto['precio']; ?></td>
                                <td><?php echo $producto['peso']; ?></td>
                                <td><?php echo $producto['categoria']; ?></td>
                                <td><?php echo $producto['stock']; ?></td>
                                <td><?php echo $producto['fecha_creacion']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
            </main>
            <div class="footer">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , Hecho con ❤️ por
                        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Lugo</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</body>

</html>