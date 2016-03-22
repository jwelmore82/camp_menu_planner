<?php
    require_once 'inc/functions.php';
    require 'inc/header.php';
 ?>
<div class="recipes" id="recipe_view">
    <?php

    if (isset($_GET['id'])) {
        // Filter
        $intval_id = intval($_GET['id']);
        try {
            $ret= $sql->prepare("SELECT id, recipe_name, included_ingredients, recipe_body
                FROM `recipes` WHERE id = ?");
            //FILTER
            $ret->bindParam(1, $intval_id);
            $ret->execute();
            $full_recipe = $ret->fetch();
            // Throw new exception if id isnt found:
            if (!$full_recipe) {
                throw new Exception("<h2>Sorry, Recipe Not Found</h2>");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        echo recipeToHtml($full_recipe); ?>
        <!--Jumping to recipe makes mobile version have a better flow.  -->
        <script type="text/javascript">
            window.location = "#recipe_view";
        </script>
        <?php

    } else {
        $allRecipes = "SELECT id, recipe_name, included_ingredients
            FROM `recipes` ORDER BY recipe_name;";
            try {
                $ret= $sql->prepare($allRecipes);
                $ret->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
            $recipes = $ret->fetchAll(PDO::FETCH_NAMED);
            $keyed_ingredients = keyedUp($ingredients);
            echo recipesShortForm($recipes, $keyed_ingredients);
    }
    ?>
</div>
 <?php include_once 'inc/footer.php'; ?>
