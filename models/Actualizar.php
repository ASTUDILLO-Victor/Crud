<?php
// Configuración de la conexión a la base de datos
require "../conexion/conn.php";

// Procesar el formulario de actualización cuando se envíe

    $cedula = $_POST["Ecedu"];
    $nombre = $_POST["Enom"];
    $ape = $_POST["Eape"];

    // Consulta SQL para actualizar el registro
    $sql = "UPDATE pru SET nom='$nombre', ape='$ape' WHERE ce='$cedula'";

    if ($conn->query($sql) === TRUE) {
        // Actualización exitosa
        echo "Registro actualizado correctamente";
        // Redirigir al usuario de vuelta a index.php
        header("Location: ../idex.php");
        exit(); // Es importante salir del script después de redirigir

    } else {
        // Error en la actualización
        echo "Error al actualizar el registro: " . $conn->error;
    }




