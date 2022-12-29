<?php 
	$conn=mysqli_connect("localhost","root","");
	$data=mysqli_select_db($conn,"alat_berat");

	$EncodedData=file_get_contents('php://input');
	$DecodedData=json_decode($EncodedData,true);

	$UserName=$DecodedData['UserName'];
	$Password=$DecodedData['Password'];

	$IQ = "SELECT * FROM users where UserName='$UserName' and Password='$Password' ";

	$R=mysqli_fetch_array(mysqli_query($conn,$IQ));

	if(isset($R)){
 
 $SuccessLoginMsg = 'Data Matched';
 
 // Converting the message into JSON format.
$SuccessLoginJson = json_encode($SuccessLoginMsg);
 
// Echo the message.
 echo $SuccessLoginJson ; 
 
 }
 
 else{
 
 // If the record inserted successfully then show the message.
$InvalidMSG = 'Invalid Username or Password Please Try Again' ;
 
// Converting the message into JSON format.
$InvalidMSGJSon = json_encode($InvalidMSG);
 
// Echo the message.
 echo $InvalidMSGJSon ;
 
 }
?>