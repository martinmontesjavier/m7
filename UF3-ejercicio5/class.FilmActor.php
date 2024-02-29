<?php
class FilmActor extends DataBoundObject {

    protected $ID;
    protected $ActorID;
    protected $FilmID;
    protected $LastUpdate;

    protected function DefineTableName() {
        return("film_actor");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "actor_id" => "ActorID",
            "film_id" => "FilmID",
            "last_update" => "LastUpdate"
        ));
    }
}

?>