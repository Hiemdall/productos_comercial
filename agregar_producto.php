<?php
include_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $descripcion = $_POST["descripcion"];
    $garantia = $_POST["garantia"];
    $pn = $_POST["pn"];
    $cantidad = $_POST["cantidad"];
    $costo = $_POST["costo"];
    $fecha = $_POST["fecha"];

    $imagen1 = $_FILES["imagen1"]["name"];
    $imagen2 = $_FILES["imagen2"]["name"];
    $imagen3 = $_FILES["imagen3"]["name"];

    $uploadDir = "./imagenes_productos/productos/";

    // Mover los archivos subidos a la carpeta de destino
    if (move_uploaded_file($_FILES["imagen1"]["tmp_name"], $uploadDir . $imagen1) &&
        move_uploaded_file($_FILES["imagen2"]["tmp_name"], $uploadDir . $imagen2) &&
        move_uploaded_file($_FILES["imagen3"]["tmp_name"], $uploadDir . $imagen3)) {
        
        // Corregir la consulta SQL y agregar una coma antes de $imagen1
        $sql = "INSERT INTO productos (marca, modelo, descripcion, garantia, pn, cantidad, costo, fecha, imagen1, imagen2, imagen3) 
                VALUES ('$marca', '$modelo', '$descripcion', '$garantia', '$pn', '$cantidad', '$costo', '$fecha', '$imagen1', '$imagen2', '$imagen3')";

        if ($conn->query($sql) === TRUE) {
            echo "Producto agregado exitosamente.";
        } else {
            echo "Error al agregar el producto: " . $conn->error;
        }

        // Cerramos la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error al subir archivos.";
    }
}
?>
=======
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
   

    $logo = $_FILES["logo"]["name"];
    $imagen1 = $_FILES["imagen1"]["name"];
    $imagen2 = $_FILES["imagen2"]["name"];
    $imagen3 = $_FILES["imagen3"]["name"];
}
    $uploadDir = "./imagenes_productos/productos/";

    // Mover los archivos subidos a la carpeta de destino
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $uploadDir . $logo) &&
        move_uploaded_file($_FILES["imagen1"]["tmp_name"], $uploadDir . $imagen1) &&
        move_uploaded_file($_FILES["imagen2"]["tmp_name"], $uploadDir . $imagen2) &&
        move_uploaded_file($_FILES["imagen3"]["tmp_name"], $uploadDir . $imagen3)) {
        
       // Creamos la consulta para insertar el producto en la base de datos
    $sql = "INSERT INTO productos (nombre, descripcion, precio, logo, imagen1, imagen2, imagen3) VALUES ('$nombre', '$descripcion', $precio, '$logo', '$imagen1', '$imagen2', '$imagen3')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }

    // Cerramos la conexión a la base de datos
    $conn->close();
}
?>
>>>>>>> 2fe9e86f2b3eb6c914b58690cc0276a8f6d97799
