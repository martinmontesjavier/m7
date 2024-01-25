<?php



abstract class Observable{
    
    private $observers = array();
    
    public function addObserver(Observer $observer){
        array_push($this->observers, $observer);
    }

    public function notifyObserver(){

        for($i=0;$i<count($this->observers);$i++){
            $widget = $this->observers[$i];
            $widget->update($this);
        }
    }

}



class DataSource extends Observable{

    private $paises;

    function __construct(){
        $this->paises = array();

    }

    public function addRecord($pais){
        array_push($this->paises, $pais);
        $this-> notifyObserver();
    }


    public function getData(){
        return array($this->paises);
    }

}


?>