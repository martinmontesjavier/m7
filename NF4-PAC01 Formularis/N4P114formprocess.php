<?php
   echo <<<ENDHTML
   <html>
        <head>
            <title>Operaciones</title>
        </head>
        <body>
            <form  action="N4P115formprocess.php" method="post">
            <label for="1">Valor 1:</label>
                <input type="text" id="1" name="1" required>
            <label for="2">Valor 2:</label>
                <input type="text" id="2" name="2" required>
                <input name="suma" type="submit" value="+">
                <input name="resta" type="submit" value="-">
                <input name="multi" type="submit" value="*">
                <input name="dividir" type="submit" value="/">
            </form>
        </body>
    </html
     
   ENDHTML;
?>