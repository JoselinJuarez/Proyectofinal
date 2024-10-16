<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #F8F9FA;
        }

        .form-container {
            width: 400px;
            padding: 30px;
            background-color: #FFF;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2C3E50;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #34495E;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #BDC3C7;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input:focus {
            border-color: #3498DB;
            outline: none;
        }

        .form-group .error {
            color: #E74C3C;
            font-size: 14px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .submit-button {
            background-color: #3498DB;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #2980B9;
        }

        .back-button {
            margin-top: 15px;
            text-align: center;
        }

        .back-button a {
            text-decoration: none;
            color: #3498DB;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .back-button a:hover {
            color: #2980B9;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Registro de Clientes</h1>

    <form id="clientForm" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
        </div>

        <div class="form-group">
            <label for="ci">CI:</label>
            <input type="text" id="ci" name="ci" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>

        <div class="form-group">
            <label for="direccionTrabajo">Dirección de Trabajo:</label>
            <input type="text" id="direccionTrabajo" name="direccionTrabajo">
        </div>

        <div class="form-group">
            <label for="empresa">Nombre de Empresa:</label>
            <input type="text" id="empresa" name="empresa">
        </div>

        <div class="form-group">
            <label for="celular">Celular:</label>
            <input type="tel" id="celular" name="celular" required pattern="[0-9]{8}">
            <span class="error" id="celularError"></span>
        </div>

        <div class="button-container">
            <button type="submit" class="submit-button">Registrar</button>
        </div>
    </form>

    <div class="back-button">
        <a href="#">Volver</a>
    </div>
</div>

<script>
    function validateForm() {
        const celularInput = document.getElementById('celular');
        const celularError = document.getElementById('celularError');

        // Verificar que el celular tenga exactamente 8 dígitos
        if (!/^\d{8}$/.test(celularInput.value)) {
            celularError.textContent = 'El celular debe tener 8 dígitos.';
            return false;
        }

        celularError.textContent = '';
        alert('Formulario enviado con éxito.');
        return true;
    }
</script>

</body>
</html>
