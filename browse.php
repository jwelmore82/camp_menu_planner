<?php
    require_once 'inc/functions.php';
    require 'inc/header.php';
 ?>
<div class="recipes">
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

        echo recipeToHtml($full_recipe);

    } else {
        $ret= $sql->prepare("SELECT id, recipe_name, included_ingredients
            FROM `recipes` ORDER BY recipe_name");
        $ret->execute();
        $recipes = $ret->fetchAll(PDO::FETCH_NAMED);
        $keyed_ingredients = keyedUp($ingredients);
        foreach ($recipes as $recipe) {
            $recipe_html = "<a href='browse.php?id={$recipe['id']}'><h4>
                {$recipe['recipe_name']}</h4></a><br><li>Includes: ";

            $included_ingredients = explode(',',$recipe['included_ingredients']);

            foreach ($included_ingredients as $ingredient) {
                $recipe_html .= "{$keyed_ingredients[$ingredient]}, ";
            }

            $recipe_html = rtrim($recipe_html, ', ');
            $recipe_html .= "</li><br>";
            echo $recipe_html;
        }
    }
    ?>
</div>
 <?php include 'inc/footer.php'; ?>
