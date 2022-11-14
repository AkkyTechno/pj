<?php
include 'db.php';

$query = "SELECT * FROM tbl_user ORDER BY txtid DESC";
$statement = $connect->prepare($query);
if ($statement->execute()) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
    echo json_encode($data);
}
