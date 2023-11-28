<?php
require('C:\Users\mb13a\OneDrive\Escritorio\TEC\ING SOFTWARE\PROYECTOMB\MemoryBoost FINAL\MemoryBoosttt\TCPDF-main\tcpdf.php'); // Asegúrate de ajustar la ruta según la ubicación de la biblioteca en tu proyecto

include '../CONEXION.php';

// Obtener el ID del pago desde la URL
if (isset($_GET['id'])) {
    $id_pago = $_GET['id'];

    // Realizar la consulta para obtener la información del pago específico
    $query = mysqli_query($conn, "
        SELECT p.ID_Pago, p.Fecha, p.Total, p.Concepto, pc.ID_Paciente, pc.Nombre
        FROM pago p
        JOIN paciente pc ON p.ID_Paciente = pc.ID_Paciente
        WHERE p.ID_Pago = $id_pago
    ");

    // Crear instancia de TCPDF
    $pdf = new TCPDF();

    // Agregar una página al PDF
    $pdf->AddPage();

    // Configurar fuente y tamaño de texto
    $pdf->SetFont('helvetica', '', 12);

    // Verificar si hay resultados
    if (mysqli_num_rows($query) > 0) {
        // Recuperar la información del pago
        $row = mysqli_fetch_assoc($query);

        // Diseño del recibo de pago
        $html = '<h1>Recibo de Pago</h1>
                <p><strong>ID del Pago:</strong> ' . $row['ID_Pago'] . '</p>
                <p><strong>Fecha:</strong> ' . $row['Fecha'] . '</p>
                <p><strong>Total:</strong> $' . $row['Total'] . '</p>
                <p><strong>Concepto:</strong> ' . $row['Concepto'] . '</p>
                <p><strong>ID del Paciente:</strong> ' . $row['ID_Paciente'] . '</p>
                <p><strong>Nombre del Paciente:</strong> ' . $row['Nombre'] . '</p>';

        // Agregar el recibo de pago al PDF
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    } else {
        $pdf->writeHTML('<p>No se encontraron resultados para el ID de pago proporcionado.</p>', true, false, true, false, '');
    }

    // Nombre del archivo PDF generado
    $filename = 'recibo_pago_' . $id_pago . '.pdf';

    // Salida del PDF al navegador
    $pdfContent = $pdf->Output($filename, 'S');

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    // Redirigir si no se proporciona un ID de pago
    header('Location: pagos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar PDF</title>
    <script>
        // Ejecutar el código cuando se carga la página
        window.onload = function() {
            var pdfContent = "<?php echo base64_encode($pdfContent); ?>";
            var pdfWindow = window.open("", "_blank");
            pdfWindow.document.write('<embed width="100%" height="100%" name="plugin" src="data:application/pdf;base64,' + pdfContent + '" type="application/pdf">');
            pdfWindow.document.close();

            // Redirigir al archivo pagos.php
            setTimeout(function() {
                window.location.href = "pagos.php";
            }, 0); // esperar 5 segundos antes de redirigir
        };
    </script>
</head>

<body>
    <h1>Generar PDF</h1>
</body>

</html>
