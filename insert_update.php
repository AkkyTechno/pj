<?php
include 'db.php';

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

if ($form_data->txtid == '0') {

    $data = array(
        ':Pro_id' => $form_data->Pro_id,
        ':txtname' => $form_data->txtname,
        ':price' => $form_data->price,
        ':qty' => $form_data->qty,
        ':reason' => $form_data->reason,
        ':det' => $form_data->det,


    );

    $query = "INSERT INTO `tbl_user` (`Prod_id`, `Prod_name`, `price`, `qty`, `reason`, `retn_date`) VALUES (:Pro_id, :txtname, :price, :qty,:reason, :det );";

    $statement = $connect->prepare($query);

    if ($statement->execute($data)) {
        $message = 'Data Inserted';
    } else {
        $message = "Error";
    }
} else {

    $data = array(
         ':Pro_id' => $form_data-> Pro_id,
        ':txtname' => $form_data->txtname,
         ':price' => $form_data->price,
        ':qty' => $form_data->qty,
        ':reason' => $form_data->reason,
        ':det' => $form_data->det,
        ':txtid' => $form_data->txtid,
    );

    $query = " UPDATE tbl_user SET Prod_id=:Pro_id,Prod_name=:txtname,price=:price,qty=:qty,reason=:reason,retn_date=:det  WHERE txtid = :txtid ;";

    $statement = $connect->prepare($query);
    if ($statement->execute($data)) {
        $message = 'Data Edited';
    }else{
        $message = 'Error';
    }
}
echo $message;
