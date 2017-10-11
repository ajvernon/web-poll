<!DOCTYPE html>
<html>
<head>
    <title>A Web Poll!</title>
    <meta charset="utf-8"  />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> hullo! </h1>
<?php
if ($_GET == null) {
    echo "<h2> there's no poll here! come back with one! </h2>";
}else{
    $dbh = new PDO('mysql:host=db702704743.db.1and1.com;dbname=db702704743','dbo702704743', 'TacticalGenius1-');

    $selectQuery = 'SELECT * FROM `' + $_GET['id'] + '`;';
    $stmt = $dbh->prepare($selectQuery);
    $stmt->execute();
    
    foreach ($stmt as $row){
        echo $row['choice'] + "   ";
        echo $row['votes'] + "<br>";
    }

    $stmt = null;
    $dbh = null;    
}
?>

</body>
</html>
