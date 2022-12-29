<?php 
	$conn=mysqli_connect("localhost","root","");
	$data=mysqli_select_db($conn,"alat_berat");

	$EncodedData=file_get_contents('php://input');
	$DecodedData=json_decode($EncodedData,true);

	$no_order=$DecodedData['no_order'];
	$pekerjaan=$DecodedData['pekerjaan'];
	$kapal=$DecodedData['kapal'];
	$no_palka=$DecodedData['no_palka'];
	$kegiatan=$DecodedData['kegiatan'];
	$area=$DecodedData['area'];

	$IQ="insert into forklift(no_order,pekerjaan,kapal,no_palka,kegiatan,area) 
	values ('$no_order','$pekerjaan','$kapal','$no_palka','$kegiatan','$area')";

	$R=mysqli_query($conn,$IQ);

	if($R)
	{
		$Message="Order Alber has successfully";
	}
	else
	{
		$Message="Server Error";
	}
	
	$Response[]=array("Message"=>$Message);
	echo json_encode($Response);
?>