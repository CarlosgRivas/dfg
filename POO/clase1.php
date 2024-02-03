<?php 
    class Persona {
        public $edad;
        public function saludar() {
            echo 'Hi!';
        }

        public function decirEdad() {
            echo "Tengo " . $this->edad . " años";
        }
    }

    /* antes del constructor
    $p1 = new Persona();
    $p1->edad = 17;
    echo $p1->edad . "<br/>";
    $p1->saludar();
    echo ", ";
    $p1->decirEdad();
    echo "<br/>";
    $p2 = new Persona();
    $p2->edad = 15;
    $p2->saludar();
    echo ", ";
    $p2->decirEdad();
    */
?>