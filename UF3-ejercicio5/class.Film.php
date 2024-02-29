<?php
class Film extends DataBoundObject {

    protected $ID;
    protected $Title;
    protected $Description;
    protected $ReleaseYear;
    protected $LanguageID;
    protected $RentalDuration;
    protected $RentalRate;
    protected $Length;
    protected $ReplacementCost;
    protected $Rating;
    protected $LastUpdate;
    protected $specialFeatures;
    protected $Fulltext;

    protected function DefineTableName() {
        return("film");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "title" => "Title",
            "description" => "Description",
            "release_year" => "ReleaseYear",
            "language_id" => "LanguageID",
            "rental_duration" => "RentalDuration",
            "rental_rate" => "RentalRate",
            "length" => "Length",
            "replacement_cost" => "ReplacementCost",
            "rating" => "Rating",
            "last_update" => "LastUpdate",
            "special_features" => "SpecialFeatures",
            "fulltext" => "Fulltext"
        ));
    }

    // private function getSpecialFeatures() {
    //     $specialFeatures = $this->specialFeatures;
    //     if ($specialFeatures !== null) {
    //         // Verifica si las características especiales son un array
    //         if (is_array($specialFeatures)) {
    //             return $specialFeatures;
    //         } else {
    //             // Intenta decodificar las características especiales desde JSON
    //             $decodedFeatures = json_decode($specialFeatures, true);
    //             if (is_array($decodedFeatures)) {
    //                 return $decodedFeatures;
    //             }
    //         }
    //     }
    //     return []; // Devuelve un array vacío si no hay características especiales o no se pueden decodificar
    // }

    public function getSpecialFeatures() {
        if ($this->specialFeatures === null) {
            return [];
        }
        return json_decode($this->specialFeatures, true);
    }
}

?>