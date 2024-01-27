<?php
include ('sesion.php');
?>

<!DOCTYPE html> 
<html>
<head>
    <meta charset="UTF-8"/>
    <title>formulario eliminar PERSONAL</title>
    <link type="text/css" href="estilo.css" rel="stylesheet">

</head>

<body>
	



		<div class="encabezado">
                <h1>Modificar registro</h1>
            </div>

            <div class="formulario">
                <form ="registro" method="post" action="" enctype="application/x-www-form-urlencoded">

                	<div class="campo">
                        <label name="Seleccionar">Ingresa el Rut del registro a modificar:</label>
		 				<input name='seleccionar' type="text" required>
                    </div>

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

                    <div class="botones">
                        <input type="submit" name="modificar" value="Modificar"/>
					</div>
				</form>
			    

			    
			</div>
		</div>
</body>
</html>		