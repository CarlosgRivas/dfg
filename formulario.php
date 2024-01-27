<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Formulario</title>
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body>

        <div class="contenedor">
            <div class="login">
                <?php
                    if(isset($_GET['error'])) {
                        if ($_GET['error'] == 'si') {
                            echo '<span style="color:red; font-weight:bold; font-size:2em;">Revise los datos</span>';
                        }
                    }
                ?>
                
                <h2>Login </br></h2>
                <form name="login" method="post" action="validar.php" enctype="application/x-www-form-urlencoded">
                    <div class="izquierda">
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" />
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
                        <input type="text" name="rut" required/>
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
                        <p class="mensaje" name="mensaje"></p>
                        <?php
                            if (isset($_GET['passError'])) {
                                if($_GET['passError'] == 'si'){
                                    echo '<span style="color:red; font-weight:bold; font-size:1.5em;">Las contraseñas no coinciden</span>';
                                }
                            } elseif (isset($_GET['valido'])) {
                                if($_GET['valido'] == 'si'){
                                    echo '<span style="color:green; font-weight:bold; font-size:1.5em;">Registro exitoso :)</span>';
                                }
                            }
                        ?>
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>