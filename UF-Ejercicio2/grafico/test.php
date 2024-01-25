<?php

require_once('observable.php');
require_once('widget.php');

$dat = new DataSource();  // Corregir el nombre de la clase

$widget = new Grafic();

$dat->addObserver($widget);

$dat->addRecord('Dia 1',80,'red');
$dat->addRecord('Dia 2',20,'red');
$dat->addRecord('Dia 3',90,'red');
$dat->addRecord('Dia 4',50,'red');
$dat->addRecord('Dia 5',70,'red');
$dat->addRecord('Dia 6',70,'red');

$widget->draw();