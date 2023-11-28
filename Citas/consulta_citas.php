<?php
include '../CONEXION.php';

$alert = '';
$Fecha = '';

if (isset($_GET['id'])) {
    $id_cita_consulta = $_GET['id'];

    $query_consulta = mysqli_query($conn, "SELECT c.ID_Cita, c.Fecha, c.Consultorio, d.Nombre AS NombreDoctor, p.Nombre AS NombrePaciente
        FROM citas c
        LEFT JOIN doctor d ON c.ID_Doctor = d.ID_Doctor
        LEFT JOIN paciente p ON c.ID_Paciente = p.ID_Paciente
        WHERE c.ID_Cita = $id_cita_consulta");

    $result_consulta = mysqli_num_rows($query_consulta);

    if ($result_consulta > 0) {
        $data_consulta = mysqli_fetch_assoc($query_consulta);
        $Fecha = isset($data_consulta['Fecha']) ? $data_consulta['Fecha'] : 'Fecha';
    } else {
        header("Location: citas.php"); // Redirigir a la lista de citas si no se encuentra la cita
        exit();
    }
} else {
    header("Location: citas.php"); // Redirigir a la lista de citas si no se proporciona el ID de la cita
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cita</title>
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="icon" href="../img/logologin.jpg">
</head>

<body>
    <div class="container">
        <h1>Fecha: <?php echo $Fecha; ?> </h1>

        <table>
            <?php
            $etiquetas_personalizadas = array(
                'ID_Cita' => 'ID de la cita',
                'Fecha' => 'Fecha',
                'Consultorio' => 'Consultorio',
                'NombreDoctor' => 'Nombre del Doctor',
                'NombrePaciente' => 'Nombre del Paciente'
            );

            foreach ($data_consulta as $key => $value) {
                ?>
                <tr>
                    <td><?php echo isset($etiquetas_personalizadas[$key]) ? $etiquetas_personalizadas[$key] : $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <a href="citas.php" class="btn-actualizar">Volver a la lista de citas</a>
    </div>
</body>

</html>
