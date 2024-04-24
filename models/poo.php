<?php
require "../conexion/conn.php";

class Usuario
{
    private $ce;
    private $nombre;
    private $apellido;
    private $conn;

    public function __construct($ce, $nombre, $apellido, $conn)
    {
        $this->ce = htmlspecialchars($ce); // Evitar XSS
        $this->nombre = htmlspecialchars($nombre); // Evitar XSS
        $this->apellido = htmlspecialchars($apellido); // Evitar XSS
        $this->conn = $conn;
    }

    public function obtener()
    {
        // Verificar si el número de cédula ya existe en la base de datos
        $sql_check = "SELECT * FROM pru WHERE ce = ?";
        $stmt_check = $this->conn->prepare($sql_check);
        $stmt_check->bind_param("s", $this->ce);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Si ya existe, redirigir con un mensaje de error
            header("Location: ../idex.php?error=cedula_existente");
            exit(); // Detener la ejecución del script después de la redirección
        } else {
            // Si no existe, realizar la inserción
            $sql_insert = "INSERT INTO pru (ce, nom, ape) VALUES (?, ?, ?)";
            $stmt_insert = $this->conn->prepare($sql_insert);
            $stmt_insert->bind_param("sss", $this->ce, $this->nombre, $this->apellido);
            
            if ($stmt_insert->execute()) {
                // Redirigir con un mensaje de éxito
                header("Location: ../idex.php?success=registro_exitoso");
                exit(); // Detener la ejecución del script después de la redirección
            } else {
                // Si hay un error en la inserción, mostrar un mensaje de error
                echo "Error al registrar el usuario: " . $stmt_insert->error;
            }
        }
    }
}

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron todos los datos necesarios
    if (isset($_POST["cedu"], $_POST["nom"], $_POST["ape"])) {
        // Crear una nueva instancia de Usuario
        $usuario = new Usuario($_POST["cedu"], $_POST["nom"], $_POST["ape"], $conn);
        // Llamar al método para insertar el usuario
        $usuario->obtener();
    } else {
        // Si faltan datos, redirigir con un mensaje de error
        header("Location: ../idex.php?error=falta_datos");
        exit(); // Detener la ejecución del script después de la redirección
    }
}
?>
