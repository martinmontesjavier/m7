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

class Grafic extends Widget{
    
    public function draw(){
        $html = "<html><head>";
        $html.= "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
        $html.= "</head><body>";
		$html.= "<div style='width: 1000px; height: 1000px;'><canvas id='myChart'></canvas></div>";
		$html.= "<script>
                    const ctx = document.getElementById('myChart');                    
                    const data = {
                        labels: [";

        $numFilas1 = count($this->internalData[0]); // numero de filas

        for ($i=0; $i < $numFilas1; $i++) { 
            
            $dia = $this->internalData[0]; 

            $html.= "'$dia[$i]',";
            
        }

        $html.= "],
            datasets: [{
                label: 'Dataset',
                data: [";
		
        $numFilas2 = count($this->internalData[0]); // numero de filas

        for ($i=0; $i < $numFilas2; $i++) { 
    
            $posicion = $this->internalData[1]; 

            $html.= "$posicion[$i],";
            
        }
        
        $html.= "],
            borderColor: 'red',
            backgroundColor: [";

        $numFilas3 = count($this->internalData[0]); // numero de filas

        for ($i=0; $i < $numFilas3; $i++) { 

            $color = $this->internalData[2]; 

            $html.= "'$color[$i]',";
            
        }
    


        $html.= "],
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
              responsive: true,
              plugins: {
                title: {
                  display: true,
                  text: (ctx) => 'Point Style: ' + config.data.datasets[0].pointStyle,
                }
              }
            }
          };

          const chart = new Chart(ctx, config);

          const actions = [
            {
              name: 'pointStyle: circle (default)',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'circle';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: cross',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'cross';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: crossRot',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'crossRot';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: dash',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'dash';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: line',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'line';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: rect',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'rect';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: rectRounded',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'rectRounded';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: rectRot',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'rectRot';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: star',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'star';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: triangle',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = 'triangle';
                });
                chart.update();
              }
            },
            {
              name: 'pointStyle: false',
              handler: (chart) => {
                chart.data.datasets.forEach(dataset => {
                  dataset.pointStyle = false;
                });
                chart.update();
              }
            }
          ];
        </script>
        </body></html>";
        echo $html;  
    }
}
