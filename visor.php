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
                echo '<div class="img"><img src="./imagenes_productos/productos/' . $row["imagen1"] . '"></div>';
                echo '<div><img src="./imagenes_productos/productos/' . $row["imagen2"] . '"></div>';
                echo '<div><img src="./imagenes_productos/productos/' . $row["imagen3"] . '"></div>';
                echo '</div>';
                echo '<h2>' . $row["marca"] . '</h2>';
                echo '<h3>' . $row["modelo"] . '</h3>';
                echo '<ul>';
                echo '<li>Descripción: ' . $row["descripcion"] . '</li>';
                echo '<li>Precio: ' . $row["garantia"] . '</li>';
                echo '<li>Precio: ' . $row["pn"] . '</li>';
                echo '<li>Precio: ' . $row["cantidad"] . '</li>';
                echo '<li>Precio: ' . $row["costo"] . '</li>';
                // Agrega aquí más detalles del producto si los tienes en la base de datos
                echo '</ul>';
                echo '</div>';
            }
        } else {
            echo 'No se encontraron productos.';
        }

        
        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        
        // Ejecutar la consulta SQL
        $sql = "SELECT id, MAX(fecha) AS fecha_mas_reciente FROM productos GROUP BY id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Mostrar la fecha más reciente de cada producto
            while ($row = $result->fetch_assoc()) {
                $producto_id = $row["id"];
                $fecha_mas_reciente = $row["fecha_mas_reciente"];
              
            }
        } else {
            echo "No se encontraron productos en la base de datos.";
        }
        
        // Cerrar la conexión a la base de datos
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




<span>Actualizado <a><?php echo $fecha_mas_reciente; ?></a></span>



        <br>
        <span>Created By <a href="https://www.integratic.com.co">Integratic</a> | <span class="far fa-copyright"></span> 2023 All rights reserved.</span>
    </footer>
</body>
</html>

