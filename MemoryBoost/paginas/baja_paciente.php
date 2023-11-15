<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Lista de Pacientes</title>
    <link rel="Stylesheet" href="css/baja.css" />
  </head>
  <body>
    <div class="table-container">
      <h1>Pacientes</h1>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>Tipo de Sangre</th>
            <th>Número de Seguro</th>
            <th>Número Personal</th>
            <th>Número de Emergencia 1</th>
            <th>Número de Emergencia 2</th>
            <th>Código Postal</th>
            <th>Localidad</th>
            <th>Dirección</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mario Alberto Arroyo Utrera</td>
            <td>01/01/1980</td>
            <td>A+</td>
            <td>1234567890</td>
            <td>(+52) 123-4567</td>
            <td>(+52) 987-6543</td>
            <td>(+52) 912-4323</td>
            <td>12345</td>
            <td>Xalapa</td>
            <td>Calle Revolución #789, Colonia Miguel Alemán</td>
            <td>
              <button class="delete-button">Dar de baja</button>
            </td>
          </tr>
          <tr>
            <td>Ricardo Ulises Perez Sandoval</td>
            <td>02/02/1990</td>
            <td>B-</td>
            <td>0987654321</td>
            <td>(+52) 987-6543</td>
            <td>(+52) 912-4323</td>
            <td>(+52) 123-4567</td>
            <td>54321</td>
            <td>Xalapa</td>
            <td>Calle 5 de Mayo #123, Colonia Centro</td>
            <td>
              <button class="delete-button">Dar de baja</button>
            </td>
          </tr>
          <tr>
            <td>Jose Alberto Velix Callejas</td>
            <td>03/03/2000</td>
            <td>O+</td>
            <td>1357908642</td>
            <td>(+52) 123-4567</td>
            <td>(+52) 987-6543</td>
            <td>(+52) 123-4567</td>
            <td>67890</td>
            <td>Xalapa</td>
            <td>Avenida Juárez #456, Colonia Obrero Campesina</td>
            <td>
              <button class="delete-button">Dar de baja</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-container">
      <div class="modal">
        <h2>¿Está seguro que desea dar de baja el paciente?</h2>
        <div class="modal-buttons">
          <button class="cancel-button">Cancelar</button>
          <button class="confirm-button">Continuar</button>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      $(function() {
        $(".delete-button").click(function() {
          $(".modal-container").show();
        });

        $(".cancel-button").click(function() {
          $(".modal-container").hide();
        });
      });
    </script>
  </body>
</html>