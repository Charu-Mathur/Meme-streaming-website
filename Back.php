<?php
$con = mysqli_connect('localhost', 'root', '','dbmeme');


$n = $_POST['fname'];
$c = $_POST['lname'];
$u = $_POST['email'];

$sql = "INSERT INTO `tbmeme` (`Owner`, `Caption`,`Url`) VALUES ('$n','$c','$u')";
 
$rs = mysqli_query($con, $sql);
if($rs)
{
	header('Location: Xmeme.php');
}

?>