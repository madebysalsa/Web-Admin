<?php 

require_once "Connect.php";

$key = $_POST["key"];

$nama           = $_POST["nama"];
$lokasi         = $_POST["lokasi"];
$tanggal         = $_POST["tanggal"];
$foto        = $_POST["foto"];


if ( $key == "insert" ){

    //$tanggal_newformat = date('Y-m-d', strtotime($tanggal));

    $query = "INSERT INTO absen_datang (nama, lokasi, tanggal)
    VALUES ('$nama', '$lokasi', '$tanggal')";

       // $eksekusi = mysqli_query($conn, $query);
       // $cek = mysqli_affected_rows($conn);
        if ( mysqli_query($conn, $query) ){

            if ($foto == null) {

                $finalPath = "/android_register_login/pet_logo.png"; 
                $result["value"] = "1";
                $result["message"] = "Success";

            } else {
                        
                $id = mysqli_insert_id($conn);
                $simpan="$id.jpeg";
                $path = "absen_datang/$id.jpeg";
                $finalPath = "/urbansky/android_register_login/".$path;

                $insert_picture = "UPDATE absen_datang SET foto ='$simpan' WHERE id='$id'";
            
                if (mysqli_query($conn, $insert_picture)) {
            
                    if ( file_put_contents( $path, base64_decode($foto) ) ) {
                        
                        $result["value"] = "1";
                        $result["message"] = "Success!";
            
                    
                    } else {
                        
                        $response["value"] = "0";
                        $response["message"] = "Error! ".mysqli_error($conn);
                        
                    }
                }
            } 
        }   else {

    $response["value"] = "0";
    $response["message"] = "Error! ".mysqli_error($conn);
    
         } 

        
        }
echo json_encode($result);
mysqli_close($conn);
        