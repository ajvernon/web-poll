<?php
// Starts the database connection
$dbh = new PDO('mysql:host=db702704743.db.1and1.com;dbname=db702704743','dbo702704743', 'TacticalGenius1-');

$stmt = $dbh->prepare('CREATE TABLE (:name) (option1 INT, option2 INT, option3 INT);');
$stmt->bindParam(':name', $name);
$name = 'butts';
$stmt->execute();
echo json_encode($_POST);

// Ends the database connection
$stmt = null;
$dbh = null;
?>
