<?php 
	$conn=mysqli_connect("localhost","root","");
	$data=mysqli_select_db($conn,"alat_berat");

	$EncodedData=file_get_contents('php://input');
	$DecodedData=json_decode($EncodedData,true);

	$FullName=$DecodedData['FullName'];
	$UserName=$DecodedData['UserName'];
	$Password=$DecodedData['Password'];

	$IQ="insert into users (FullName,UserName,Password) values ('$FullName','$UserName','$Password')";

	$R=mysqli_query($conn,$IQ);

	if($R)
	{
		$Message="Registration has successfully";
	}
	else
	{
		$Message="Server Error";
	}
	
	$Response[]=array("Message"=>$Message);
	echo json_encode($Response);
?>