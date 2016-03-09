<?php
    require_once 'inc/functions.php';
    require 'inc/header.php';
 ?>
<div class="recipes">
    <?php
    $ret= $sql->prepare("SELECT id, recipe_name, included_ingredients FROM recipes JOIN included_ingredients USING (id)");
    $ret->execute();
    $recipes = $ret->fetchAll(PDO::FETCH_NAMED);

    foreach ($recipes as $recipe) {
        $recipe_html = "<a href='recipes.php?id=" . $recipe['id'] . "'><h4>" .
        $recipe['recipe_name'] . "</h4></a>" ."<br>" . "  Includes: " .
        $recipe['included_ingredients'] . "<br>";
        echo $recipe_html;
    }
    ?>
</div>
 <?php include 'inc/footer.php'; ?>
