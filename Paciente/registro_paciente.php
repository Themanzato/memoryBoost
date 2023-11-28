<?php

include '../CONEXION.php';

if (!empty($_POST)) {
    $alert = '';

    if (empty($_POST['nombre']) || empty($_POST['fecha_nacimiento']) || empty($_POST['tipo_sangre']) || empty($_POST['numero_seguro']) || empty($_POST['numero_personal']) || empty($_POST['codigo_postal']) || empty($_POST['localidad']) || empty($_POST['direccion'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {

        $nombre = $_POST['nombre'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $tipo_sangre = $_POST['tipo_sangre'];
        $numero_seguro = $_POST['numero_seguro'];
        $numero_personal = $_POST['numero_personal'];
        $numero_emergencia_1 = $_POST['numero_emergencia_1'];
        $numero_emergencia_2 = $_POST['numero_emergencia_2'];
        $codigo_postal = $_POST['codigo_postal'];
        $localidad = $_POST['localidad'];
        $direccion = $_POST['direccion'];
        $etapa = $_POST['etapa'];

        $query = mysqli_query($conn, "SELECT * FROM paciente WHERE numeroseguro = '$numero_seguro'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<p class="msg_error">El usuario ya existe.</p>';
        } else {
            $query_insert = mysqli_query($conn, "INSERT INTO paciente(nombre,fechanacimiento,tiposangre,
        numeroseguro,numeropersonal,numeroemergencia1,numeroemergencia2,
        codigopostal,localidad,direccion,etapa)
        VALUES ('$nombre', '$fecha_nacimiento', '$tipo_sangre',
        '$numero_seguro', '$numero_personal', '$numero_emergencia_1', '$numero_emergencia_2',
        '$codigo_postal', '$localidad', '$direccion', '$etapa')");

            if ($query_insert) {
                $alert = '<p class="msg_save">Paciente dado de alta correctamente.</p>';
            } else {
                $alert = '<p class="msg_error">Error al crear el usuario.</p>';
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
    <link rel="Stylesheet" href="../css/alta.css" />
    <link rel="icon" href="../img/logologin.jpg">

</head>

<body>

    <div class="form_register">
        <h1>Alta de Pacientes</h1>

        <div class="alert"><?php echo isset($alert)  ? $alert : ''; ?></div>

        <form method="post" action="">

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" />

            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" />

            <label for="tipo_sangre">Tipo de Sangre</label>
            <input type="text" name="tipo_sangre" id="tipo_sangre" />

            <label for="numero_seguro">Número de Seguro</label>
            <input type="text" name="numero_seguro" id="numero_seguro" />

            <label for="numero_personal">Número Personal</label>
            <input type="text" name="numero_personal" id="numero_personal" />

            <label for="numero_emergencia_1">Número de Emergencia 1</label>
            <input type="text" name="numero_emergencia_1" id="numero_emergencia_1" />

            <label for="numero_emergencia_2">Número de Emergencia 2</label>
            <input type="text" name="numero_emergencia_2" id="numero_emergencia_2" />

            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" id="codigo_postal" />

            <label for="localidad">Localidad</label>
            <input type="text" name="localidad" id="localidad" />

            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" />

            <label for="etapa">Etapa</label>

            <?php
            $query_etapa = mysqli_query($conn, "SELECT DISTINCT etapa FROM paciente");
            $result_etapa = mysqli_num_rows($query_etapa);
            ?>

            <select name="etapa" id="etapa">
                <?php
                if ($result_etapa > 0) {
                    while ($etapa_row = mysqli_fetch_assoc($query_etapa)) {
                        $etapa_value = $etapa_row['etapa'];
                        echo "<option value=\"$etapa_value\">$etapa_value</option>";
                    }
                }
                ?>

            </select>
            <br>
            <br>
            <input type="submit" name="submit" value="Dar de alta" class="btn-save" />

            <a href="paciente_principal.php" class="btn_cancelar">volver</a>
        </form>
    </div>

</body>

</html>
