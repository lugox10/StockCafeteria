<?php
include '../db_connection.php';

try {
    $stmt = $conn->query("SELECT * FROM productos ORDER BY stock DESC LIMIT 1");
    $producto_mas_stock = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener el producto con más stock: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto con más stock</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/product_bestseller.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="top-bar">
        <i class="fas fa-search"></i>
        <div class="user-info">
            <img class="avatar" src="../img/lugo.jpeg" alt="Foto de Usuario">
            <span class="span">Carlos Andres Lugo Mesa _</span>
            <i class="fas fa-sign-out-alt" id="logoutBtn"></i>
        </div>
    </div>
    <div class="container-main">
        <div class="sidebar">
            <img src="../img/coffee.webp" width="100" alt="Imagen del sistema">
            <div class="dropdown">
                <button>Mas opciones</button>
                <div class="dropdown-content">
                    <a href="../product/addProduct.php" id="updatePasswordLink">Agregar producto</a>
                    <a href="../product/productWithMoreStock.php" id="updatePasswordLink">Producto con más stock</a>
                    <a href="../product/product_bestseller.php" id="updatePasswordLink">Producto más vendido</a>
                    <a href="../sales/makeSale.php" id="updatePasswordLink">Realizar ventas</a>
                    <a href="../index.php" id="updatePasswordLink">Listar productos</a>
                </div>
            </div>
        </div>
        <div class="main-container">
            <main>
                <h2>Producto con más stock</h2>
                <?php if ($producto_mas_stock) { ?>
                    <p>Producto: <?php echo $producto_mas_stock['nombre_producto']; ?></p>
                    <p>Stock: <?php echo $producto_mas_stock['stock']; ?></p>
                <?php } else { ?>
                    <p>No hay productos registrados.</p>
                <?php } ?>
            </main>
            <div class="footer">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , Hecho con ❤️ por
                        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">A. Lugo</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</body>

</html>