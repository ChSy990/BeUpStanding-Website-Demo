<?php
include('database.php');

$database = new Database();

$database->connect('webuser','AGuw7ATGrnEt2gXz', 'website');

$connection = $database->connection;

$email = $_POST["email"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$in_rate = $_POST["rate"];
$des = $_POST["des"];

//$name = $_POST["username"];
//$password = $_POST["password"];
//$UQ['user'];

//$hash_password = sha1($password);
//$sql_query = "select username from user where username like '$name' and password like '$hash_password';";
$sql_query = "insert into UserInformation values ('$email', '$name', '$age', '$gender', '$in_rate','$des');";

$result = mysqli_query($connection, $sql_query);

if($result){

	echo "successful";
	
}
else{
	echo "insert failed";
}



?>