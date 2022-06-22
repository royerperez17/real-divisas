<?php 
    class Precios{
        public $id_Divisa;
        public $precioCompra;
        public $precioVenta;

        function __construct($id_Divisa, $precioCompra, $precioVenta){
            
            $this-> id_Divisa = $id_Divisa;
            $this-> precioCompra = $precioCompra;
            $this-> precioVenta = $precioVenta;
        }
        
        static function desdeFila($fila){
        $precio = new Precios(
            $fila['id_Divisa'],
            $fila['precioCompra'],
            $fila['precioVenta']

        );
        return $precio;
        }

        static function desdeAdministrarPrecio($fila){
            $precio = Precios::desdeFila($fila);
            $precio->id_Divisa=$fila['id_Divisa'];
            $precio->precioCompra=$fila['precioCompra'];
            $precio->precioVenta=$fila['precioVenta'];
            return $precio;
        }




    }   


?>