<?php require_once 'config.php';

$view = $_POST['view'];

$query = "SELECT * FROM cars";
$view_query = mysqli_query($connect, $query);


if(!$view_query){
    die('QUERY FAILED' . mysqli_error($connect));
}

if(mysqli_num_rows($view_query) > 0){
    echo '<table class="table">'.
        "<thead>".
            "<tr>".
                "<th>Id</th>".
                "<th>Make</th>".
                "<th>Model</th>".
                "<th>Year</th>".
            "</tr>".
        "</thead>".
            "<tbody>";
                while($row = mysqli_fetch_array($view_query)) {
                    echo "<tr>".
                            "<td>" . $row['id'] . "</td>".
                            "<td>" . $row['make'] . "</td>".
                            "<td>" . $row['model'] . "</td>".
                            "<td>" . $row['year'] . "</td>".
                        "</tr>"; 
                }
            echo "</tbody>";                            
    echo "</table>";
    mysqli_free_result($view_query);
} else{
    echo 'Error: empty number of rows in results';
}