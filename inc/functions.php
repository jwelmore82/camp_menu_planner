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
//Basic connection
try {
    $sql = new PDO('mysql:host=localhost;dbname=cmp_database', "user", "");
    $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
try {
    $ret= $sql->prepare('SELECT * FROM `ingredients` ORDER BY display_name');
    //Order by display_name so visitors always see checkboxes in alphabetical order.
    $ret->execute();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

//
    $ingredients = $ret->fetchAll(PDO::FETCH_ASSOC);
    $keyed_ingredients = array();
    foreach ($ingredients as $ingredient) {
        $keyed_ingredients[$ingredient['short_name']]=$ingredient['display_name'];
    };

    function makeCheckboxes($ingredients)
    {
        $checkbox_html = '';
        $display_id = 1;
        foreach ($ingredients as $ingredient) {
            if ($display_id == 1) {
                $checkbox_html .= "<tr>";
            }
            $checkbox_html .= "<td><label><input type='checkbox'
                value='included' name={$ingredient['short_name']}></input>
                {$ingredient['display_name']}</label></td>";
                //New row for every 3 items. Still needs work for different devices.
                if (($display_id % 3) == 0) {
                    $checkbox_html .= "</tr><tr>";
                }
            $display_id++;
        }
            return $checkbox_html;
    }

// This function takes the values from the checkboxes and checks them against
// the results from the recipe table search for all recipes containing selected ingredients.

    function checkForIngredients($input, $result)
    {
        $hasIngredient = 0;
        $inc_ing = $result['included_ingredients']; //String from set in database
        foreach ($input as $in) {
            if (strrpos($inc_ing, $in) !== false){
                $hasIngredient ++;
            }
        }
        $boom = explode(",", $inc_ing);
        if (count($boom) === $hasIngredient) {
            return true;
        } else {
            return false;
        }
    }
 ?>
