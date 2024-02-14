<?php

require("class.Customer.php");

$objCust2 = new Customer();
$objCust2->setCust_code(1);
$objCust2->setCust_name("Kecky-Thomson");
$objCust2->setCust_city("Badalona");
$objCust2->setWorking_area("Barcelona");
$objCust2->setCust_country("España");
$objCust2->setGrade(5);
$objCust2->setOpening_amt(1000);
$objCust2->setReceive_amt(2000);
$objCust2->setPayment_amt(3000);
$objCust2->setOutstanding_amt(4000);
$objCust2->setPhone_no(123456789);
$objCust2->setAgent_code(23);


$objCust = new Customer();
$objCust->setCust_code(2);
$objCust->setCust_name("Manolito");
$objCust->setCust_city("Barajas");
$objCust->setWorking_area("Madrid");
$objCust->setCust_country("España");
$objCust->setGrade(6);
$objCust->setOpening_amt(4000);
$objCust->setReceive_amt(3000);
$objCust->setPayment_amt(2000);
$objCust->setOutstanding_amt(1000);
$objCust->setPhone_no(987654321);
$objCust->setAgent_code(28);

print "Código del cliente: " . $objCust->getCust_code() . "<br/>";
print "Nombre del cliente: " . $objCust->getCust_name() . "<br/>";
print "Ciudad del cliente: " . $objCust->getCust_city() . "<br/>";
print "Área de trabajo del cliente: " . $objCust->getWorking_area() . "<br/>";
print "País del cliente: " . $objCust->getCust_country() . "<br/>";
print "Grado del cliente: " . $objCust->getGrade() . "<br/>";
print "Monto de apertura: " . $objCust->getOpening_amt() . "<br/>";
print "Monto recibido: " . $objCust->getReceive_amt() . "<br/>";
print "Monto de pago: " . $objCust->getPayment_amt() . "<br/>";
print "Monto pendiente: " . $objCust->getOutstanding_amt() . "<br/>";
print "Número de teléfono del cliente: " . $objCust->getPhone_no() . "<br/>";
print "Código de agente del cliente: " . $objCust->getAgent_code() . "<br/>";




print "<br/>";
print "Código del cliente: " . $objCust2->getCust_code() . "<br/>";
print "Nombre del cliente: " . $objCust2->getCust_name() . "<br/>";
print "Ciudad del cliente: " . $objCust2->getCust_city() . "<br/>";
print "Área de trabajo del cliente: " . $objCust2->getWorking_area() . "<br/>";
print "País del cliente: " . $objCust2->getCust_country() . "<br/>";
print "Grado del cliente: " . $objCust2->getGrade() . "<br/>";
print "Monto de apertura: " . $objCust2->getOpening_amt() . "<br/>";
print "Monto recibido: " . $objCust2->getReceive_amt() . "<br/>";
print "Monto de pago: " . $objCust2->getPayment_amt() . "<br/>";
print "Monto pendiente: " . $objCust2->getOutstanding_amt() . "<br/>";
print "Número de teléfono del cliente: " . $objCust2->getPhone_no() . "<br/>";
print "Código de agente del cliente: " . $objCust2->getAgent_code() . "<br/>";


// $objCust->exchangeInformation($objCust2);

// print "<br/>Después del intercambio:<br/>";
// print "Código del cliente: " . $objCust->getCust_code() . "<br/>";
// print "Nombre del cliente: " . $objCust->getCust_name() . "<br/>";
// print "Ciudad del cliente: " . $objCust->getCust_city() . "<br/>";
// print "Área de trabajo del cliente: " . $objCust->getWorking_area() . "<br/>";
// print "País del cliente: " . $objCust->getCust_country() . "<br/>";
// print "Grado del cliente: " . $objCust->getGrade() . "<br/>";
// print "Monto de apertura: " . $objCust->getOpening_amt() . "<br/>";
// print "Monto recibido: " . $objCust->getReceive_amt() . "<br/>";
// print "Monto de pago: " . $objCust->getPayment_amt() . "<br/>";
// print "Monto pendiente: " . $objCust->getOutstanding_amt() . "<br/>";
// print "Número de teléfono del cliente: " . $objCust->getPhone_no() . "<br/>";
// print "Código de agente del cliente: " . $objCust->getAgent_code() . "<br/>";

// print "<br/>";

// print "Código del cliente: " . $objCust2->getCust_code() . "<br/>";
// print "Nombre del cliente: " . $objCust2->getCust_name() . "<br/>";
// print "Ciudad del cliente: " . $objCust2->getCust_city() . "<br/>";
// print "Área de trabajo del cliente: " . $objCust2->getWorking_area() . "<br/>";
// print "País del cliente: " . $objCust2->getCust_country() . "<br/>";
// print "Grado del cliente: " . $objCust2->getGrade() . "<br/>";
// print "Monto de apertura: " . $objCust2->getOpening_amt() . "<br/>";
// print "Monto recibido: " . $objCust2->getReceive_amt() . "<br/>";
// print "Monto de pago: " . $objCust2->getPayment_amt() . "<br/>";
// print "Monto pendiente: " . $objCust2->getOutstanding_amt() . "<br/>";
// print "Número de teléfono del cliente: " . $objCust2->getPhone_no() . "<br/>";
// print "Código de agente del cliente: " . $objCust2->getAgent_code() . "<br/>";

?>
