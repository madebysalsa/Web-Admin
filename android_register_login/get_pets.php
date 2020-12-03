<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once 'Connect.php';

$key = $_POST['key'];
$name = $_POST['name'];
if($key == "get"){


$query = "SELECT * FROM pets WHERE name ='$name' ORDER BY id DESC";

//ORDER BY id DESC ";

$result = mysqli_query($conn, $query);
$response = array();

$server_name = $_SERVER['SERVER_ADDR'];

while( $row = mysqli_fetch_assoc($result) ){

    array_push($response, 
    array(
        'id'        =>$row['id'], 
        'name'      =>$row['name'], 
        'species'   =>$row['species'],
        'breed'     =>$row['breed'],
        'gender'    =>$row['gender'],
        'birth'     =>date('d M Y', strtotime($row['birth'])),
        'picture'   =>"http://$server_name/urbansky/android_register_login/kegiatan_sales/" . $row['picture'],
        'love'      =>$row['love']) 
    );
}
}
else {
    $response["value"]="0";
    $response ["message"] = "Data tidak tersedia";
}
echo json_encode($response);

mysqli_close($conn);

?>