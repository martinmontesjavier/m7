<?php

interface Observer{
    public function update(Observable $subject);
}



abstract class Widget implements Observer{
    
    protected $internalData = array();

    abstract public function draw();

    public function update(Observable $subject){
        $this->internalData = $subject->getData();
    }

}

class BasicWidget extends Widget{

	public function draw(){

        $html = "<link rel=\"stylesheet\" href=\"style.css\">";
        $html.= "<script src=\"main.js\"></script>";
        $html.= "<div class=\"select-wrapper\">";
        $html.= "<div class=\"select-btn\">";
        $html.= "<span>Select a country</span>";
        $html.= "<ion-icon name=\"chevron-down\"></ion-icon>";
        $html.= "</div>";
		$html.= "<ul class=\"options\">";

        $numPaises = count($this->internalData[0][0]); // numero de filas
        echo $numPaises;


        $pais = $this->internalData[0];

        for($i=0; $i<$numPaises;$i++){
            
            $html .= "<li class=\"selected\" onclick=\"updateName(this)\">" . $pais[0][$i] . "</li>";
                      

        }

		$html.= "</ul>";
        $html.= "</div>";
        $html.= "</div>";

        echo $html;
	}
}


// class FancyWidget extends Widget{

// 	public function draw(){

// 		$html = "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>";
// 		$html.= "<tr><td colspan=3 bgcolor=#cccccc>";
// 		$html.= "<b><span class=blue>Our Latest Prices</span></b></td></tr>";
// 		$html.= "<tr><th>instrument</th><th>price</th><th>date issued</th></tr>";

//         $numFilas = count($this->internalData[0]); // numero de filas

//         for($i=0; $i<$numFilas;$i++){
//             $instrumentos = $this->internalData[0];
//             $precios = $this->internalData[1];
//             $anyos = $this->internalData[2];

//             $html.= "<tr><td>$instrumentos[$i]</td><td>$precios[$i]</td><td>$anyos[$i]</td></tr>";

//         }

// 		$html.= "</table>";

//         echo $html;
// 	}

// }

?>