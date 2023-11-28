<?php
include '../CONEXION.php';

$alert = '';


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Pagos</title>
    <script src="https://kit.fontawesome.com/f42eab0bdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="icon" href="../img/logologin.jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h1>Lista de pagos</h1>
        <a href="alta_pago.php" class="btn_new"> <i class="material-icons" style="font-size:30px">add_box</i> </a>

        <table>
            <tr>
                
                <th>ID del Pago</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Concepto</th>
                <th>Paciente</th>
                <th>Acciones</th>
            </tr>

            <?php

            $query = mysqli_query($conn, "SELECT p.ID_Pago as Pago, p.Fecha, p.Total, p.Concepto, pc.ID_Paciente, pc.Nombre
            FROM pago p
            JOIN paciente pc ON p.ID_Paciente = pc.ID_Paciente;
            ;
            ");

            $result = mysqli_num_rows($query);

            if ($result > 0) {

                while ($data = mysqli_fetch_array($query)) {

                    ?>
                    <tr>
                        
                        <td><?php echo $data["Pago"] ?></td>
                        <td><?php echo $data["Fecha"] ?></td>
                        <td><?php echo $data["Total"] ?></td>
                        <td><?php echo $data["Concepto"] ?></td>
                        <td><?php echo $data["Nombre"] ?></td>
                        
                        <td>
                            <a class="link_consulta" href="consulta_pagos.php?id=<?php echo $data['Pago']; ?>"> <i class='far fa-address-card' style='font-size:30px'></i> </a>

                        </td>
                    </tr>

            <?php
                }
            }
            ?>
        </table>
        <a href="../principal.php" class="btn-actualizar">Volver a la pagina principal</a>
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