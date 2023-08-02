<?php
require_once '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $referencia = $_POST['referencia'];
    $precio = (int)$_POST['precio'];
    $peso = (int)$_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = (int)$_POST['stock'];
    $fecha_creacion = $_POST['fecha_creacion'];

    $sql = "INSERT INTO productos (nombre_producto, referencia, precio, peso, categoria, stock, fecha_creacion)
            VALUES (:nombre, :referencia, :precio, :peso, :categoria, :stock, :fecha_creacion)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':referencia', $referencia);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':peso', $peso);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':fecha_creacion', $fecha_creacion);
        $stmt->execute();
        header('Location: ../index.php');
    } catch (PDOException $e) {
        die("Error al crear el producto: " . $e->getMessage());
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
                    <a href="../product/addProduct.php" id="updatePasswordLink">Crear producto</a>
                    <a href="../product/productWithMoreStock.php" id="updatePasswordLink">Producto con más stock</a>
                    <a href="../product/product_bestseller.php" id="updatePasswordLink">Producto más vendido</a>
                    <a href="../sales/makeSale.php" id="updatePasswordLink">Realizar ventas</a>
                    <a href="../index.php" id="updatePasswordLink">Listar productos</a>
                </div>
            </div>
        </div>
        <div class="main-container">
            <main>
                <h2>Crear Nuevo Producto</h2>
                <form method="POST">
                    Nombre: <input type="text" name="nombre" required><br>
                    Referencia: <input type="text" name="referencia" required><br>
                    Precio: <input type="number" name="precio" required><br>
                    Peso: <input type="number" name="peso" required><br>
                    Categoría: <input type="text" name="categoria" required><br>
                    Stock: <input type="number" name="stock" required><br>
                    Fecha de creación: <input type="date" name="fecha_creacion" required><br>
                    <input type="submit" value="Guardar">
                </form>
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