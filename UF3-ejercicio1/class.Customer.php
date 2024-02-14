<?php

class Customer {

        private $Cust_code;
        private $Cust_name;
        private $Cust_city;
        private $Working_area;
        private $Cust_country;
        private $Grade;

        private $Opening_amt;
        private $Receive_amt;
        private $Payment_amt;
        private $Outstanding_amt;
        private $Phone_no;
        private $Agent_code;

        public function __call($strFunction, $arArguments) {

                $strMethodType = substr($strFunction, 0, 3);
                $strMethodMember = substr($strFunction, 3);
                switch ($strMethodType) {
                        case "set":
                                return($this->SetAccessor($strMethodMember,
                                       $arArguments[0]));
                                break;
                        case "get":
                                return($this->GetAccessor($strMethodMember));
                };
                return(false);
        }

        private function SetAccessor($strMember, $strNewValue) {
                if (property_exists($this, $strMember)) {
                        if (is_numeric($strNewValue)) {
                                eval('$this->' . $strMember . ' = ' . $strNewValue
                                     . ';');
                        } else {
                                eval('$this->' . $strMember . ' = "' . $strNewValue
                                     . '";');
                        };
                } else {
                        return(false);
                };
        }

        private function GetAccessor($strMember) {
                if (property_exists($this, $strMember)) {
                        eval('$strRetVal = $this->' . $strMember . ';');
                        return($strRetVal);
                } else {
                        return(false);
                };
        }

        // public function exchangeInformation(Customer $otherCustomer) {
        //     // Guardar temporalmente la información del otro objeto
        //     $tempData = [
        //         'cust_code' => $otherCustomer->getCust_code(),
        //         'cust_name' => $otherCustomer->getCust_name(),
        //         'cust_city' => $otherCustomer->getCust_city(),
        //         'working_area' => $otherCustomer->getWorking_area(),
        //         'cust_country' => $otherCustomer->getCust_country(),
        //         'grade' => $otherCustomer->getGrade(),
        //         'opening_amt' => $otherCustomer->getOpening_amt(),
        //         'receive_amt' => $otherCustomer->getReceive_amt(),
        //         'payment_amt' => $otherCustomer->getPayment_amt(),
        //         'outstanding_amt' => $otherCustomer->getOutstanding_amt(),
        //         'phone_no' => $otherCustomer->getPhone_no(),
        //         'agent_code' => $otherCustomer->getAgent_code(),
        //     ];
            
        //     // Intercambiar información
        //     $otherCustomer->setCust_code($this->getCust_code());
        //     $otherCustomer->setCust_name($this->getCust_name());
        //     $otherCustomer->setCust_city($this->getCust_city());
        //     $otherCustomer->setWorking_area($this->getWorking_area());
        //     $otherCustomer->setCust_country($this->getCust_country());
        //     $otherCustomer->setGrade($this->getGrade());
        //     $otherCustomer->setOpening_amt($this->getOpening_amt());
        //     $otherCustomer->setReceive_amt($this->getReceive_amt());
        //     $otherCustomer->setPayment_amt($this->getPayment_amt());
        //     $otherCustomer->setOutstanding_amt($this->getOutstanding_amt());
        //     $otherCustomer->setPhone_no($this->getPhone_no());
        //     $otherCustomer->setAgent_code($this->getAgent_code());
            
        //     // Asignar la información temporal al objeto actual
        //     $this->setCust_code($tempData['cust_code']);
        //     $this->setCust_name($tempData['cust_name']);
        //     $this->setCust_city($tempData['cust_city']);
        //     $this->setWorking_area($tempData['working_area']);
        //     $this->setCust_country($tempData['cust_country']);
        //     $this->setGrade($tempData['grade']);
        //     $this->setOpening_amt($tempData['opening_amt']);
        //     $this->setReceive_amt($tempData['receive_amt']);
        //     $this->setPayment_amt($tempData['payment_amt']);
        //     $this->setOutstanding_amt($tempData['outstanding_amt']);
        //     $this->setPhone_no($tempData['phone_no']);
        //     $this->setAgent_code($tempData['agent_code']);
        // }
}

?>