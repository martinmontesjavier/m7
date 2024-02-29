<?php

class Actor extends DataBoundObject {

    protected $ID;
    protected $FirstName;
    protected $LastName;
    protected $LastUpdate;

    protected function DefineTableName() {
        return("actor");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "first_name" => "FirstName",
            "last_name" => "LastName",
            "last_update" => "LastUpdate"
        ));
    }
}

?>