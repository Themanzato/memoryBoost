<?php

include '../CONEXION.php';

if (!empty($_POST)) {
    $alert = '';

    if (empty($_POST['ID_paciente']) || empty($_POST['Diagnostico'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {

        $ID_paciente = $_POST['ID_paciente'];
        $Diagnostico = $_POST['Diagnostico'];


        $stmt = $conn->prepare("SELECT * FROM Control WHERE ID_Paciente = ?");
        $stmt->bind_param("i", $ID_paciente);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $alert = '<p class="msg_error">Ya existe una Diagnostico para el paciente con el ID seleccionado.</p>';
        } else {
            $query_insert = mysqli_query($conn, "INSERT INTO Control(Diagnostico, id_Paciente) VALUES ('$Diagnostico', '$ID_paciente')");

            if ($query_insert) {
                $alert = '<p class="msg_save">Control dada de alta correctamente.</p>';
            } else {
                $alert = '<p class="msg_error">Error al crear la cita.</p>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta de Control</title>
    <link rel="stylesheet" href="../css/alta.css" />
    <link rel="icon" href="../img/logologin.jpg">

</head>

<body>

    <div class="form_register">
        <h1>Alta de Control</h1>

        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

        <form method="post" action="">

            <label for="ID_paciente">ID del Paciente</label>
            <input type="number" name="ID_paciente" id="ID_paciente" min="1" />

            <label for="Diagnostico">Diagnostico</label>
            <input type="text" name="Diagnostico" id="Diagnostico" ?>

            
            <br>
            <input type="submit" name="submit" value="Dar de alta" class="btn-save" />

            <a href="control.php" class="btn-actualizar">Volver a la pagina control</a>
        </form>
    </div>

</body>

</html>

