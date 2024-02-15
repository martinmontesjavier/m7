
<?php

        require("class.user.select.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        for ($i = 1; $i <= 3; $i++) {
            $objUser = new User($objPDO, $i);
        
            print "ID: " . $objUser->getID() . "<br />";
            print "First name is " . $objUser->getFirstName() . "<br />";
            print "Last name is " . $objUser->getLastName() . "<br />";
            print "Username is " . $objUser->getUsername() . "<br />";
            print "Password is " . $objUser->getPassword() . "<br />";
            print "Email Address is " . $objUser->getEmailAddress() . "<br />";
            print "Date Last Login is " . $objUser->getDateLastLogin() . "<br />";
            print "Time Last Login is " . $objUser->getTimeLastLogin() . "<br />";
            print "Date Account Created is " . $objUser->getDateAccountCreated() . "<br />";
            print "Time Account Created is " . $objUser->getTimeAccountCreated() . "<br />";
            print "<br />";
        }

        // PARA SACAR TODOS SIN IMPORTAR LOS USERS QUE HAYAN
        // try {
        //     $query = "SELECT id FROM system_user";
        //     $stmt = $objPDO->prepare($query);
        //     $stmt->execute();
        //     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //     foreach ($users as $user) {
        //         $objUser = new User($objPDO, $user['id']);
        
        //         print "ID: " . $objUser->getID() . "<br />";
        //         print "First name is " . $objUser->getFirstName() . "<br />";
        //         print "Last name is " . $objUser->getLastName() . "<br />";
        //         print "Password is " . $objUser->getPassword() . "<br />";
        //         print "<br />";
        //     }
        // } catch (PDOException $e) {
        //     echo "Error: " . $e->getMessage();
        // }


?>