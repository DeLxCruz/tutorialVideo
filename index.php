<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "tutorial";

$conexion = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post" name="tutorial">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="email" name="correo" placeholder="correo">
        <input type="text" name="telefono" placeholder="telefono">

        <button type="submit" name="registro">Enviar</button>
    </form>


    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = "SELECT * FROM usuarios";
            $ejecutar = $conexion->query($consulta);
            $i = 0;
            while ($fila = $ejecutar->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['correo']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<?php

if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $insertar = "INSERT INTO usuarios (nombre, correo, telefono) VALUES ('$nombre', '$correo', '$telefono')";
    $conexion->query($insertar);

    header("Location: {$_SERVER['PHP_SELF']}"); // Para que no se envie el formulario nuevamente
    exit();
}

?>