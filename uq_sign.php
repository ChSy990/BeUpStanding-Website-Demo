<?php

include('database.php');

require_once "uq/auth.php";             // Include UQ routines that handle UQ single-signon authentication
auth_require();                         // User must authenticate once per session to continue running script
$UQ = auth_get_payload();

$database = new Database();

$database->connect('webuser','AGuw7ATGrnEt2gXz', 'website');

$connection = $database->connection;

//$gender_male_num=0;
//$gender_female_num=0;
//$gender_other_num=0;
//$name = $_POST["username"];
//$password = $_POST["password"];
//$UQ['user'];

//$hash_password = sha1($password);
//$sql_query = "select username from user where username like '$name' and password like '$hash_password';";
$sql_query = "UPDATE TotalClick SET Total = Total + 1;";


$result = mysqli_query($connection, $sql_query);


if($result){

	$query2 = "select Total from TotalClick;";
	$result2 = mysqli_query($connection, $query2);
	if($result2){
		$row = mysqli_fetch_assoc($result2);
		$num = $row["Total"];
		$item = strval($num);
		$sql_query2 = "select Age, Gender, Rate from UserInformation";
		$result3 = mysqli_query($connection, $sql_query2);
		if($result3){

			$response = array();
			$response2 = array();
			//array_push($response,array('total_num' => $item, 'age'=>$row['Age'],'gender'=>$row['Gender'],'rate'=>$row['Rate']));
			while($row = mysqli_fetch_array($result3)){
				array_push($response,array('total_num'=>$item, 'age'=>$row['Age'],'gender'=>$row['Gender'],'rate'=>$row['Rate']));
				//if (gender=="Male"){$gender_male_num+=1;}elseif (gender=="Female") {$gender_female_num+=1;}
				//$json1 = json_encode($response);
				//array_push($response2,array('total_num' => $item, 'this is the json'=>json_encode($response)));


			}
			echo json_encode($response);

		}
		//echo $item;
		else{
			echo "failed";
		}
	}
	else{
		echo "the record retrieve failed";
	}
}
else{
	echo "update failed";
}


?>
