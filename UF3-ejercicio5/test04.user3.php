<?php
        require("class.pdofactory.php");
        require("abstract.databoundobject.php");
        // require("class.user3.php");
        require("class.Actor.php");
        require("class.Film.php");
        require("class.FilmActor.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Crear objetos y pasar $objPDO como argumento
        $objActor = new Actor($objPDO);
        $objFilm = new Film($objPDO);
        $objFilmActor = new FilmActor($objPDO);
        
        // $objActor = new Actor($objPDO);
        // $objActor->setFirstName("Ryan");
        // $objActor->setLastName("Gosling");
        // $objActor->Save();

        $objActor = new Actor($objPDO,1);

        $objActor->setFirstName("Emma");
        $objActor->setLastName("Stone");
        $objActor->Save();

        print "Actor ID is " . $objActor->getID() . "<br />";
        print "First Name is " . $objActor->getFirstName() . "<br />";
        print "Last Name is " . $objActor->getLastName() . "<br />";
        print "Last Update is " . $objActor->getLastUpdate() . "<br />";

        print "Deleting...";

        $objActor->MarkForDeletion();

	    unset($objActor);

        
        $objFilm = new Film($objPDO,1);
        // $objFilm->setTitle("La La Land");
        // $objFilm->setDescription("Un pianista de jazz se enamora de una aspirante a actriz en Los Ángeles.");
        // $objFilm->setReleaseYear(2016);
        // $objFilm->setLanguageID(1); 
        // $objFilm->setRentalDuration(3);
        // $objFilm->setRentalRate(4.99);
        // $objFilm->setLength(128); 
        // $objFilm->setReplacementCost(19.99);
        // $objFilm->setRating("PG-13");
        // $objFilm->setLastUpdate(date("Y-m-d H:i:s"));
        // $objFilm->setSpecialFeatures(json_encode(['Trailers', 'Commentaries']));
        // $objFilm->setFulltext("La La Land romance musical");
        // $objFilm->Save();

        $objFilm->setTitle("Poor things");
        $objFilm->setDescription("Aun no la he visto, no se");
        $objFilm->setReleaseYear(2023);
        $objFilm->setLanguageID(2); 
        $objFilm->setRentalDuration(4);
        $objFilm->setRentalRate(5.99);
        $objFilm->setLength(140); 
        $objFilm->setReplacementCost(20.00);
        $objFilm->setRating("PG-16");
        $objFilm->setLastUpdate(date("Y-m-d H:i:s"));
        $objFilm->setSpecialFeatures(json_encode(['Trailers', 'Commentaries']));
        $objFilm->setFulltext("Película nominada a Oscar");
        $objFilm->Save();

        print "Film ID is " . $objFilm->getID() . "<br />";
        print "Title is " . $objFilm->getTitle() . "<br />";
        print "Description is " . $objFilm->getDescription() . "<br />";
        print "Release Year is " . $objFilm->getReleaseYear() . "<br />";
        print "Language ID is " . $objFilm->getLanguageID() . "<br />";
        print "Rental Duration is " . $objFilm->getRentalDuration() . "<br />";
        print "Rental Rate is " . $objFilm->getRentalRate() . "<br />";
        print "Length is " . $objFilm->getLength() . "<br />";
        print "Replacement Cost is " . $objFilm->getReplacementCost() . "<br />";
        print "Rating is " . $objFilm->getRating() . "<br />";
        print "Last Update is " . $objFilm->getLastUpdate() . "<br />";
        print "Special Features are " . implode(", ", $objFilm->getSpecialFeatures()) . "<br />";
        print "Fulltext is " . $objFilm->getFulltext() . "<br />";

        print "Deleting...";

        $objFilm->MarkForDeletion();

	    unset($objFilm);

        
        $objFilmActor = new FilmActor($objPDO,1);
        // $objFilmActor->setActorID($objActor->getID());
        // $objFilmActor->setFilmID($objFilm->getID());
        // $objFilmActor->Save();

        $objFilmActor->setActorID($objActor->getID());
        $objFilmActor->setFilmID($objFilm->getID());
        $objFilmActor->Save();

        print "FilmActor ID is " . $objFilmActor->getID() . "<br />";
        print "Actor ID is " . $objFilmActor->getActorID() . "<br />";
        print "Film ID is " . $objFilmActor->getFilmID() . "<br />";
        print "Last Update is " . $objFilmActor->getLastUpdate() . "<br />";

        print "Deleting...";

        $objFilmActor->MarkForDeletion();

	    unset($objFilmActor);

        

?>