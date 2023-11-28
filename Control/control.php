<?php
include '../CONEXION.php';

$alert = '';

if (isset($_GET['eliminar'])) {
    $id_paciente = $_GET['eliminar'];

    $query_delete = mysqli_query($conn, "DELETE FROM Control WHERE ID_paciente = $id_paciente");

    if ($query_delete) {
        header("Location: control.php");
        exit(); 
    } else {
        echo "Error al eliminar el control.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal pacientes</title>
    <script src="https://kit.fontawesome.com/f42eab0bdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="icon" href="../img/logologin.jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h1>Control de Pacientes</h1>
        <a href="registro_control.php" class="btn_new"> <i class="material-icons" style="font-size:30px">add_box</i> </a>

        <table>
            <tr>
                
                 <th>Nombre del Paciente</th>
                 <th>ID del Paciente</th>
                <th>Acciones</th>
            </tr>

            <?php

            $query = mysqli_query($conn, "SELECT p.Nombre AS NombrePaciente, c.ID_paciente as IDPaciente
            FROM Control c
            JOIN paciente p ON c.ID_paciente = p.ID_paciente;");

            $result = mysqli_num_rows($query);

            if ($result > 0) {

                while ($data = mysqli_fetch_array($query)) {

                    ?>
                    <tr>
                    
                        <td><?php echo $data["NombrePaciente"] ?></td>
                        <td><?php echo $data["IDPaciente"] ?></td>
                        <td>
                            <a class="link_consulta" href="consulta_control.php?id=<?php echo $data['IDPaciente']; ?>"> <i class='far fa-address-card' style='font-size:30px'></i> </a>
                            <a class="link_edit" href="editar_control.php?id=<?php echo $data['IDPaciente']; ?>"> <i class='far fa-edit' style='font-size:30px'></i></a>
                            <a class="link_delete" href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $data['IDPaciente']; ?>)"><i class="material-icons" style="font-size:25px;color:red">delete</i> </a>
                        </td>
                    </tr>

            <?php
                }
            }
            ?>
        </table>
        <a href="../principal.php" class="btn-actualizar">Volver a principal</a>
    </div>

    <script>
        function confirmarEliminar(id) {
            var respuesta = confirm("¿Estás seguro de que deseas eliminar este diagnostico?");
            if (respuesta) {
                window.location.href = "control.php?eliminar=" + id;
            }
        }
    </script>
</body>

</html>
