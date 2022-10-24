<?php require_once 'config.php';

$id = $_POST['id'];
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];

// Prepared statement for updating specific items in database
$stmt = $connect->prepare("UPDATE cars SET make=?, model=?, year=? WHERE id=?");
$stmt->bind_param("sssi", $make, $model, $year, $id);
$stmt->execute();
$stmt->close();

if(!$stmt){
    die('QUERY FAILED' . mysqli_error($connect));
}
?>