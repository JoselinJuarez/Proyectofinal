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





  

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.botones {
    display: flex;
    justify-content: space-between;
}

button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.guardar {
    background-color: #4CAF50;
    color: white;
}

.guardar:hover {
    background-color: #45a049;
}

.cancelar {
    background-color: #f44336;
    color: white;
}

.cancelar:hover {
    background-color: #e53935;
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
<div class="form-container">
        
        <form action="{{route('clientes.actualizar',$cliente->ci)}}" method="post">
            
            @csrf
            @method('PUT')
            <label for="nombre">Ci</label>
            <input type="number" id="numero" name="numero" required value="{{$cliente->ci}}">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombree" required value="{{$cliente->nombres}}">

            <label for="email">Apellido:</label>
            <input type="text" id="apellido" name="inicio" required value="{{$cliente->apellidos}}">

            <!--<label for="telefono">Ci:</label>
            <input type="number" id="telefono" name="fin">!-->

            <label for="mensaje">Celular:</label>
            <input id="mensaje" name="monto" type="number" value="{{$cliente->celular}}">

            <label for="nombre">Estado:</label>
            <input type="text" id="nombre" name="var" required value="{{$cliente->estado}}">
            

            <div class="botones">
                <button type="reset" class="cancelar">Cancelar</button>
                <button type="submit" class="guardar">Guardar</button>
            </div>
            <a href="/clientes" class="active"><i class="fas fa-users"></i><span>prestamos</span></a>
            

        </form>
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
