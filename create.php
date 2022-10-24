<?php require_once 'config.php';

$create = $_POST['create'];
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];

// Prepared statement for creating new car listin in database
$stmt = $connect->prepare("INSERT INTO cars (id, make, model, year) VALUES (NULL, ?, ?, ?)");
$stmt->bind_param("sss", $make, $model, $year);
$stmt->execute();
$stmt->close();

if(!$stmt){
    die('QUERY FAILED' . mysqli_error($connect));
}
?>