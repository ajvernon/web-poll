<?php
// Starts the database connection
$dbh = new PDO('mysql:host=db702704743.db.1and1.com;dbname=db702704743','dbo702704743', 'TacticalGenius1-');

$postLength = 3;
$pollName = $_POST[pollName];
$option1 = $_POST[option1];
$option2 = $_POST[option2];
$option3 = $_POST[option3];

$addQuery = 'INSERT INTO `index` (`name`, `optionNo`) VALUES (' . $_POST[pollName] . ', 3);';
$stmt = $dbh->query($addQuery);

$tableQuery = 'CREATE TABLE';

foreach ($_POST as $key => $value) {
    if ($key === 'pollName'){
        echo "Skipping poll name!";
    } else {
    }
}

// Ends the database connection
$stmt = null;
$dbh = null;
?>
