<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>formulario modificar PERSONAL</title>
    <link type="text/css" href="./../estilo.css" rel="stylesheet">

</head>

<body>
    <?php
    require('sesion.php');
    require('./../conexion.php');
    ?>

    <table>
        <tr>
            <th>Rut</th>
            <th>Nombre completo</th>
            <th>Email</th>
        </tr>

        <?php
        $sql = 'SELECT rut, CONCAT(nombre, \' \', apellido) AS nombre_completo, email FROM users';
        $result = ($db->query($sql))->fetchAll(PDO::FETCH_ASSOC);


        if (! empty($result)) {
            foreach ($result as $user) {
                echo '<tr>';
                echo '<td>' . $user['rut'] . '</td>';
                echo '<td>' . $user['nombre_completo'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
    <br>

    <div class="encabezado">
        <h1>Modificar registro</h1>
    </div>

    <div class="formulario">
        <p style="font-weight: bold">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'rut') {
                    echo 'Rut no encontrado';
                }
            }
            ?>
        </p>
        <form name="registro" method="post" action="" enctype="application/x-www-form-urlencoded">

            <div class="campo">
                <label name="Seleccionar">Ingresa el Rut del registro a modificar:</label>
                <input name='seleccionar' type="number" required />
            </div>

            <div class="campo">
                <label for="rut">RUT:</label>
                <input type="number" name="rut" />
            </div>

            <div class="campo">
                <div class="en-linea izquierdo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" />
                </div>

                <div class="en-linea">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" />
                </div>
            </div>

            <div class="campo">
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" />
            </div>

            <div class="botones">
                <input type="submit" name="modificar" value="Modificar" />
            </div>
        </form>
    </div>

    <?php
    function cambia($val, $key)
    {
        if (($key == 'modificar') or ($key == 'seleccionar') or (empty($val))) {
            return false;
        } else {
            return true;
        }
    }

    if (isset($_POST['modificar'])) {
        require('funcAux.php');
        if (! rutExist($db, $_POST['seleccionar'])) {
            header('Location: modificar.php?error=rut');
            exit();
        }


        // Se queda solamente con los campos a actualizar
        $campos = array_filter($_POST, 'cambia', ARRAY_FILTER_USE_BOTH);

        if (empty($campos)) {
            header('Location: modificar.php');
            exit();
        }

        // Armado de sql
        $sql = 'UPDATE users SET ';
        foreach ($campos as $key => $val) {
            $sql = $sql . $key . '=?, ';
        }
        $sql = substr($sql, 0, -2);
        $sql = $sql . ' WHERE rut = ? ;';

        // Ingresando valores
        $query = $db->prepare($sql);
        $i = 1;
        foreach ($campos as $key => $val) {
            $query->bindValue($i, $val);
            $i++;
        }
        $query->bindValue($i, $_POST['seleccionar']);

        //Ejecutar y refrescar
        $query->execute() or die('No se pudo modificar');
        header('Location: modificar.php');
    }
    ?>
</body>

</html>