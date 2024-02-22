<?php

        require("class.user2.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $objUser2 = new User($objPDO);

        $objUser2->setFirstName("Delete");
        $objUser2->setLastName("Delete");
        $objUser2->setDateAccountCreated(date("Y-m-d"));

        print "First name is " . $objUser2->getFirstName() . "<br />";
        print "Last name is " . $objUser2->getLastName() . "<br />";

        print "Saving...<br />";

        $objUser2->Save();

        print "ID in database is " . $objUser2->getID() . "<br />";

	$objUser2->MarkForDeletion();

	unset($objUser2);
    print '<hr>';

    $objUser3 = new User($objPDO);

    $objUser3->setFirstName('Javi');
    $objUser3->setLastName('Martín');
    $objUser3->setUsername('Javi8');
    $objUser3->setPassword('123456');
    $objUser3->setEmailAddress('Javi@gmail.com');
    $objUser3->setDateAccountCreated('2024-02-15');
    $objUser3->setTimeAccountCreated('14:30:00');
    $objUser3->setDateLastLogin('2024-02-15');
    $objUser3->setTimeLastLogin('14:30:00');

    $objUser3->Save();

    $objUser4 = new User($objPDO);

    $objUser4->setFirstName('Juan');
    $objUser4->setLastName('Pérez');
    $objUser4->setUsername('juanito');
    $objUser4->setPassword('password123');
    $objUser4->setEmailAddress('juanito@gmail.com');
    $objUser4->setDateAccountCreated('2024-02-16');
    $objUser4->setTimeAccountCreated('14:30:00');
    $objUser4->setDateLastLogin('2024-02-17');
    $objUser4->setTimeLastLogin('14:30:00');

    $objUser4->Save();

    $objUser5 = new User($objPDO);

    $objUser5->setFirstName('María');
    $objUser5->setLastName('López');
    $objUser5->setUsername('marialopez');
    $objUser5->setPassword('78910pass');
    $objUser5->setEmailAddress('marialopez@gmail.com');
    $objUser5->setDateAccountCreated('2024-02-18');
    $objUser5->setTimeAccountCreated('14:30:00');
    $objUser5->setDateLastLogin('2024-02-19');
    $objUser5->setTimeLastLogin('14:30:00');

    $objUser5->Save();


    print "<hr />";

        print "ID: " . $objUser3->getID() . "<br />";
        print "First name is " . $objUser3->getFirstName() . "<br />";
        print "Last name is " . $objUser3->getLastName() . "<br />";
        print "Password is " . $objUser3->getPassword() . "<br />";
        print "Mail is " . $objUser3->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";

    print "<hr />";

        print "ID: " . $objUser4->getID() . "<br />";
        print "First name is " . $objUser4->getFirstName() . "<br />";
        print "Last name is " . $objUser4->getLastName() . "<br />";
        print "Password is " . $objUser4->getPassword() . "<br />";
        print "Mail is " . $objUser4->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser4->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser4->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser4->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser4->getTimeAccountCreated() . "<br />";

    print "<hr />";

        print "ID: " . $objUser5->getID() . "<br />";
        print "First name is " . $objUser5->getFirstName() . "<br />";
        print "Last name is " . $objUser5->getLastName() . "<br />";
        print "Password is " . $objUser5->getPassword() . "<br />";
        print "Mail is " . $objUser5->getEmailAddress() . "<br />";
        print "DateLastLogin " . $objUser5->getDateLastLogin() . "<br />";
        print "TimeLastLogin " . $objUser5->getTimeLastLogin() . "<br />";
        print "DateAccountCreated " . $objUser5->getDateAccountCreated() . "<br />";
        print "TimeAccountCreated " . $objUser5->getTimeAccountCreated() . "<br />";

    
        $objUser3 = new User($objPDO, 23);

        $objUser3->setFirstName('Javi2');
        $objUser3->setLastName('Martín2');
        $objUser3->setUsername('Javi82');
        $objUser3->setPassword('1234562');
        $objUser3->setEmailAddress('Javi2@gmail.com');
        $objUser3->setDateAccountCreated('2024-02-16');
        $objUser3->setTimeAccountCreated('14:30:06');
        $objUser3->setDateLastLogin('2024-02-16');
        $objUser3->setTimeLastLogin('14:30:06');
    
        $objUser3->Save();
    
        $objUser4 = new User($objPDO, 24);
    
        $objUser4->setFirstName('Juan2');
        $objUser4->setLastName('Pérez2');
        $objUser4->setUsername('juanito2');
        $objUser4->setPassword('password1232');
        $objUser4->setEmailAddress('juanito2@gmail.com');
        $objUser4->setDateAccountCreated('2024-02-17');
        $objUser4->setTimeAccountCreated('14:30:02');
        $objUser4->setDateLastLogin('2024-02-18');
        $objUser4->setTimeLastLogin('14:30:02');
    
        $objUser4->Save();
    
        $objUser5 = new User($objPDO, 25);
    
        $objUser5->setFirstName('María2');
        $objUser5->setLastName('López2');
        $objUser5->setUsername('marialopez2');
        $objUser5->setPassword('78910pass2');
        $objUser5->setEmailAddress('marialopez2@gmail.com');
        $objUser5->setDateAccountCreated('2024-02-19');
        $objUser5->setTimeAccountCreated('14:30:02');
        $objUser5->setDateLastLogin('2024-02-20');
        $objUser5->setTimeLastLogin('14:30:02');
    
        $objUser5->Save();
    
    
        print "<hr />";
    
            print "ID: " . $objUser3->getID() . "<br />";
            print "First name is " . $objUser3->getFirstName() . "<br />";
            print "Last name is " . $objUser3->getLastName() . "<br />";
            print "Password is " . $objUser3->getPassword() . "<br />";
            print "Mail is " . $objUser3->getEmailAddress() . "<br />";
            print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
            print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
            print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
            print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";
    
        print "<hr />";
    
            print "ID: " . $objUser4->getID() . "<br />";
            print "First name is " . $objUser4->getFirstName() . "<br />";
            print "Last name is " . $objUser4->getLastName() . "<br />";
            print "Password is " . $objUser4->getPassword() . "<br />";
            print "Mail is " . $objUser4->getEmailAddress() . "<br />";
            print "DateLastLogin " . $objUser4->getDateLastLogin() . "<br />";
            print "TimeLastLogin " . $objUser4->getTimeLastLogin() . "<br />";
            print "DateAccountCreated " . $objUser4->getDateAccountCreated() . "<br />";
            print "TimeAccountCreated " . $objUser4->getTimeAccountCreated() . "<br />";
    
        print "<hr />";
    
            print "ID: " . $objUser5->getID() . "<br />";
            print "First name is " . $objUser5->getFirstName() . "<br />";
            print "Last name is " . $objUser5->getLastName() . "<br />";
            print "Password is " . $objUser5->getPassword() . "<br />";
            print "Mail is " . $objUser5->getEmailAddress() . "<br />";
            print "DateLastLogin " . $objUser5->getDateLastLogin() . "<br />";
            print "TimeLastLogin " . $objUser5->getTimeLastLogin() . "<br />";
            print "DateAccountCreated " . $objUser5->getDateAccountCreated() . "<br />";
            print "TimeAccountCreated " . $objUser5->getTimeAccountCreated() . "<br />";

            $objUser3->MarkForDeletion();

            unset($objUser3);
            
            $objUser4->MarkForDeletion();

            unset($objUser4);

            $objUser5->MarkForDeletion();

            unset($objUser5);
    // $objUser3 = new User($objPDO);

    //     $objUser2->setFirstName("Delete");
    //     $objUser2->setLastName("Delete");
    //     $objUser2->setDateAccountCreated(date("Y-m-d"));

    //     print "<br />";

    //     print "ID: " . $objUser3->getID() . "<br />";
    //     print "First name is " . $objUser3->getFirstName() . "<br />";
    //     print "Last name is " . $objUser3->getLastName() . "<br />";
    //     print "Password is " . $objUser3->getPassword() . "<br />";
    //     print "Mail is " . $objUser3->getEmailAddress() . "<br />";
    //     print "DateLastLogin " . $objUser3->getDateLastLogin() . "<br />";
    //     print "TimeLastLogin " . $objUser3->getTimeLastLogin() . "<br />";
    //     print "DateAccountCreated " . $objUser3->getDateAccountCreated() . "<br />";
    //     print "TimeAccountCreated " . $objUser3->getTimeAccountCreated() . "<br />";


    //     print "Wrong is " . ($objUser3->getWrong()?:"---") . "<br />";
