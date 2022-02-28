<?php

include("databaseConnect.php");

$per_page = 20;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$start = ($page - 1) * $per_page;

// $sql_query = "SELECT * FROM tasks ORDER BY taskID LIMIT $start,$per_page ";
// my own database
$sql_query = "SELECT * FROM tbl_tasks ORDER BY task_id LIMIT $start,$per_page ";

$resultset = mysqli_query($conn, $sql_query);


?>
<table width="100%">
    <thead>
        <tr>
            <th> Id</th>
            <th>Task Name</th>
        </tr>
    </thead>
    <?php
    while ($rows = mysqli_fetch_array($resultset)) {  ?>
        <tr bgcolor="#DDEBF5">
            <!-- <td> <?php //echo $rows['task_id']; 
                        ?></td>
            <td><?php //echo $rows['taskName']; 
                ?></td> -->

            <!-- My Own database specific code, please chnage according to your database. -->
            <td> <?php echo $rows['task_id']; ?></td>
            <td><?php echo $rows['task_name']; ?></td>
        </tr>
    <?php } ?>
</table>
<div id="loading"><img src="images/loading.gif" /></div>