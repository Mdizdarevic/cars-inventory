<?php require_once 'config.php';

$id = $_POST['id'];

// Prepared statement for deleting specific row in database
$stmt = $connect->prepare("DELETE FROM cars WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

if(!$stmt){
    die('QUERY FAILED' . mysqli_error($connect)); 
} 
?>

