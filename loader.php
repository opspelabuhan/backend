<?php 

$obj = file_get_contents('php://input');
$obj = json_decode($obj, true);

$results = array('isSukses' => 0, 'isMessage' => 'Gagal simpan');
$queryStr = array();

$queryStr = "INSERT INTO wheel_loader".join(", ", $queryStr);  

$koneksiDB = mysqli_connect("localhost","root","","alat_berat");

if(mysqli_connect_errno()){
	$results['isMessage'] = "Gagal koneksi ke database " .mysql_connect_error();
	die(json_encode($results));
}

$execQuery = mysqli_query($koneksiDB, $queryStr);

if($execQUery){
	$results = array('isSukses' => 1, 'isMessage' => 'Sukses simpan data');
}else{
$results['isMessage'] = "Mysqli Error Query: ".mysqli_error($koneksiDB);

}

echo json_encode($results);