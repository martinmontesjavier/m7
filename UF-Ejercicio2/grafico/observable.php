<?php

abstract class Observable {

    private $observers = array();

    public function addObserver(Observer $observer){

        array_push($this->observers, $observer);
    }

    public function notifyObserver(){
        for ($i=0; $i < count($this->observers); $i++) { 
            $widget = $this->observers[$i];
            $widget->update($this);
        }
    }
}

class DataSource extends Observable{

    private $dias;  // Cambiar esta línea
    private $posiciones;
    private $colores;

    function __construct(){
        $this->dias = array();  // Cambiar esta línea
        $this->posiciones = array();
        $this->colores = array();
    }

    public function addRecord($dia, $posicion, $color){
        array_push($this->dias, $dia);
        array_push($this->posiciones, $posicion);
        array_push($this->colores, $color);
        $this->notifyObserver();
    }

    public function getData(){
        return array($this->dias, $this->posiciones, $this->colores);
    }
}