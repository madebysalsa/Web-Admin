<?php 

require_once "Connect.php";

$key = $_POST["key"];

$jenis_event    = $_POST["jenis_event"];
$name           = $_POST["name"];
$no_tlp         = $_POST["no_tlp"];
$alamat         = $_POST["alamat"];
$tanggal        = $_POST["tanggal"];
$keterangan     = $_POST["keterangan"];
$status         = $_POST["status"];
$nama_sales     = $_POST["nama_sales"];

if ( $key == "insert" ){

    //$tanggal_newformat = date('Y-m-d', strtotime($tanggal));

    $query = "INSERT INTO pameran (nama_sales, jenis_event, name, no_tlp, alamat, tanggal, keterangan, status)
    VALUES ('$nama_sales', '$jenis_event', '$name', '$no_tlp', '$alamat', '$tanggal', '$keterangan', '$status')";

        $eksekusi = mysqli_query($conn, $query);
        $cek = mysqli_affected_rows($conn);

            if ($cek > 0) {

                //$finalPath = "/android_register_login/pet_logo.png"; 
                $response["value"] = "1";
                $response["message"] = "Success";

            } else {
                        
                $response["value"] = "0";
                $response["message"] = "Error! ".mysqli_error($conn);

                    }

}            
else {

    $response["value"] = "0";
    $response["message"] = "Error! ".mysqli_error($conn);

}

echo json_encode($response);
mysqli_close($conn);