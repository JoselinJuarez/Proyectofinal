<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: url('https://source.unsplash.com/1600x900/?technology') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 40px;
            width: 350px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #fff;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 25px;
            border: none;
            background: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            outline: none;
            text-align: center;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 25px;
            border: none;
            background-color: #6c5ce7;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #4c42a1;
        }
        .login-container p {
            margin-top: 15px;
            color: #fff;
        }
        .login-container p a {
            color: #81ecec;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="" method="">
        @csrf
        <input type="text" name="username" placeholder="Nombre de Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="submit" value="Ingresar">
    </form>
    <p>¿No tienes cuenta? <a href="#">Regístrate</a></p>
</div>

</body>
</html>
