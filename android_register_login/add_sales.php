<?php 

require_once "Connect.php";

$key = $_POST["key"];

$nama_sales    = $_POST["nama_sales"];
$jabatan           = $_POST["jabatan"];
$jenis_kel         = $_POST["jenis_kel"];
$jenis_kegiatan         = $_POST["jenis_kegiatan"];
$tanggal        = $_POST["tanggal"];

if ( $key == "insert" ){

    $tanggal_newformat = date('Y-m-d', strtotime($tanggal));

    $query = "INSERT INTO sales (nama_sales, jabatan, jenis_kel, jenis_kegiatan, tanggal)
    VALUES ('$nama_sales', '$jabatan', '$jenis_kel', '$jenis_kegiatan', '$tanggal_newformat')";

        $eksekusi = mysqli_query($conn, $query);
        $cek = mysqli_affected_rows($conn);

            if ($cek > 0) {

                //$finalPath = "/android_register_login/pet_logo.png"; 
                $result["value"] = "1";
                $result["message"] = "Success";

            } else {
                        
                $response["value"] = "0";
                $response["message"] = "Error! ".mysqli_error($conn);

                    }

}            
else {

    $response["value"] = "0";
    $response["message"] = "Error! ".mysqli_error($conn);

}

echo json_encode($result);
mysqli_close($conn);