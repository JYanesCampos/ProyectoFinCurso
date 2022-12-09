<?php
SESSION_START();
include_once ('./php/config.php');

    $oUsuario = json_decode($_POST['datos']);

    extract($_POST);
    extract ($datos);

    //Conexion con la base de datos
    $conexion = new mysqli(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME);
    $conexion -> set_charset("utf8");

    if ($conexion -> connect_error)
    {
        die ("Conexion fallida: " . $conexion -> connect_error);
    }

    $sql = "SELECT * FROM usuario WHERE email = $oUsuario->email";

    $resultado = $conexion -> query($sql);

    //Si no hay usuario en la BBDD.
    if ($resultado -> num_rows == 0)
    {
        $sqlInsert = "INSERT INTO usuario (`nombre`, `apellidos`, `telefono`, `email`, `password`)
        VALUES (`$nombre`, `$apellidos`, `$telefono`, `$email`, `$contraseña`)";

        $resultadoInsert = $conexion -> query($sqlInsert);
        $mensaje = "Alta de usuario correcto.";
        $error = false;
    }
    //Si hay usuario en la BBDD.
    else
    {
        $mensaje = "El cliente ya existe.";
        $error = true;
    }

    $objeto_salida = array (
        "mensaje" => $mensaje,
        "error" => $error,
        "formulario" => "frmRegistroUsuario",
        "area" => "containerRegistrarUsuario",
    );
    $json_salida = json_encode($objeto_salida);
    echo $json_salida;

    $conexion -> close();

?>