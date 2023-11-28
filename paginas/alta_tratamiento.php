<!DOCTYPE html>
<html>


  <head>
    
    <meta charset="utf-8" />
    <title>Alta de Tratamiento</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        background: url('img/bg.jpg') no-repeat center top;
        background-size: cover;
        font-family: sans-serif;
        height: 100vh;
      }
      .login-box {
        width: 400px;
        height: auto;
        background: rgb(242, 242, 242);
        color: rgb(0, 0, 0);
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        box-sizing: border-box;
        padding: 70px 30px;
        border-radius: 20px;
      }
      .login-box h1 {
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-size: 22px;
      }
      .login-box label {
        font-weight: bold;
        display: block;
      }
      .login-box input[type="text"],
      .login-box input[type="submit"] {
        width: 100%;
        margin-bottom: 20px;
        border: none;
        border-bottom: 1px solid #000;
        background: transparent;
        outline: none;
        height: 30px;
        color: #000;
        font-size: 14px;
        text-align: center;
      }
      .login-box input[type="submit"] {
        height: 40px;
        background: #767676;
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
      }
      .login-box input[type="submit"]:hover {
        background: #555;
      }
      .login-box input[type="submit"]:active {
        background: #333;
      }
      .login-box a {
        text-decoration: none;
        font-size: 12px;
        line-height: 20px;
        color: #7c7c7c;
      }
      .login-box a:hover {
        color: #000;
      }
    </style>
  </head>
  <body>
    <div class="login-box">
      <h1>Alta de Tratamiento</h1>
      <form method="post">
        <label for="nombre_medico">Nombre del Médico</label>
        <input type="text" name="nombre_medico" />

        <label for="especialidad_medico">Especialidad</label>
        <input type="text" name="especialidad_medico" />

        <label for="Consultorio">Consultorio</label>
        <input type="text" name="consultorio" />

        <label for="diagnosticos">Diagnósticos</label>
        <input type="text" name="diagnosticos" />

        <label for="actividades">Actividades</label>
        <input type="text" name="actividades" />

        <input type="submit" value="Dar de alta" />
        <a href="index.html">Volver</a>
      </form>
    </div>
  </body>
</html>
