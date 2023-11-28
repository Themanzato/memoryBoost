<?php
include 'CONEXION.php';


$nombreDoct = "SELECT p.Nombre AS nombreDoctor 
               FROM persona p 
               JOIN doctor d ON p.ID_Doctor = d.ID_Doctor 
               WHERE d.CedulaProfesional = '18009870'";
$resultado = $conn->query($nombreDoct);
$row = $resultado->fetch_assoc();
$nombreDoctor = $row["nombreDoctor"];


$especialidadDoct = "SELECT Especialidad from doctor
               WHERE CedulaProfesional = '18009870'";
$resultado = $conn->query($especialidadDoct);
$row = $resultado->fetch_assoc();
$espDoct = $row["Especialidad"];

$fotoDoct = "SELECT fotoPerfil from doctor
               WHERE CedulaProfesional = '18009870'";
$resultado = $conn->query($fotoDoct);
$row = $resultado->fetch_assoc();
$fotoPerfil = $row["fotoPerfil"];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Boost</title>
    <link rel="icon" href="img/logologin.jpg">
    <style>

        body {
            font-family: Arial, sans-serif;
            background: url('img/bg.jpg') no-repeat center top;
            background-size: cover;
            border-radius: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 20px;
            align-items: center;
            margin-top: 5%;
            border: 2px solid #000000;
            position: relative;
        }

        .foto {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
            border: 2px solid #000000;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .title {
            font-size: 36px;
            color: #333;
            margin: 20px 0;
            text-align: left; 
            font-family: Arial; 
            font-weight: bold; 
            }

        .subtitle {
            font-size: 24px;
            color: #777;
            margin: 10px 0;
            text-align: left; 
            font-family: Arial; 
            font-weight: bold; 
        }

        .content {
            font-size: 18px;
            color: #333;
            line-height: 1.5;
        }

        .final {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .nav {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px;
            margin-bottom: 10%;
            list-style: none;
        }
        
        .nav a {
            text-decoration: none;
            color: #333;
            font-size: 20px;
            margin: 20px;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            
            border: 1px solid #333;
            border-radius: 10px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        
        .nav a:hover {
            background-color: #333;
            color: rgb(239, 239, 239);
            transform: scale(1.2) translateY(-20%);
        }
        
        .main {
            flex: 1;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 20px;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        
    </style>
</head>

    <body>
        
        <div class="container">
            

            <div class="main">
             
            <img src="data:image/jpeg;base64,<?php echo base64_encode($fotoPerfil); ?>" alt="Foto del doctor" class="foto">
                <div class="text">
                
                    <h1>Bienvenido Doctor  <br>  <?php echo $nombreDoctor;  ?> </h1>
                    <h2 class="subtitle">Especialista en <?php echo $espDoct; ?> </h2>
                </div>
            </div>


            <div class="nav">
                    <a href="Paciente/paciente_principal.php">Pacientes</a>
                    <a href="Pagos/pagos.php">Pagos</a>
                    <a href="Citas/citas.php">Citas</a>
                    <a href="Control/control.php">Control</a>
            </div>

            <div class="final">
               ||  © 2023 Doctor <?php echo $nombreDoctor; ?>. Todos los derechos reservados. ||
            </div>
        </div>
    </body>
</html>
