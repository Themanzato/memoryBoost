<?php
include '../CONEXION.php';

$alert = '';
$nombre_paciente = '';

if (isset($_GET['id_paciente'])) {
    $id_paciente_consulta = $_GET['id_paciente'];

    $query_consulta = mysqli_query($conn, "SELECT p.Nombre FROM paciente p WHERE p.ID_paciente = $id_paciente_consulta");
    $result_consulta = mysqli_num_rows($query_consulta);

    if ($result_consulta > 0) {
        $data_consulta = mysqli_fetch_assoc($query_consulta);
        $nombre_paciente = isset($data_consulta['Nombre']) ? $data_consulta['Nombre'] : 'Nombre no disponible';
    } else {
        header("Location: control.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Control</title>
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="icon" href="../img/logologin.jpg">
</head>

<body>
    <div class="container">
        

        <table>
            <?php
            $alert = '';

            if (isset($_GET['id'])) {
                $id_paciente_consulta = $_GET['id'];

                $query_consulta = mysqli_query($conn, "SELECT  p.Nombre AS NombrePaciente, c.Diagnostico
                FROM Control c
                JOIN paciente p ON c.ID_paciente = p.ID_paciente
                WHERE c.ID_paciente = $id_paciente_consulta");
                $result_consulta = mysqli_num_rows($query_consulta);

                if ($result_consulta > 0) {
                    $data_consulta = mysqli_fetch_assoc($query_consulta);

                    $etiquetas_personalizadas = array(
                        
                        'Diagnostico' => 'Diagnóstico',
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
                } else {
                    header("Location: paciente_principal.php");
                    exit();
                }
            }
            ?>
        </table>

        <a href="control.php" class="btn-actualizar">Volver a la lista de control</a>
    </div>
</body>

</html>
