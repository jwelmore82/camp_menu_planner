<?php
    require_once 'inc/functions.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $request = array_keys($_POST);
        $search = postDataAsSearch($request);
        try {
            $dbh = $sql->prepare($search);
            $dbh->execute();

        } catch (Exception $e) {
            header('Location: ./browse.php');
            exit;
        }
        $yourRecipes = "";
        $matches = 0;
        $results = $dbh->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            if(checkForIngredients($request,$result)){
                $yourRecipes .= $result['id'] . "+";
                $matches++;
            };
        }
        $yourRecipes = rtrim($yourRecipes, "+");
        header("Location: ./select.php?results={$matches}&id={$yourRecipes}");
    }


    require 'inc/header.php';
?>
    <form class="user_input" action="select.php" method="POST">
    <table >
        <th>
            Select Ingredients

<?php
//This function creates and returns the checkboxes in a string.
echo makeCheckboxes($ingredients);
?>

        </th>
    </table>

<button type="submit">Search For Recipes</button>
</form>
<?php
include 'inc/footer.php';
 ?>
