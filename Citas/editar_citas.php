<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
include '../CONEXION.php';

$alert = '';
$id_cita = '';
$data_consulta = [];

if (isset($_GET['id'])) {
    $id_cita_consulta = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dataToUpdate = [];
        foreach ($_POST as $key => $value) {
            $value = mysqli_real_escape_string($conn, $value);

            switch ($key) {
                case 'Fecha':
                case 'Consultorio':
                
                    $dataToUpdate[$key] = $value;
                    break;
            }
        }

        if (empty($alert) && !empty($dataToUpdate)) {
            $updateQuery = "UPDATE citas SET " . implode(", ", array_map(function ($key, $value) {
                return "$key = '$value'";
            }, array_keys($dataToUpdate), $dataToUpdate)) . " WHERE id_cita = $id_cita_consulta";

            $alert = mysqli_query($conn, $updateQuery) ? 'Datos actualizados correctamente' : 'Error al actualizar los datos';
        }
    }

    $query_consulta = mysqli_query($conn, "SELECT  c.Fecha as Fecha, c.Consultorio as Consultorio
    FROM citas c
    WHERE c.id_cita= $id_cita_consulta");

    if (mysqli_num_rows($query_consulta) > 0) {
        $data_consulta = mysqli_fetch_assoc($query_consulta);
        $id_cita = $data_consulta['Cita'] ?? 'Cita no disponible';
    } else {
        header("Location: citas.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion de Paciente: <?php echo $id_cita; ?></title>
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="icon" href="../img/logologin.jpg">
  
</head>

<body>
    <div class="container">
        <?php if (!empty($alert)) : ?>
            <div class="alert <?php echo strpos($alert, 'Error') !== false ? 'alert-danger' : 'alert-success'; ?>">
                <?php echo $alert; ?>
            </div>
        <?php endif; ?>

        <h1>Cita: <?php echo $id_cita_consulta; ?> </h1>

        <form method="post" id="updateForm">
            <table>
                <?php foreach ($data_consulta as $key => $value) : ?>
                    <?php if (in_array($key, ['Fecha', 'Consultorio'])) : ?>
                        <tr>
                            <td class="editable-field" onclick="editField('<?php echo $key; ?>')">
                                <?php echo $key; ?>
                            </td>
                            <td>
                                <?php if ($key === 'Fecha') : ?>
                                    <input type="date" name="<?php echo $key; ?>" value="<?php echo date('Y-m-d', strtotime($value)); ?>" min="<?php echo date('Y-m-d'); ?>" style="display:none;">

                                <?php elseif ($key === 'Consultorio') : ?>
                                    <select name="<?php echo $key; ?>" style="display:none;">
                                        <option value="DF34" <?php echo strtolower($value) === 'DF34' ? 'selected' : ''; ?>>DF34</option>
                                    </select>
                                <?php else : ?>
                                    <input type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>" style="display:none;">
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>

            <div class="confirmation" id="confirmation">
                ¿Estás seguro de que deseas actualizar los datos?
                <button type="button" onclick="confirmUpdate()">Sí</button>
                <button type="button" onclick="cancelUpdate()">No</button>
            </div>

            <input type="button" value="Actualizar" class="btn-actualizar" onclick="showConfirmation()">
        </form>

        <a href="citas.php" class="btn-actualizar">Volver a la lista de citas</a>
    </div>

    <script>
        function showConfirmation() {
            var etapaSelect = document.querySelector('select[name="Etapa"]');
            if (etapaSelect) {
                var selectedValue = etapaSelect.value.toLowerCase();
                if (!['DF34'].includes(selectedValue)) {
                    showInvalidAlert('El valor del Consultorio no es válido.');
                    return;
                }
            }

            document.getElementById('confirmation').style.display = 'block';
        }

        function cancelUpdate() {
            document.getElementById('confirmation').style.display = 'none';
        }

        function confirmUpdate() {
            document.getElementById('updateForm').submit();
        }

        function editField(fieldName) {
            var inputsAndSelects = document.querySelectorAll('input[type="text"], select, input[type="date"]');
            inputsAndSelects.forEach(function (input) {
                input.style.display = 'none';
            });

            var selectedInput = document.querySelector('input[name="' + fieldName + '"], select[name="' + fieldName + '"], input[type="date"][name="' + fieldName + '"]');
            if (selectedInput) {
                selectedInput.style.display = 'block';
            }
        }

        function showInvalidAlert(message) {
            var alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger';
            alertDiv.innerHTML = message;
            document.body.appendChild(alertDiv);
            setTimeout(function () {
                alertDiv.parentNode.removeChild(alertDiv);
            }, 5000);
        }
    </script>
</body>
</html>
