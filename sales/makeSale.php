<?php
include '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = (int)$_POST['producto_id'];
    $cantidad_vendida = (int)$_POST['cantidad_vendida'];

    try {
        $stmt = $conn->prepare("SELECT stock FROM productos WHERE id = :producto_id");
        $stmt->bindParam(':producto_id', $producto_id);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($producto['stock'] >= $cantidad_vendida) {
            $nuevo_stock = $producto['stock'] - $cantidad_vendida;

            $conn->beginTransaction();

            $stmt = $conn->prepare("UPDATE productos SET stock = :nuevo_stock WHERE id = :producto_id");
            $stmt->bindParam(':nuevo_stock', $nuevo_stock);
            $stmt->bindParam(':producto_id', $producto_id);
            $stmt->execute();

            $stmt = $conn->prepare("INSERT INTO ventas (producto_id, cantidad_vendida, fecha_venta)
                                   VALUES (:producto_id, :cantidad_vendida, CURDATE())");
            $stmt->bindParam(':producto_id', $producto_id);
            $stmt->bindParam(':cantidad_vendida', $cantidad_vendida);
            $stmt->execute();

            $conn->commit();
            $showAlert = true;
            
        } else {
            echo "No es posible realizar la venta. El producto no cuenta con suficiente stock.";
        }
    } catch (PDOException $e) {
        $conn->rollBack();
        die("Error al realizar la venta: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos para Mantenimiento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/makeSale.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="top-bar">
        <!-- Agregar aquí el icono de búsqueda -->
        <i class="fas fa-search"></i>
        <div class="user-info">
            <img class="avatar" src="../img/lugo.jpeg" alt="Foto de Usuario">
            <span class="span">Carlos Andres Lugo</span>
            <!-- Agregar aquí el icono de cerrar sesión -->
            <i class="fas fa-sign-out-alt" id="logoutBtn"></i>
        </div>
    </div>
    <div class="container-main">
        <div class="sidebar">
            <img src="../img/coffee.webp" width="100" alt="Imagen del sistema">
            <div class="dropdown">
                <button>Mas opciones</button>
                <div class="dropdown-content">
                    <!-- Add the ID to the link here -->
                    <a href="../product/productWithMoreStock.php" id="updatePasswordLink">Producto con más stock</a>
                    <a href="../product/product_bestseller.php" id="updatePasswordLink">Producto más vendido</a>
                    <a href="../sales/makeSale.php" id="updatePasswordLink">Realizar ventas</a>
                    <a href="../index.php" id="updatePasswordLink">Listar productos</a>
                </div>
            </div>
        </div>
        <div class="main-container">
            <main>
                <h2>Realizar Venta</h2>
                <form method="POST">
                    Producto:
                    <select name="producto_id" required>
                        <?php
                        try {
                            $stmt = $conn->query("SELECT id, nombre_producto FROM productos");
                            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } catch (PDOException $e) {
                            die("Error al obtener los productos: " . $e->getMessage());
                        }

                        ?>
                        <?php foreach ($productos as $producto) { ?>
                            <option value="<?php echo $producto['id']; ?>">
                                <?php echo $producto['nombre_producto']; ?>
                            </option>
                        <?php } ?>
                    </select><br>
                    Cantidad Vendida: <input type="number" name="cantidad_vendida" required><br>
                    <input type="submit" value="Realizar Venta">
                </form>
            </main>
            <div class="footer">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©
                        <>
                            document.write(new Date().getFullYear());
                        </>
                        , Hecho con ❤️ por
                        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">A. Lugo</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js'></script><script>
    <?php
    if($showAlert){
        echo "
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Venta realizada con éxito.',
            showConfirmButton: false,
            timer: 1500
        })</script>";
    }
    ?>
</body>

</html>