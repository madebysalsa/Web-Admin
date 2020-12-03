<?php 

require_once "Connect.php";

$key = $_POST["key"];

$name       = $_POST["name"];
$species    = $_POST["species"];
$breed      = $_POST["breed"];
$gender     = $_POST["gender"];
$birth      = $_POST["birth"];
$picture    = $_POST["picture"];

/*$key = "insert";
$name = "Salsabillar";
$species = "Salsabillar";
$breed = "Salsabillar";
$gender = "1";
$birth = "Salsabillar";
$picture = "Salsabillar";*/

if ( $key == "insert" ){

    //$birth_newformat = date('Y-m-d', strtotime($birth));

    $query = "INSERT INTO pets (name,species,breed,gender,birth)
    VALUES ('$name', '$species', '$breed', '$gender', '$birth')";

        if ( mysqli_query($conn, $query) ){

            if ($picture == null) {

                $finalPath = "/urbansky/android_register_login/pet_logo.png"; 
                $result["value"] = "1";
                $result["message"] = "Success";
    
                echo json_encode($result);
                mysqli_close($conn);

            } else {

                $id = mysqli_insert_id($conn);
                $simpan="$id.jpeg";
                $path = "kegiatan_sales/$id.jpeg";
                $finalPath = "/urbansky/android_register_login/".$path;

                $insert_picture = "UPDATE pets SET picture='$simpan' WHERE id='$id'";
            
                if (mysqli_query($conn, $insert_picture)) {
            
                    if ( file_put_contents( $path, base64_decode($picture) ) ) {
                        
                        $result["value"] = "1";
                        $result["message"] = "Success!";
            
                        echo json_encode($result);
                        mysqli_close($conn);
            
                    } else {
                        
                        $response["value"] = "0";
                        $response["message"] = "Error! ".mysqli_error($conn);
                        echo json_encode($response);

                        mysqli_close($conn);
                    }

                }
            }

        } 
        else {
            $response["value"] = "0";
            $response["message"] = "Error! ".mysqli_error($conn);
            echo json_encode($response);

            mysqli_close($conn);
        }
}

?>