<?php

        require("class.user.insert.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $objUser = new User($objPDO, 2);

        // print "ID: " . $objUser->getID() . "<br />";
        // print "First name is " . $objUser->getFirstName() . "<br />";
        // print "Last name is " . $objUser->getLastName() . "<br />";
        // print "Password is " . $objUser->getPassword() . "<br />";
        // print "Mail is " . $objUser->getEmailAddress() . "<br />";
        // print "Wrong is " . ($objUser->getWrong()?:"---") . "<br />";

        // $objUser->setFirstName("Ed2");
        // $objUser->Save();

        // $objUser2 = new User($objPDO);

        // $objUser2->setFirstName("Steve");
        // $objUser2->setLastName("Nowicki");
        // $objUser2->setDateAccountCreated(date("Y-m-d"));

        // print "First name is " . $objUser2->getFirstName() . "<br />";
        // print "Last name is " . $objUser2->getLastName() . "<br />";

        // print "Saving...<br />";

        // $objUser2->Save();

        // print "ID in database is " . $objUser2->getID() . "<br />";



        $objUser3 = new User($objPDO, 3);

        print "<br />";

        print "ID: " . $objUser3->getID() . "<br />";
        print "First name is " . $objUser3->getFirstName() . "<br />";
        print "Last name is " . $objUser3->getLastName() . "<br />";
        print "Password is " . $objUser3->getPassword() . "<br />";
        print "Mail is " . $objUser3->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser3->getWrong()?:"---") . "<br />";

        $objUser3->Save();

        $objUser4 = new User($objPDO, 4);

        print "<br />";

        print "ID: " . $objUser4->getID() . "<br />";
        print "First name is " . $objUser4->getFirstName() . "<br />";
        print "Last name is " . $objUser4->getLastName() . "<br />";
        print "Password is " . $objUser4->getPassword() . "<br />";
        print "Mail is " . $objUser4->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser4->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser4->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser4->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser4->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser3->getWrong()?:"---") . "<br />";

        $objUser4->Save();

        $objUser3->exchangeInformation($objUser4);

        print "<br />";
        print "<br />";
        print "Despues del cambio";
        print "<br />";
        print "<br />";


        $objUser3 = new User($objPDO, 3);

        print "<br />";

        print "ID: " . $objUser3->getID() . "<br />";
        print "First name is " . $objUser3->getFirstName() . "<br />";
        print "Last name is " . $objUser3->getLastName() . "<br />";
        print "Password is " . $objUser3->getPassword() . "<br />";
        print "Mail is " . $objUser3->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser3->getWrong()?:"---") . "<br />";

        $objUser3->Save();
        
        $objUser4 = new User($objPDO, 4);

        print "<br />";

        print "ID: " . $objUser4->getID() . "<br />";
        print "First name is " . $objUser4->getFirstName() . "<br />";
        print "Last name is " . $objUser4->getLastName() . "<br />";
        print "Password is " . $objUser4->getPassword() . "<br />";
        print "Mail is " . $objUser4->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser4->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser4->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser4->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser4->getTimeAccountCreated() . "<br />";


        print "Wrong is " . ($objUser3->getWrong()?:"---") . "<br />";

        $objUser4->Save();

        // $objUser3->setFirstName("JOSELE");
        // $objUser3->setLastName("LOQUETE");
        // $objUser3->setPassword("12345");
        // $objUser3->setEmailAddress("JOSELE@gmail.com");
        
        // $objUser3->Save();
      