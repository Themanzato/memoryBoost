<?php
include 'CONEXION.php';
$usuario = $_POST['username'];
$contrasena = $_POST['password'];

$sql="SELECT * FROM doctor where CedulaProfesional = '$usuario' and contrasena = '$contrasena'";
$result = $conn->query($sql);

$nombreDoct = "SELECT p.Nombre AS nombreDoctor 
               FROM persona p 
               JOIN doctor d ON p.ID_Doctor = d.ID_Doctor 
               WHERE d.CedulaProfesional = '18009870'";

$resultado = $conn->query($nombreDoct);
$row = $resultado->fetch_assoc();
$nombreDoctor = $row["nombreDoctor"];



if ($result->num_rows > 0) {
    echo "<script>
        window.location.href = 'principal.php';
        </script>";
} else {
    echo "<script>
        alert('Inicio de sesión incorrecto. Por favor, ingrese usuario y contraseña válidos.');
        window.history.back(); 
        </script>";
}

$conn->close();
?>
