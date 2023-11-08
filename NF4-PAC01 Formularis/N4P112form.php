<?php
   echo <<<ENDHTML
   <html>
        <head>
            <title>Options</title>
        </head>
        <body>
            <form  action="N4P113formprocess.php" method="post">
            <label for="1">Valor 1:</label>
                <input type="text" id="1" name="1" required>
            <label for="2">Valor 2:</label>
                <input type="text" id="2" name="2" required>
            <label for="3">Valor 3:</label>
                <input type="text" id="3" name="3" required>
            <label for="4">Valor 4:</label>
                <input type="text" id="4" name="4" required>
            <label for="5">Valor 5:</label>
                <input type="text" id="5" name="5" required>
                <input name="botonEnviar" type="submit" value="Enviar">
            </form>
        </body>
    </html
     
   ENDHTML;
?>