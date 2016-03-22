<?php

// These functions keep the tabs working as they are set up now. For now...

    function getScript()
    {
        $request_script = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        return $request_script;
    }

    function setBody($script)
    {

        if ($script == "index.php") {
            return 'tab1';
        }
        if ($script == "select.php") {
            return 'tab2';
        }
        if ($script == "browse.php") {
            return 'tab3';
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

//Ingredients list needed for multiple pages
try {
    $ret= $sql->prepare('SELECT * FROM `ingredients` ORDER BY display_name');
    //Order by display_name so visitors always see checkboxes in alphabetical order.
    $ret->execute();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
    $ingredients = $ret->fetchAll(PDO::FETCH_ASSOC);
    $keyed_ingredients = array();

    function keyedUp($ingredientsFromDatabase)
    {
        foreach ($ingredientsFromDatabase as $ingredient) {
            $keyed_ingredients[$ingredient['short_name']]=$ingredient['display_name'];
        }
        return $keyed_ingredients;
    }


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
                //New row for every 3 items on larger devices.
                if (($display_id % 3) == 0) {
                    $checkbox_html .= "</tr><tr>";
                }
            $display_id++;
        }
            return $checkbox_html;
    }

// This function takes the values from the checkboxes and checks them against
// the results from the recipe table search for all recipes containing selected ingredients.
    //$input is post data array of ingredient short names. These names match possible
    //set data in recipes table for included ingredients column.
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

//Functions for creating search queries

    function postDataAsSearch($data){
        $count = 0;
        foreach($data as $text)
        {
          if($count > 0){
           $search .= "OR recipes.included_ingredients LIKE '%$text%'";
         } else{
             $search = "SELECT * FROM `recipes` WHERE recipes.included_ingredients
             LIKE '%$text%'";}
          $count++;
        }
        return $search;
    }

    function resultsSearch($ids)
    {
        $allIds = explode(" ", $ids);
        $count = 0;
        $search = '';
        foreach ($allIds as $match) {
            $cleanMatch = intval($match);
            if ($count == 0) {
                $search .= "SELECT id, recipe_name, included_ingredients FROM `recipes` WHERE id = {$cleanMatch}";
            } else {
                $search .= " OR id = {$cleanMatch}";
            }
            $count++;
        }
        $search .= " ORDER BY recipe_name;";
        return $search;
    }


//Functions for displaying recipes

    function recipesShortForm($recipeResults, $keys)
    {
        $recipe_html = '';
        foreach ($recipeResults as $recipe) {
            $recipe_html .= "<a href='browse.php?id={$recipe['id']}'><h4>
                {$recipe['recipe_name']}</h4></a><br><li>Includes: ";

            $included_ingredients = explode(',',$recipe['included_ingredients']);

            foreach ($included_ingredients as $ingredient) {
                $recipe_html .= "{$keys[$ingredient]}, ";
            }

            $recipe_html = rtrim($recipe_html, ', ');
            $recipe_html .= "</li><br>";
        }
        return $recipe_html;
    }

    function recipeToHtml($recipeFromDatabase)
    {
        $recipeBody = $recipeFromDatabase['recipe_body'];
        $cleanName = htmlspecialchars($recipeFromDatabase['recipe_name']);
        $ingredientString = strstr($recipeBody, '##', true);
        $ingredientArray = explode('+', $ingredientString);
        $cleanIngredients = '';
        foreach ($ingredientArray as $ingredient) {
            $cleanIngredient = htmlspecialchars($ingredient);
            $cleanIngredients .= "<li>{$cleanIngredient}</li>";
        }
        $steps = strstr($recipeBody, '##');
        $noServe = strpos($steps, ' Servings:') - 2;
        $steps = substr($steps, 2, $noServe);
        $cleanSteps = htmlspecialchars($steps);
        $servings = strstr($recipeBody, 'Servings:');
        $cleanServings = htmlspecialchars($servings);
        $full_recipe_html = "<h3>{$cleanName}</h3><ul>{$cleanIngredients}</ul><p>{$cleanSteps}</p><h4>{$cleanServings}</h4>";
        return $full_recipe_html;
    }
