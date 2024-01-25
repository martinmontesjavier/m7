<?php

require_once("observableMenu.php");
require_once("widgetMenu.php");

$dat = new DataSource();

$widgetA = new BasicWidget();
// $widgetB = new FancyWidget();

$dat->addObserver($widgetA);
// $dat->addObserver($widgetB);

$countries = [
    'Anguilla','Aruba','Austria','Azerbaijan',
    'Belgium','Bulgaria','Croatia','Curacao',
    'Cyprus','Denmark','Finland','France',
    'Georgia','Germany','Greece','Italy',
    'Luxembourg','Malta','Monaco','Netherlands',
    'Netherlands Antilles','Norway','Poland',
    'Portugal','Romania','Spain','Sweden',
    'Switzerland','Ukraine','United Kingdom'
];

$dat->addRecord($countries);

$widgetA->draw();

// $widgetB->draw();

?>