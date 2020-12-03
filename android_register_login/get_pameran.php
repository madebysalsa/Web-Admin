<?php 

require("Connect.php");

$key = $_POST['key'];
$nama_sales = $_POST['nama_sales'];
if($key == "get"){

$query = "SELECT * FROM pameran WHERE nama_sales ='$nama_sales' ORDER BY id DESC ";
$result = mysqli_query($conn, $query);
$cek = mysqli_affected_rows($conn);

if($cek > 0){
$response["value"] = "1";
$response["message"] = "Data Tersedia";
$response["data"] = array();

//$server_name = $_SERVER['SERVER_ADDR'];

while($ambil = mysqli_fetch_object($result)){
        $F["id"] = $ambil->id;
        $F["nama_sales"] = $ambil->nama_sales;
        $F["name"] = $ambil->name;
        $F["tanggal"] = $ambil->tanggal;
        $F["status"] = $ambil->status;
        $F["jenis_event"] = $ambil->jenis_event;
        $F["no_tlp"] = $ambil->no_tlp;
        $F["alamat"] = $ambil->alamat;
        $F["keterangan"] = $ambil->keterangan;
        
        array_push($response["data"], $F);
    }
}else{
    $response["value"] = "0";
    $response["message"] = "Data Tidak Tersedia";
}
}else{
$response["value"] = "0";
    $response["message"] = "Data Tidak Tersedia";
}

echo json_encode($response);

mysqli_close($conn);

?>