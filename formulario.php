<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilo.css" rel="stylesheet" type="text/css" media="screen" />
  
    <title>Document</title>
</head>
<body>
<div class="contenedor">
            <div class="login">
            <?php
                if ( isset($_GET['error_V']) ){
                    if ( $_GET['error_V'] == 'pass' ) {
                        echo 'Contraseña inválida';
                    } elseif ( $_GET['error_V'] == 'user' ) {
                        echo 'No existe el usuario';
                    } elseif ( $_GET['error_V'] == 'query' ) {
                        echo 'Error al ingresar, intente nuevamente';
                    } else {
                        echo 'ERROR!';
                    }
                }
            ?>
                                                    
                <h2>Login </br></h2>        
                <form name="login" method="post" action="validar.php" enctype="application/x-www-form-urlencoded">
                    <div class="izquierda">
                        <label for="usuario">Usuario:</label>
                        <input type="number" name="usuario" />
                    </div>
                        
                    <div class="centro">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="pass" />
                    </div>

                    <div class="derecha">
                        <input type="submit" name="ingresar" value="Ingresar"/>
                        <p class="mensaje" name="mensaje"></p>
                    </div>
                </form>
            </div>
            <div class="encabezado">
                <h1>Formulario de registro</h1>
                <p>Para registrarte, completa el formulario siguiente:</p>
            </div>

            <div class="formulario">
                <form name="registro" method="post" action="registro.php">
                    <div class="campo">
                        <label for="rut">RUT:</label>
                        <input type="number" name="rut" required/>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" required/>
                        </div>

                        <div class="en-linea">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" required/>
                        </div>
                    </div>

                    <div class="campo">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" name="email" required/>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="contrasena1">Contraseña:</label>
                            <input type="password" name="contrasena1" required/>
                        </div>
                        
                        <div class="en-linea">
                            <label for="contrasena2">Repite tu contraseña:</label>
                            <input type="password" name="contrasena2" required/>
                        </div>
                    </div>

                    <div class="botones">
                        <input type="submit" name="boton-enviar" value="Registrarse"/>
                        <p class="mensaje" name="mensaje">
                            <?php
                                if ( isset($_GET['error_R']) ){
                                    if ( $_GET['error_R'] == 'no' ){
                                        echo 'Registrado exitosamente';
                                    } elseif ( $_GET['error_R'] == 'pass' ) {
                                        echo 'Las contraseñas no coinciden';
                                    } elseif ( $_GET['error_R'] == 'user' ) {
                                        echo 'El rut no puede ser 0';
                                    } elseif ( $_GET['error_R'] == 'query' ) {
                                        echo 'Error al registrar usuario, intente nuevamente';
                                    } else {
                                        echo 'ERROR!';
                                    }
                                }
                            ?>
                        </p>
                    </div>
                </form>
            </div>

        </div>
</body>
</html>