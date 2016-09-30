<?php

 require_once 'db_config.php';


  $user_name = $_POST['nombre'];
  $user_email = trim($_POST['email']);
  $user_pass = trim($_POST['password']);//SHA1
  $user_phone = trim($_POST['telefono']);
  $user_speciality = trim($_POST['selectE']);

  
  $user_tech= htmlspecialchars($_POST['tech']);
  
    //Añadir imagen
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));

	//echo date("Y/m/d");
	$time=date("Y-m-d H:i:s");
	echo $time;
 $sql="INSERT INTO users VALUES($user_name,$user_email,$user_pass,$user_phone,$user_speciality,$user_tech,'" . $image . "',$time)";

 // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!mysqli_query($conn,$sql)){
	die('Error' . mysqli_error($conn));
}
else{
	echo "Mira y reza";
}

mysqli_close($conn);



?>