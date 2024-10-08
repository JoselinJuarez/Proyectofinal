<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
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
            font-size: 36px;
            color: #2C3E50;
            margin-bottom: 30px;
        }

        .button-insert {
            background-color: #F1948A;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-insert:hover {
            background-color: #E74C3C;
        }

        .table-container {
            margin-top: 20px;
            background-color: #FFF;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #F8F9FA;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-ver {
            background-color: #3498DB;
            color: white;
        }

        .btn-editar {
            background-color: #9B59B6;
            color: white;
        }

        .btn-eliminar {
            background-color: #E74C3C;
            color: white;
        }
    </style>
</head>
<body>

<div class="navbar" id="navbar">
    <a href="#" class="add-button" onclick="toggleNavbar()"><i class="fas fa-plus"></i></a>
    <a href="#"><i class="fas fa-users"></i><span>Usuarios</span></a>
    <a href="#"><i class="fas fa-user-tie"></i><span>Clientes</span></a>
    <a href="#"><i class="fas fa-hand-holding-usd"></i><span>Préstamos</span></a>
    <a href="#"><i class="fas fa-shield-alt"></i><span>Garantías</span></a>
    <a href="#"><i class="fas fa-money-check-alt"></i><span>Pagos</span></a>
    <a href="#" class="logout"><i class="fas fa-sign-out-alt"></i><span>Cerrar Sesión</span></a>
</div>

<div class="main-content">
    <h1>Pagos</h1>
    <button class="button-insert">Insertar</button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha de Pago</th>
                    <th>Saldo</th>
                    <th>Método de Pago</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Juan</td>
                    <td>Pérez</td>
                    <td>2024-10-05</td>
                    <td>$1,200</td>
                    <td>Transferencia Bancaria</td>
                    <td>Pagado</td>
                    <td class="action-buttons"><button class="btn-ver">Ver</button></td>
                    <td class="action-buttons"><button class="btn-editar">Editar</button></td>
                    <td class="action-buttons"><button class="btn-eliminar">Eliminar</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ana</td>
                    <td>García</td>
                    <td>2024-10-04</td>
                    <td>$850</td>
                    <td>QR</td>
                    <td>No pago</td>
                    <td class="action-buttons"><button class="btn-ver">Ver</button></td>
                    <td class="action-buttons"><button class="btn-editar">Editar</button></td>
                    <td class="action-buttons"><button class="btn-eliminar">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
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
