<?php
include "conexion/conn.php";

// Función para eliminar un registro
function eliminarRegistro($ce) {
    global $conn;
    $sql = "DELETE FROM pru WHERE ce = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ce);
    $stmt->execute();
    $stmt->close();
}

// Si se ha enviado una solicitud de eliminación
if (isset($_POST['eliminar_ce'])) {
    $ce_a_eliminar = $_POST['eliminar_ce'];
    eliminarRegistro($ce_a_eliminar);
}

$sql = "SELECT ce, nom, ape FROM pru WHERE ce != 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["ce"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nom"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["ape"]) . "</td>";
        echo "<td><button onclick=\"aparezcaModal('" . htmlspecialchars($row['ce']) . "', '" . htmlspecialchars($row['nom']) . "', '" . htmlspecialchars($row['ape']) . "')\" type='button' class='btn btn-warning'>Editar</button></td>";
        // Formulario para enviar la solicitud de eliminación
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='eliminar_ce' value='" . htmlspecialchars($row['ce']) . "'>
                    <button type='submit' class='btn btn-danger'>Eliminar</button>
                </form>
            </td>";
        echo "</tr>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
