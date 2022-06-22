<?php

class ConeccionRealDivisas
{
    private $con;

    function __construct()
    {
        $this->con = mysqli_connect(
            '127.0.0.1',
            'root',
            '1234',
            'realdivisas',
            3306
        );
    }

    function consulta($sql)
    {
        $respuesta = mysqli_query($this->con, $sql);
        $tabla = [];
        while ($fila = mysqli_fetch_assoc($respuesta)) {
            $tabla[] = $fila;
        }
        return $tabla;
    }

    function insert($sql)
    {
        $respuesta = mysqli_query($this->con, $sql);
        if ($respuesta === TRUE) {
            return mysqli_insert_id($this->con);
        } else {
            return FALSE;
        }
    }

    function update($sql)
    {
        $respuesta = mysqli_query($this->con, $sql);

        return $respuesta;
    }


    function delete($sql)
    {
        $respuesta = mysqli_query($this->con, $sql);
        return $respuesta;
    }


    function cantidadDeUsuarios($sql)
    {
        $respuesta = mysqli_query($this->con, $sql);
        $cantidadUsuarios = mysqli_num_rows($respuesta);
        return $cantidadUsuarios;
    }




    function cerrar()
    {
        mysqli_close($this->con);
    }
}
