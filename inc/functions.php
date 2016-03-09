<?php

// This function keeps the tabs working as they are set up now. For now...
    function setBody()
    {
        $request_script = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        if ($request_script == "index.php") {
            echo 'tab1';
        }
        if ($request_script == "select.php") {
            echo 'tab2';
        }
        if ($request_script == "browse.php") {
            echo 'tab3';
        }
    }

    $sql = new PDO('mysql:host=localhost;dbname=cmp_database', "user", "");
 ?>
