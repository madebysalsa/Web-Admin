<?php
require_once "Connect.php";

$key = $_POST["key"];

$id             = $_POST["id"];
$jenis_event    = $_POST["jenis_event"];
$name           = $_POST["name"];
$no_tlp         = $_POST["no_tlp"];
$alamat         = $_POST["alamat"];
$tanggal        = $_POST["tanggal"];
$keterangan     = $_POST["keterangan"];
$status         = $_POST["status"];


if ( $key == "update" ){

    $query = "UPDATE pameran SET jenis_event = '$jenis_event', name = '$name', no_tlp = '$no_tlp', alamat = '$alamat', tanggal = '$tanggal', keterangan = '$keterangan', status = '$status' WHERE id = '$id'";
    
    $eksekusi = mysqli_query($conn, $query);
    $cek = mysqli_affected_rows($conn);

    if ( $cek > 0 ){

            $response["value"] = "1";
            $response["message"] = "Success";

        }  else {
                   
                    $response["value"] = "0";
                    $response["message"] = "Error! ".mysqli_error($conn);

                }

}            
else {

$response["value"] = "0";
$response["message"] = "Tidak Ada Post Data";

}

echo json_encode($response);
mysqli_close($conn);