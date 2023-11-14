<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alta de Pacientes</title>
    <link rel="Stylesheet" href="css/alta.css" />
    <link rel="Stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
  </head>
  <body>
    <div class="login-box">
      <h1>Alta de Pacientes</h1>
      <form method="post" action="baja_paciente.php">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"/>

        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" />

        <label for="tipo_sangre">Tipo de Sangre</label>
        <input type="text" name="tipo_sangre"/>

        <label for="numero_seguro">Número de Seguro</label>
        <input type="text" name="numero_seguro"/>

        <label for="numero_personal">Número Personal</label>
        <input type="text" name="numero_personal"/>

        <label for="numero_emergencia_1">Número de Emergencia 1</label>
        <input type="text" name="numero_emergencia_1"/>

        <label for="numero_emergencia_2">Número de Emergencia 2</label>
        <input type="text" name="numero_emergencia_2"/>

        <label for="codigo_postal">Código Postal</label>
        <input type="text" name="codigo_postal"/>

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad"/>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" />

        <input type="submit" name="submit" value="Dar de alta" />

        <a href="index.html">Volver</a>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
      $(function() {
        $("#fecha_nacimiento").datepicker();
      });
    </script>
  </body>
</html>