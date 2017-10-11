<?php
// Starts the database connection
$dbh = new PDO('mysql:host=db702704743.db.1and1.com;dbname=db702704743','dbo702704743', 'TacticalGenius1-');

// Commented out for testing the select functionality
//$addQuery = 'INSERT INTO `index` (`name`, `optionNo`) VALUES ("' . $_POST[pollName] . '", 3);';
//$stmt = $dbh->prepare($addQuery);
//$stmt->execute();
//$stmt = null;

$selectQuery ='SELECT `id` FROM `index`;';
$stmt = $dbh->prepare($selectQuery);
$stmt->execute();

foreach ($stmt as $row){
    print $row['id'] . "\n";
}

$idArray = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
var_dump($idArray);
$latestId = array_pop($idArray);
print ($latestId);

//$stmt = null;

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
