<?php 
    class Persona1 {
        public $edad;
        public function saludar() {
            echo 'Hi!';
        }

        public function decirEdad() {
            echo "Tengo " . $this->edad . " años";
        }
    }

    class Persona2 {
        public $nombre;
        public $edad;
        public function __construct($nombre, $edad=null) {
            $this->nombre = $nombre;
            $this->edad = $edad;
        }
        public function saludar() {
            echo 'Hi!, soy '. $this->nombre .'. Un gusto :)';
        }

        public function decirEdad() {
            if ($this->edad == null) {
                echo 'No se cual es mi edad XD';
            } else {
                echo "Tengo " . $this->edad . " años";
            }
        }
    }

    class Persona3 extends Persona2 {
        public $color;
        public function __construct($nombre, $edad=null, $color=null) {
            parent::__construct($nombre, $edad);
            $this->color = $color;
        }

        public function colorFav() {
            echo "Mi color favorito es el {$this->color}";
        }
    }

    $p1 = new Persona1();
    $p1->edad = 17;
    echo $p1->edad . "<br/>";
    $p1->saludar();
    echo ", ";
    $p1->decirEdad();
    echo "<br/>";

    $p2 = new Persona1();
    $p2->edad = 15;
    $p2->saludar();
    echo ", ";
    $p2->decirEdad();
    echo "<br/>";

    $p3 = new Persona2('Carlos');
    $p3->saludar();
    echo ". ";
    $p3->decirEdad();
    echo "<br/>";

    $p4 = new Persona3('Gabriel', 17, 'Azul');
    $p4->saludar();
    echo ". ";
    $p4->decirEdad();
    echo ". ";
    $p4->colorFav();
    echo "<br/>"
?>