<?php

include '../CONEXION.php';

if (!empty($_POST)) {
    $alert = '';

    if (empty($_POST['ID_cita']) || empty($_POST['fecha_cita']) 
    || empty($_POST['Consultorio']) || empty($_POST['ID_doctor'])
 || empty($_POST['ID_paciente']) || empty($_POST['ID_consultorio'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {

        $ID_cita = $_POST['ID_cita'];
        $fecha_cita = $_POST['fecha_cita'];
        $consultorio = $_POST['Consultorio'];
        $ID_doctor = $_POST['ID_doctor'];
        $ID_paciente = $_POST['ID_paciente'];
        $ID_consultorio = $_POST['ID_consultorio'];

        $stmt = $conn->prepare("SELECT * FROM citas WHERE id_cita = ?");
        $stmt->bind_param("i", $ID_cita);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $alert = '<p class="msg_error">Ya existe una cita con el ID seleccionado.</p>';
        } else {
            $query_insert = mysqli_query($conn, "INSERT INTO citas(id_cita,fecha,consultorio,id_doctor,id_paciente,id_consultorio) VALUES ('$ID_cita', '$fecha_cita', '$consultorio', '$ID_doctor', '$ID_paciente', '$ID_consultorio')");

            if ($query_insert) {
                $alert = '<p class="msg_save">Cita dada de alta correctamente.</p>';
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
    <title>Alta de Pacientes</title>
    <link rel="stylesheet" href="../css/alta.css" />
    <link rel="icon" href="../img/logologin.jpg">

</head>

<body>

    <div class="form_register">
        <h1>Alta de Cita</h1>

        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

        <form method="post" action="">

            <label for="ID_cita">ID de la Cita</label>
            <input type="number" name="ID_cita" id="ID_cita" min="1" />

            <label for="fecha_cita">Fecha de Cita</label>
            <input type="date" name="fecha_cita" id="fecha_cita" min="<?php echo date('Y-m-d'); ?>" />

            <label for="Consultorio">Consultorio</label>
            <select name="Consultorio" id="Consultorio">
                <option value="DF34">DF34</option>
            </select>

            <label for="ID_doctor">ID del Doctor</label>
            <input type="number" name="ID_doctor" id="ID_doctor" min="1" />

            <label for="ID_paciente">ID del Paciente</label>
            <input type="number" name="ID_paciente" id="ID_paciente" min="1" />

            <label for="ID_consultorio">ID del Consultorio</label>
            <input type="number" name="ID_consultorio" id="ID_consultorio" min="1" />
            <br>
            <br>
            <input type="submit" name="submit" value="Dar de alta" class="btn-save" />

            <a href="citas.php" class="btn-actualizar">Volver</a>
        </form>
    </div>

</body>

</html>

