<?php
// Starts the database connection
$dbh = new PDO('mysql:host=db702704743.db.1and1.com;dbname=db702704743','dbo702704743', 'TacticalGenius1-');

$count = count($_POST) - 1;

$addQuery = 'INSERT INTO `index` (`name`, `optionNo`) VALUES ("' . $_POST[pollName] . '", ' . $count . ');';
$stmt = $dbh->prepare($addQuery);
$stmt->execute();
$stmt = null;

$selectQuery ='SELECT `id` FROM `index`;';
$stmt = $dbh->prepare($selectQuery);
$stmt->execute();
$latestId = 0;

// I hate myself for doing this
foreach ($stmt as $row){
    print $row['id'] . "\n";
    $latestId = $row['id'];
}
print $latestId . "\n";
$stmt = null;

$tableQuery = 'CREATE TABLE `' . $latestId . '` (`choice` TEXT, `votes` INT);';
$stmt = $dbh->prepare($tableQuery);
$stmt->execute();
$stmt = null;

foreach ($_POST as $key => $value) {
    if ($key === 'pollName'){
        echo "Skipping poll name!";
    } else {
        $part1 = 'INSERT INTO `' . $latestId . '` (`choice`, `votes`)';
        $part2 = 'VALUES ("' . $value . '", 0);';
        $insertQuery = $part1 . $part2;
        $stmt = $dbh->prepare($insertQuery);
        $stmt->execute();
        $stmt = null;
    }
}

// Ends the database connection
$stmt = null;
$dbh = null;

echo $latestID;
?>
