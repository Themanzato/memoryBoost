<?php
include '../CONEXION.php';

if (!empty($_POST)) {
    $alert = '';

    if (empty($_POST['ID_pago']) || empty($_POST['fecha']) || empty($_POST['Total']) || empty($_POST['Concepto']) || empty($_POST['ID_paciente'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {
        $ID_pago = $_POST['ID_pago'];
        $fecha = $_POST['fecha'];
        $Total = $_POST['Total'];
        $Concepto = $_POST['Concepto'];
        $ID_paciente = $_POST['ID_paciente'];

        $stmt = $conn->prepare("SELECT * FROM pago WHERE ID_pago = ?");
        $stmt->bind_param("i", $ID_pago);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $alert = '<p class="msg_error">Ya existe un Pago con el ID seleccionado.</p>';
        } else {
            $query_insert = $conn->prepare("INSERT INTO pago(ID_pago, fecha, Total, Concepto, id_paciente) VALUES (?, ?, ?, ?, ?)");
            $query_insert->bind_param("isdsi", $ID_pago, $fecha, $Total, $Concepto, $ID_paciente);

            if ($query_insert->execute()) {
                $alert = '<p class="msg_save">Pago registrado correctamente.</p>';
            } else {
                $alert = '<p class="msg_error">Error al crear el pago.</p>';
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
    <title>Alta de Pagos</title>
    <link rel="stylesheet" href="../css/alta.css" />
    <link rel="icon" href="../img/logologin.jpg">
</head>

<body>
    <div class="form_register">
        <h1>Alta de Pago</h1>

        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

        <form method="post" action="">
            <label for="ID_pago">ID del Pago</label>
            <input type="number" name="ID_pago" id="ID_pago" min="1" />

            <label for="fecha">Fecha del Pago</label>
            <input type="date" name="fecha" id="fecha" min="<?php echo date('Y-m-d'); ?>" />

            <label for="Total">Total</label>
            <input type="number" name="Total" id="Total" min="1" step="0.01" />

            <label for="Concepto">Concepto</label>
            <input type="text" name="Concepto" id="Concepto" />

            <label for="ID_paciente">ID del Paciente</label>
            <input type="number" name="ID_paciente" id="ID_paciente" min="1" />

            <br>
            <br>
            <input type="submit" name="submit" value="Dar de alta" class="btn-save" />
            <a href="pagos.php" class="btn_cancelar">Volver</a>
        </form>
    </div>
</body>

</html>
