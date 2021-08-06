<!DOCTYPE html>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalfaStock</title>
    <link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/style_form.css" rel="stylesheet">
</head>
<body style="background-image: url(./asset/img/job-people.jpg);">

<div class="opa">
    <div class="login-box">
      <h1>Login Salfa Corp</h1>
    
    
              
                <p class="green-success">
                    <?php

                    if (isset($_SESSION['respuesta'])) {
                        echo $_SESSION['respuesta'];
                        unset($_SESSION['respuesta']);
                    }
                    ?>
                </p>
              
                <p class="red-warning">
                    <?php

                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </p>
              
      <form action="controllers/LoginControllerUser.php" method="POST">
               
                    <label for="rut">Rut</label>
                     <input class="form-control" id="rut" autofocus type="text" name="rut">

                       <label for="clave">Clave</label>
                    <input class="form-control" id="clave" type="password" name="clave">
                      

                        <button  class="btn blue lighten-2 black-text" Style="box-shadow: 3px 3px 12px hsl(240, 2%, 10%)" >Iniciar Sesion</button>

        <a href="index.php">Home</a>
      </form>
    </div>
  </div>
    
</body>
</html>