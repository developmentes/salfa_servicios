<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="opa">
    <div class="login-box">
      <h1>Login Administrador</h1>
      <p class="red-error">
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </p>
              

                <p class="red-success">
                    <?php

                    if (isset($_SESSION['creado'])) {
                        echo $_SESSION['creado'];
                        unset($_SESSION['creado']);
                    }
                    ?>
                </p>
              
      <form action="../controllers/CrearUsuarioControler.php" method="POST">
               
                    <label for="rut">Rut</label>
                     <input id="rut" type="text" name="rut" >

                       <label for="clave">Clave</label>
                    <input id="clave" type="password" name="clave">


                       <label for="clave">Clave</label>
                    <input id="permiso" type="password" name="permiso">
                      

                        <button name="admin" value="administrador" class="btn blue lighten-2 black-text" Style="box-shadow: 3px 3px 12px hsl(240, 2%, 10%)" >Iniciar Sesion</button>

        <a href="../index.php">Home</a>
      </form>
    </div>
  </div>

    
</body>
</html>