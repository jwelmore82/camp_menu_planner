<?php
    require_once 'inc/functions.php';
    require 'inc/header.php';
?>
<form class="user_input" action="request.php" method="POST">
    <table >
        <th>
            Select Ingredients
        </th>
        <tr>
<?php

    $ret= $sql->prepare('SELECT * FROM `ingredients`');
    $ret->execute();
    var_dump($ret->fetchAll(PDO::FETCH_ASSOC));
 ?>
        </tr>
    </table>

<button type="submit" name="button">Submit</button>
</form>

<?php include 'inc/footer.php'; ?>
