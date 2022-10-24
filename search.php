<?php require_once 'config.php';

$search = $_POST['search'];

if(!empty($search)){
    
    $query = "SELECT * FROM cars WHERE (make LIKE '%$search%') || (model LIKE '%$search%') || (year LIKE '%$search%')";
    $search_query = mysqli_query($connect, $query);
    
    if(!$search_query){
       die('QUERY FAILED' . mysqli_error($connect));
    }

    if(mysqli_num_rows($search_query) > 0){
        echo '<table id="tablelist" class="table">'.
            "<thead>".
                "<tr>".
                    "<th>Id</th>".
                    "<th>Make</th>".
                    "<th>Model</th>".
                    "<th>Year</th>".
                "</tr>".
            "</thead>".
                "<tbody>";
                    while($row = mysqli_fetch_array($search_query)) {
                        echo "<tr>".
                                "<td>" . $row['id'] . "</td>".
                                "<td>" . $row['make'] . "</td>".
                                "<td>" . $row['model'] . "</td>".
                                "<td>" . $row['year'] ."</td>". 
                                "<td>" . "<button id='readUpdateBtn' onclick='updateRow(this)' class='btn btn-primary'>Update</button>" . "</td>".
                                "<td>" . "<button id='readDeleteBtn' onclick='removeRow(this)' class='btn btn-danger'> Delete</button>" . "</td>".
                            "</tr>"; 
                    }
                echo "</tbody>";                            
        echo "</table>";
        mysqli_free_result($search_query);
    } else{
        echo "<h2 style='color: red'>N/A</h2>";
    }
    
}
