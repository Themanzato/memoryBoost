<?php
include '../CONEXION.php';

$alert = '';

if (isset($_GET['eliminar'])) {
    $id_paciente = $_GET['eliminar'];

    $query_delete = mysqli_query($conn, "DELETE FROM paciente WHERE ID_paciente = $id_paciente");

    if ($query_delete) {
        header("Location: paciente_principal.php");
        exit(); 
    } else {
        echo "Error al eliminar el paciente.";
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

        <h1>Lista de pacientes</h1>
        <a href="registro_paciente.php" class="btn_new"> <i class="material-icons" style="font-size:30px">add_box</i> </a>

        <table>
            <tr>
                
                <th>Nombre</th>
                <th>Etapa</th>
                <th>Acciones</th>
            </tr>

            <?php

            $query = mysqli_query($conn, "SELECT p.ID_paciente, p.Nombre, p.NumeroPersonal, p.etapa FROM paciente p");

            $result = mysqli_num_rows($query);

            if ($result > 0) {

                while ($data = mysqli_fetch_array($query)) {

                    ?>
                    <tr>
                        
                        <td><?php echo $data["Nombre"] ?></td>
                        <td><?php echo $data["etapa"] ?></td>
                        <td>
                            <a class="link_consulta" href="consulta_paciente.php?id=<?php echo $data['ID_paciente']; ?>"> <i class='far fa-address-card' style='font-size:30px'></i> </a>
                            <a class="link_edit" href="editar_paciente.php?id=<?php echo $data['ID_paciente']; ?>"> <i class='far fa-edit' style='font-size:30px'></i></a>
                            <a class="link_delete" href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $data['ID_paciente']; ?>)"><i class="material-icons" style="font-size:25px;color:red">delete</i> </a>
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
            var respuesta = confirm("¿Estás seguro de que deseas eliminar este paciente?");
            if (respuesta) {
                window.location.href = "paciente_principal.php?eliminar=" + id;
            }
        }
    </script>
</body>

</html>
