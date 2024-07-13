<?php
//echo $_FILES['txtsin']['name']."<br>";
///echo $_FILES['txtsin']['type']."<br>";
//  include "config/SYD_Class.php";
//    // $coder=new sydClass();

//$imagePath.=basename($_FILES['txtim']['name']);
$name = $_REQUEST["username"];
$tell = $_REQUEST["password"];
$sex = $_REQUEST["email"];
// $birthdate = $_REQUEST["image"];
$placeOfBirth = $_REQUEST["u_type_no"];
$imagePath = $_FILES['txtf']['name'];

if (isset($_FILES["txtf"]) && $_FILES["txtf"]["error"] === 0) {

  $imageTmpPath = $_FILES["txtf"]["tmp_name"];
  //$imageFileName = $_FILES["txtim"]["name"];
  // $imagePath = "images/".$imageFileName; 


  move_uploaded_file($imageTmpPath, $imagePath);
}


$signaturePath = $_FILES['txtsin']['name'];
//$signaturePath.=basename($_FILES['signature']['name']);
if (isset($_FILES["txtsin"]) && $_FILES["txtsin"]["error"] === 0) {

  $signatureTmpPath = $_FILES["txtsin"]["tmp_name"];
  //$signatureFileName = $_FILES["signature"]["name"];
  // $signaturePath.=basename($_FILES['signature']['name']);


  move_uploaded_file($signatureTmpPath, $signaturePath);
}

$db = new mysqli("localhost", "root", "", "constraction");
$res = $db->query("insert into users values(null,'$name','$tell','$sex','$imagePath','$placeOfBirth')");
// echo $imagePath;
echo $res == 1 ? "Inserted successfully" : "falied";
