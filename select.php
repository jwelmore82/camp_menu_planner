@@ -0,0 +1,23 @@
<?php
    require 'inc/functions.php';
    require 'inc/header.php';
?>
<form class="user_input" action="request.php" method="POST">
    <table >
        <th>
            Select Ingredients
        </th>
        <tr>
<?php
    $sql = new PDO('mysql:host=localhost;dbname=cmp_database', "user", "");
    $ret= $sql->prepare('SELECT `short_name`, `display_name` FROM `ingredients`');
    $ret->execute();
    var_dump($ret->fetchAll(PDO::FETCH_ASSOC));
 ?>
        </tr>
    </table>

<button type="submit" name="button">Submit</button>
</form>

<?php require 'inc/footer.php'; ?>
