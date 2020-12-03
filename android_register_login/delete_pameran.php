<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'Connect.php';

$key     = $_POST['key'];
$id      = $_POST['id'];

if ( $key == "delete" ){

    $query = "DELETE FROM pameran WHERE id='$id' ";

        if ( mysqli_query($conn, $query) ){

            $response["value"] = "1";
            $response["message"] = "Success!";
            
        } 
        else {

            $response["value"] = "0";
            $response["message"] = "Error! ".mysqli_error($conn);
            
        }

} else{
    $response["value"] = "0";
    $response["message"] = "Tidak Ada Post Data";
}
    echo json_encode($response);
    mysqli_close($conn);

?>