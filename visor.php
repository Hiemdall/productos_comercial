<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agrega tus enlaces CSS y scripts aquí -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="estilo_card.css">
</head>
<body>
    <h1>Inventario Disponible Integratic S.A.S</h1>
    <div class="product-list">
        <?php
        include_once 'conexion.php'; // Incluye el archivo de conexión a la base de datos

        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<img src="./imagenes_productos/productos/' . $row["logo"] . '" alt="Logo del producto" style="width: 70px; height: 70px;">';
                echo '<div class="carrusel">';
                echo '<div><img src="./imagenes_productos/productos/' . $row["imagen1"] . '"></div>';
                echo '<div><img src="./imagenes_productos/productos/' . $row["imagen2"] . '"></div>';
                echo '<div><img src="./imagenes_productos/productos/' . $row["imagen3"] . '"></div>';
                echo '</div>';
                echo '<h2>' . $row["nombre"] . '</h2>';
                echo '<ul>';
                echo '<li>Descripción: ' . $row["descripcion"] . '</li>';
                echo '<li>Precio: ' . $row["precio"] . ' Pesos</li>';
                // Agrega aquí más detalles del producto si los tienes en la base de datos
                echo '</ul>';
                echo '</div>';
            }
        } else {
            echo 'No se encontraron productos.';
        }

        $conn->close();
        ?>
    </div>
    <script>
        $(document).ready(function(){
            $('.carrusel').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                adaptiveHeight: true,
                arrows: false
            });
        });
    </script>
    <footer>
        <span>Actualizado <a>21/03/2023</a></span>
        <br>
        <span>Created By <a href="https://www.integratic.com.co">Integratic</a> | <span class="far fa-copyright"></span> 2023 All rights reserved.</span>
    </footer>
</body>
</html>

