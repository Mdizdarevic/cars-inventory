<?php require_once 'config.php';

$view = $_POST['view'];

$query = "SELECT * FROM cars";
$view_query = mysqli_query($connect, $query);


if(!$view_query){
    die('QUERY FAILED' . mysqli_error($connect));
}

if(mysqli_num_rows($view_query) > 0){
    echo '<table id="tablelist" class="table">'.
        "<thead>".
            "<tr>".
                "<th>Id</th>".
                "<th>Make</th>".
                "<th>Model</th>".
                "<th>Year</th>".
                "<th>" ."<button id='insertForm' data-toggle='modal' data-target='#createModal' class='btn btn-success'> Create</button>" ."</th" .
            "</tr>".
        "</thead>".
            "<tbody>";
                while($row = mysqli_fetch_array($view_query)) {
                    echo "<tr id='items'>".
                            "<td id='itemId'>" . $row['id'] . "</td>".
                            "<td id='itemMake'>" . $row['make'] . "</td>".
                            "<td id='itemModel'>" . $row['model'] . "</td>".
                            "<td id='itemYear'>" . $row['year'] ."</td>". 
                            "<td>" . "<button id='readUpdateBtn' onclick='updateRow(this)' class='btn btn-primary'>Update</button>" . "</td>".
                            "<td>" . "<button id='readDeleteBtn' onclick='removeRow(this)' class='btn btn-danger'> Delete</button>" . "</td>".
                        "</tr>"; 
                }
            echo "</tbody>";                            
    echo "</table>";
    mysqli_free_result($view_query);
} else{
    echo 'Error: empty number of rows in results';
}
