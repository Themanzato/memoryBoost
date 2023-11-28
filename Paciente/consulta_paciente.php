<?php
include '../CONEXION.php';

$alert = '';
$nombre_paciente = ''; 

if (isset($_GET['id'])) {
    $id_paciente_consulta = $_GET['id'];

    $query_consulta = mysqli_query($conn, "SELECT * FROM paciente WHERE ID_paciente = $id_paciente_consulta");
    $result_consulta = mysqli_num_rows($query_consulta);

    if ($result_consulta > 0) {
        $data_consulta = mysqli_fetch_assoc($query_consulta);
        $nombre_paciente = isset($data_consulta['Nombre']) ? $data_consulta['Nombre'] : 'Nombre no disponible';

        foreach ($data_consulta as $key => $value) {
            ?>
            
        <?php
        }
    } else {
        header("Location: paciente_principal.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Paciente</title>
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="icon" href="../img/logologin.jpg">
</head>

<body>
    <div class="container">
        <h1>Paciente: <br> <?php echo $nombre_paciente; ?> </h1>

        <table>
            <?php
            include '../CONEXION.php';

            $alert = '';

            if (isset($_GET['id'])) {
                $id_paciente_consulta = $_GET['id'];

                $query_consulta = mysqli_query($conn, "SELECT * FROM paciente WHERE ID_paciente = $id_paciente_consulta");
                $result_consulta = mysqli_num_rows($query_consulta);

                if ($result_consulta > 0) {
                    $data_consulta = mysqli_fetch_assoc($query_consulta);

                    $etiquetas_personalizadas = array(
                        'ID_paciente' => 'ID del paciente',
                        'Nombre' => 'Nombre',
                        'FechaNacimiento' => 'Fecha de Nacimiento',
                        'TipoSangre' => 'Tipo de Sangre',
                        'NumeroSeguro' => 'Número de Seguro',
                        'NumeroPersonal' => 'Número Personal',
                        'NumeroEmergencia1' => 'Número de Emergencia 1',
                        'NumeroEmergencia2' => 'Número de Emergencia 2',
                        'CodigoPostal' => 'Código Postal',
                        'Localidad' => 'Localidad',
                        'Direccion' => 'Dirección',
                        'etapa' => 'Etapa',
                        'Contrasenia' => 'Contraseña'
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

        <a href="paciente_principal.php" class="btn-actualizar">Volver a la lista de pacientes</a>
    </div>
</body>

</html>
