<?php
include '../CONEXION.php';

$alert = '';

if (isset($_GET['eliminar'])) {
    $id_cita = $_GET['eliminar'];

    $query_delete = mysqli_query($conn, "DELETE FROM citas WHERE id_cita = $id_cita");

    if ($query_delete) {
        header("Location: citas.php");
        exit(); 
    } else {
        echo "Error al eliminar la cita.";
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

        <h1>Lista de Citas</h1>
        <a href="alta_citas.php" class="btn_new"> <i class="material-icons" style="font-size:30px">add_box</i> </a>

        <table>
            <tr>
                
                <th>Cita</th>
                <th>Acciones</th>
            </tr>

            <?php

            $query = mysqli_query($conn, "SELECT  id_cita as Cita FROM citas;
            ");

            $result = mysqli_num_rows($query);

            if ($result > 0) {

                while ($data = mysqli_fetch_array($query)) {

                    ?>
                    <tr>
                        
                        <td><?php echo $data["Cita"] ?></td>
                        
                        <td>
                            <a class="link_consulta" href="consulta_citas.php?id=<?php echo $data['Cita']; ?>"> <i class='far fa-address-card' style='font-size:30px'></i> </a>
                            <a class="link_edit" href="editar_citas.php?id=<?php echo $data['Cita']; ?>"> <i class='far fa-edit' style='font-size:30px'></i></a>
                            <a class="link_delete" href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $data['Cita']; ?>)"><i class="material-icons" style="font-size:25px;color:red">delete</i> </a>
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
            var respuesta = confirm("¿Estás seguro de que deseas eliminar esta cita?");
            if (respuesta) {
                window.location.href = "citas.php?eliminar=" + id;
            }
        }
    </script>
</body>

</html>
