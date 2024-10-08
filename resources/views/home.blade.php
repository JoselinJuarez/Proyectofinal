<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            height: 100vh;
            background-color: #F8F9FA;
        }

        .navbar {
            width: 80px;
            background-color: #FFF;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            position: relative;
            transition: width 0.3s ease;
        }

        .navbar.expanded {
            width: 250px;
        }

        .navbar a {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 15px;
            text-align: center;
            color: #7F8C8D;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar.expanded a {
            justify-content: flex-start;
            text-align: left;
            padding-left: 30px;
        }

        .navbar i {
            font-size: 24px;
        }

        .navbar .add-button {
            background-color: #F1948A;
            color: white;
            border-radius: 50%;
            font-size: 24px;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .navbar .add-button:hover {
            background-color: #E74C3C;
        }

        .navbar .logout {
            position: absolute;
            bottom: 20px;
        }

        .navbar a span {
            margin-left: 20px;
            display: none;
        }

        .navbar.expanded a span {
            display: inline-block;
        }

        .main-content {
            flex: 1;
            padding: 40px;
            background-color: #F8F9FA;
        }

        .main-content h1 {
            font-size: 24px;
            color: #34495E;
            margin-bottom: 20px;
        }

        .card-container {
            display: flex;
            gap: 20px;
        }

        .card {
            width: 150px;
            height: 150px;
            background-color: #ECF0F1;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            color: #7F8C8D;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .card img {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 50px;
            height: 50px;
        }

    </style>
</head>
<body>

<div class="navbar" id="navbar">
    <a href="#" class="add-button" onclick="toggleNavbar()"><i class="fas fa-plus"></i></a>
    <a href="#" class="active"><i class="fas fa-users"></i><span>Usuarios</span></a>
    <a href="#"><i class="fas fa-user-tie"></i><span>Clientes</span></a>
    <a href="#"><i class="fas fa-hand-holding-usd"></i><span>Préstamos</span></a>
    <a href="#"><i class="fas fa-shield-alt"></i><span>Garantías</span></a>
    <a href="#" class="logout"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
</div>

<div class="main-content">
    <h1>Bienvenido "Nombre"</h1>
    <p>¿Qué desea hacer el día de hoy?</p>

    <div class="card-container">
        <div class="card">
            <img src="https://via.placeholder.com/50" alt="Garantías">
            Garantías
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/50" alt="Usuarios">
            Usuarios
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/50" alt="Clientes">
            Clientes
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/50" alt="Préstamos">
            Préstamos
        </div>
    </div>
</div>

<script>
    function toggleNavbar() {
        var navbar = document.getElementById('navbar');
        navbar.classList.toggle('expanded');
    }
</script>

</body>
</html>
