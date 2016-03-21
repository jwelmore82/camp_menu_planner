<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Camp Menu Planner</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/CMPlogo.ico" type="image/ico">
        <link href='http://fonts.googleapis.com/css?family=Cabin%7CPacifico' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body id=<?php echo setBody(getScript()); ?>>
        <header>
            <img src="img/CMPlogo.svg" width="90" height="88" alt="Camp Menu Planner Logo" class="logo">
            <h1><span>Camp Menu Planner</span></h1>
            <ul id="tabnav">
                <a href="./index.php"><li class="tab1">About</li></a>
                <a href="./select.php"><li class="tab2">Select Ingredients</li></a>
                <a href="./browse.php"><li class="tab3">Browse Recipes</li></a>
            </ul>
        </header>
