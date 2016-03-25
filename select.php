<?php
    require_once 'inc/functions.php';
    //This pages handles its own post data, then redirects to itself
    // with $_GET variables set. This prevents resending data on page
    //reload and lets the user click on a recipe to view it, and then
    //use the back button to return to their results.
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
        $oneLess = "";
        $matches = 0;
        $results = $dbh->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            if(checkForIngredients($request,$result)){
                $yourRecipes .= $result['id'] . "+";
                $matches++;
            };
            if(checkForOneMissing($request,$result)){
                $oneLess .= $result['id'] . "+";
            };
        }
        ///////////////////////////WORKING ON FEATURE////////////////////////////////
        // $searchList = "";
        // foreach ($request as $item) {
        //     $cleanItem = htmlspecialchars($item);
        //     $searchList .= $cleanItem . "+";
        // }
        // $searchList = rtrim($searchList, "+");
        $yourRecipes = rtrim($yourRecipes, "+");
        $oneLess = rtrim($oneLess, "+");
        header("Location: ./select.php?results={$matches}&id={$yourRecipes}&try={$oneLess}");
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
if (isset($_GET['results'])) {
    $getResults = intval($_GET['results']);
    $keyed_ingredients = keyedUp($ingredients);
    ?>
    <div class="recipes">
    <?php
    if ($getResults == 0) {
        //Exact matches only show when all ingredients are matched. eg, searching
        //for graham crackers and chocolate won't return s'mores because that
        //recipe calls for marshmallows
        echo "<p id='results'>Sorry, no exact matches. Select more ingredients, or try browsing recipes!</p>";
    } else { ?>
        <h2  id="results"><?php echo $getResults . " "; ?>Matches found!</h2>
    <?php
        $getId = $_GET['id'];
        $mySearch = resultsSearch($getId);
        try {
            $ret= $sql->prepare($mySearch);
            $ret->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        $recipes = $ret->fetchAll(PDO::FETCH_NAMED);
        echo recipesShortForm($recipes, $keyed_ingredients);
    }
    //Based on test user feedback, added following block of code to show
    //close matches when 3 or less exact matches are returned.
    if (isset($_GET['try']) && intval($_GET['try']) != 0 && $getResults <= 3) {?>
    <h2>
        It looks like you're only missing one ingredient from the following
        recipes:
    </h2>
    <?php
    $getTry = $_GET['try'];
    $missingOneSearch = resultsSearch($getTry);
    try {
        $m1dbh= $sql->prepare($missingOneSearch);
        $m1dbh->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
    $missingOne = $m1dbh->fetchAll(PDO::FETCH_NAMED);
    echo recipesShortForm($missingOne, $keyed_ingredients);
    }
    ?>
    <!--Jumping to results makes mobile version have a better flow.  -->
    <script type="text/javascript">
        window.location = "#results";
    </script>
    </div>
    <?php
}
?>

<?php
include_once 'inc/footer.php';
 ?>
